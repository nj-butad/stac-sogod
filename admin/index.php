<?php
session_start();
require_once __DIR__ . '/../includes/cms.php';
$db = stac_cms_db();
if (!$db) { http_response_code(503); exit('CMS database is not configured. Copy includes/cms-config.example.php to includes/cms-config.php and add your Hostinger MySQL details.'); }
$db->exec('CREATE TABLE IF NOT EXISTS cms_admin (id TINYINT UNSIGNED PRIMARY KEY, password_hash VARCHAR(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');
$db->exec('CREATE TABLE IF NOT EXISTS cms_pages (page VARCHAR(190) PRIMARY KEY, content MEDIUMTEXT NOT NULL, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');
$hasAdmin = (bool)$db->query('SELECT COUNT(*) FROM cms_admin')->fetchColumn();
if (isset($_GET['logout'])) { $_SESSION = []; session_destroy(); header('Location: ./'); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) { http_response_code(403); exit('Invalid request. Refresh and try again.'); }
    if (!$hasAdmin && isset($_POST['new_password'])) {
        if (strlen($_POST['new_password']) < 12) $error = 'Choose a password with at least 12 characters.';
        else { $q = $db->prepare('INSERT INTO cms_admin (id, password_hash) VALUES (1, ?)'); $q->execute([password_hash($_POST['new_password'], PASSWORD_DEFAULT)]); $hasAdmin = true; $_SESSION['stac_cms_logged_in'] = true; }
    } elseif (empty($_SESSION['stac_cms_logged_in']) && isset($_POST['password'])) {
        $hash = $db->query('SELECT password_hash FROM cms_admin WHERE id = 1')->fetchColumn();
        if ($hash && password_verify($_POST['password'], $hash)) { session_regenerate_id(true); $_SESSION['stac_cms_logged_in'] = true; }
        else $error = 'Incorrect password.';
    }
}
$_SESSION['csrf'] ??= bin2hex(random_bytes(32));
$pages = array_values(array_filter(glob(__DIR__ . '/../*.php'), fn($f) => !in_array(basename($f), ['organizational-structure-admin.php'], true)));
$pageNames = array_map('basename', $pages);
$selected = in_array($_GET['page'] ?? '', $pageNames, true) ? $_GET['page'] : 'index.php';
?><!doctype html><html lang="en"><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>STAC Site Editor</title>
<style>body{font:16px system-ui,sans-serif;background:#f2f5f8;color:#182b43;margin:0}.wrap{max-width:1200px;margin:32px auto;padding:24px;background:white;border-radius:12px;box-shadow:0 5px 24px #18304a15}h1{margin:0}.top{display:flex;align-items:center;justify-content:space-between}.toolbar{display:flex;align-items:center;gap:8px;margin:18px 0;flex-wrap:wrap}.toolbar select{max-width:280px}.toolbar button,button{font:inherit;padding:10px 14px;border:0;border-radius:6px;background:#123b70;color:white;cursor:pointer}.toolbar button:disabled{opacity:.45;cursor:not-allowed}.tools{display:flex;gap:4px}.tools button{min-width:40px;padding:9px}.toolbar a{margin-left:auto}select{font:inherit;padding:10px;border:1px solid #cbd5df;border-radius:6px;width:100%;box-sizing:border-box}.hint{color:#516273;font-size:14px}.status{margin-left:6px;color:#23633d}iframe{width:100%;height:75vh;border:1px solid #cbd5df;border-radius:8px;background:white}.login input{font:inherit;padding:11px;border:1px solid #cbd5df;border-radius:6px;box-sizing:border-box}.login{max-width:460px}.login label{display:block;font-weight:650;margin:18px 0 7px}.notice{padding:12px;background:#e8f4ff;margin:16px 0}.error{background:#fff0ef}a{color:#123b70}@media(max-width:700px){.wrap{margin:10px;padding:16px}.toolbar select{max-width:none;width:100%}.toolbar a{margin-left:0}}</style><div class="wrap"><div class="top"><h1>STAC Site Editor</h1><?php if (!empty($_SESSION['stac_cms_logged_in'])): ?><a href="?logout=1">Log out</a><?php endif; ?></div>
<?php if (empty($_SESSION['stac_cms_logged_in'])): ?>
<p><?= $hasAdmin ? 'Enter your admin password.' : 'Create the owner password. It will be stored securely as a hash in the Hostinger database.' ?></p><?php if (!empty($error)): ?><p class="notice error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form class="login" method="post"><input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>"><label><?= $hasAdmin ? 'Password' : 'Create password (12+ characters)' ?></label><input type="password" name="<?= $hasAdmin ? 'password' : 'new_password' ?>" required minlength="<?= $hasAdmin ? 1 : 12 ?>" autocomplete="<?= $hasAdmin ? 'current-password' : 'new-password' ?>"><button><?= $hasAdmin ? 'Log in' : 'Set admin password' ?></button></form>
<?php else: ?>
<p class="hint">Click text in the preview to edit it. Select an image to replace it, or place the cursor and insert a new one. Save when finished.</p>
<div class="toolbar"><select id="page" aria-label="Choose page"><?php foreach ($pageNames as $p): ?><option value="<?= htmlspecialchars($p) ?>" <?= $p === $selected ? 'selected' : '' ?>><?= htmlspecialchars($p) ?></option><?php endforeach; ?></select><span class="tools"><button type="button" data-command="bold" title="Bold selected text"><b>B</b></button><button type="button" data-command="italic" title="Italic selected text"><i>I</i></button><button type="button" data-command="underline" title="Underline selected text"><u>U</u></button></span><button type="button" id="insert-image">Insert image</button><button type="button" id="replace-image" disabled>Replace selected image</button><input type="file" id="image-file" accept="image/jpeg,image/png,image/webp,image/gif" hidden><button type="button" id="save">Save changes</button><span id="status" class="status" role="status"></span><a target="_blank" href="../<?= rawurlencode($selected) ?>">Open public page</a></div>
<iframe id="preview" title="Visual page editor" src="preview.php?page=<?= rawurlencode($selected) ?>"></iframe>
<script>
const page=document.querySelector('#page'),frame=document.querySelector('#preview'),status=document.querySelector('#status');
page.addEventListener('change',()=>location.href='?page='+encodeURIComponent(page.value));
document.querySelector('#save').addEventListener('click',()=>{status.textContent='Saving…';frame.contentWindow.postMessage({type:'stac-cms-read-content'},location.origin)});
document.querySelectorAll('[data-command]').forEach(button=>button.addEventListener('click',()=>frame.contentWindow.postMessage({type:'stac-cms-command',command:button.dataset.command},location.origin)));
const imageFile=document.querySelector('#image-file'),replaceButton=document.querySelector('#replace-image');let replaceImage=false;
document.querySelector('#insert-image').addEventListener('click',()=>{replaceImage=false;frame.contentWindow.postMessage({type:'stac-cms-store-selection'},location.origin);imageFile.click();});
replaceButton.addEventListener('click',()=>{replaceImage=true;imageFile.click();});
imageFile.addEventListener('change',async()=>{const file=imageFile.files[0];if(!file)return;status.textContent='Uploading image…';try{const form=new FormData();form.append('image',file);const response=await fetch('upload.php',{method:'POST',headers:{'X-CSRF-Token':<?= json_encode($_SESSION['csrf']) ?>},body:form});const result=await response.json();if(!response.ok)throw new Error(result.error||'Image upload failed.');frame.contentWindow.postMessage({type:'stac-cms-image-uploaded',url:result.url,replace:replaceImage},location.origin);status.textContent='Image added. Save changes to publish it.';}catch(error){status.textContent=error.message;}finally{imageFile.value='';}});
window.addEventListener('message',async event=>{if(event.origin!==location.origin)return;if(event.data?.type==='stac-cms-image-state'){replaceButton.disabled=!event.data.selected;return;}if(event.data?.type!=='stac-cms-content')return;try{const response=await fetch('save.php',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-Token':<?= json_encode($_SESSION['csrf']) ?>},body:JSON.stringify({page:page.value,content:event.data.content})});const result=await response.json();if(!response.ok)throw new Error(result.error||'Could not save changes.');status.textContent='Saved';frame.contentWindow.location.reload();}catch(error){status.textContent=error.message;}});
</script><?php endif; ?></div></html>
