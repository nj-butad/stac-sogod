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
        $html = str_replace('</head>', '<base href="/"></head>', $html);
        $script = <<<'HTML'
<script>
document.addEventListener('DOMContentLoaded',()=>{
 const style=document.createElement('style');style.textContent='#stac-cms-edit-area{outline:2px dashed #1976d2;outline-offset:3px;min-height:20px}#stac-cms-edit-area:focus{outline-style:solid}';document.head.append(style);
 const walker=document.createTreeWalker(document,NodeFilter.SHOW_COMMENT);let start,end;
 while(walker.nextNode()){if(walker.currentNode.nodeValue.trim()==='STAC_CMS_CONTENT_START')start=walker.currentNode;if(walker.currentNode.nodeValue.trim()==='STAC_CMS_CONTENT_END')end=walker.currentNode;}
 if(!start||!end)return;const range=document.createRange();range.setStartAfter(start);range.setEndBefore(end);const area=document.createElement('div');area.id='stac-cms-edit-area';area.contentEditable='true';range.surroundContents(area);
 window.addEventListener('message',event=>{if(event.origin!==location.origin||event.data?.type!=='stac-cms-read-content')return;parent.postMessage({type:'stac-cms-content',content:area.innerHTML},location.origin);});
});
</script>
HTML;
        $html = str_replace('</body>', $script . '</body>', $html);
    } elseif (!empty($_SESSION['stac_cms_logged_in'])) $html = str_replace('</body>', '<a href="/admin/" style="position:fixed;right:16px;bottom:16px;z-index:99999;background:#123b70;color:white;padding:12px 18px;border-radius:6px;font:14px sans-serif">Edit this page</a></body>', $html);
    return $html;
}
