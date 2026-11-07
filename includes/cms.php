<?php
// Configure these values in includes/cms-config.php on the server (that file is ignored by Git).
function stac_cms_db(): ?PDO
{
    static $db = false;
    if ($db !== false) return $db;
    $configFile = __DIR__ . '/cms-config.php';
    if (!is_file($configFile)) return $db = null;
    $config = require $configFile;
    try {
        return $db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['database'] . ';charset=utf8mb4', $config['username'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } catch (Throwable $e) {
        error_log('STAC CMS database connection failed: ' . $e->getMessage());
        return $db = null;
    }
}

function stac_cms_content(string $page, string $fallback): string
{
    $db = stac_cms_db();
    if (!$db) return $fallback;
    try {
        $q = $db->prepare('SELECT content FROM cms_pages WHERE page = ?');
        $q->execute([$page]);
        $content = $q->fetchColumn();
        return $content === false || $content === '' ? $fallback : $content;
    } catch (Throwable $e) { return $fallback; }
}

function stac_cms_render_output(string $html): string
{
    $page = $GLOBALS['stac_cms_preview_page'] ?? basename(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: ($_SERVER['SCRIPT_NAME'] ?? 'index.php'));
    $start = '<!-- STAC_CMS_CONTENT_START -->';
    $end = '<!-- STAC_CMS_CONTENT_END -->';
    $a = strpos($html, $start); $b = strpos($html, $end);
    if ($a === false || $b === false || $b < $a) return $html;
    $from = $a + strlen($start);
    $html = substr_replace($html, stac_cms_content($page, substr($html, $from, $b - $from)), $from, $b - $from);
    if (!empty($GLOBALS['stac_cms_visual_preview'])) {
        $html = str_replace([$start, $end], '', $html);
        $html = str_replace('<div class="gdlr-core-page-builder-body">', '<div class="gdlr-core-page-builder-body" id="stac-cms-edit-area" contenteditable="true">', $html);
        $html = str_replace('<head>', '<head><base href="/">', $html);
        $script = <<<'HTML'
<script>
document.addEventListener('DOMContentLoaded',()=>{
 const area=document.getElementById('stac-cms-edit-area');if(!area)return;
 const style=document.createElement('style');style.textContent='header,footer{display:none!important}#stac-cms-edit-area{outline:2px dashed #1976d2;outline-offset:3px;min-height:20px}#stac-cms-edit-area:focus{outline-style:solid}#stac-cms-edit-area *:hover{outline:1px dashed #1976d2;outline-offset:2px}#stac-cms-edit-area img[data-cms-selected],#stac-cms-edit-area [data-cms-bg-selected]{outline:3px solid #ef9b20;cursor:pointer}';document.head.append(style);
 let selectedImage=null,selectedBackground=null,savedRange=null;
 area.addEventListener('input',()=>parent.postMessage({type:'stac-cms-dirty'},location.origin));
 area.addEventListener('click',event=>{if(event.target.closest('a'))event.preventDefault();if(selectedImage)selectedImage.removeAttribute('data-cms-selected');if(selectedBackground)selectedBackground.removeAttribute('data-cms-bg-selected');selectedImage=event.target.closest('img');selectedBackground=null;if(selectedImage)selectedImage.setAttribute('data-cms-selected','true');else for(let node=event.target;node&&node!==area;node=node.parentElement){if(getComputedStyle(node).backgroundImage!=='none'){selectedBackground=node;node.setAttribute('data-cms-bg-selected','true');break;}}parent.postMessage({type:'stac-cms-image-state',selected:!!(selectedImage||selectedBackground)},location.origin);});
 window.addEventListener('message',event=>{
  if(event.origin!==location.origin)return;
  if(event.data?.type==='stac-cms-read-content'){const copy=area.cloneNode(true);copy.removeAttribute('id');copy.removeAttribute('contenteditable');copy.querySelectorAll('[data-cms-selected],[data-cms-bg-selected]').forEach(image=>{image.removeAttribute('data-cms-selected');image.removeAttribute('data-cms-bg-selected');});parent.postMessage({type:'stac-cms-content',content:copy.innerHTML},location.origin);}
  if(event.data?.type==='stac-cms-store-selection'){const selection=getSelection();savedRange=selection?.rangeCount?selection.getRangeAt(0).cloneRange():null;}
  if(event.data?.type==='stac-cms-command'){area.focus();document.execCommand(event.data.command,false,null);}
  if(event.data?.type==='stac-cms-image-uploaded'){
   if(event.data.replace&&selectedImage){selectedImage.src=event.data.url;selectedImage.removeAttribute('data-cms-selected');selectedImage=null;parent.postMessage({type:'stac-cms-image-state',selected:false},location.origin);}
   else if(event.data.replace&&selectedBackground){selectedBackground.style.backgroundImage='url("'+event.data.url+'")';selectedBackground.removeAttribute('data-cms-bg-selected');selectedBackground=null;parent.postMessage({type:'stac-cms-image-state',selected:false},location.origin);}
   else {const image=document.createElement('img');image.src=event.data.url;image.alt='';const selection=getSelection();if(savedRange){savedRange.insertNode(image);savedRange=null;}else if(selection?.rangeCount){selection.getRangeAt(0).insertNode(image);}else area.append(image);}
   parent.postMessage({type:'stac-cms-dirty'},location.origin);
  }
 });
});
</script>
HTML;
        $html = str_replace('</body>', $script . '</body>', $html);
    } elseif (!empty($_SESSION['stac_cms_logged_in'])) $html = str_replace('</body>', '<a href="/admin/" style="position:fixed;right:16px;bottom:16px;z-index:99999;background:#123b70;color:white;padding:12px 18px;border-radius:6px;font:14px sans-serif">Edit this page</a></body>', $html);
    return $html;
}
