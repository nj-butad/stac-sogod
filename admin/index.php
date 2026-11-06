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
<style>body{font:16px system-ui,sans-serif;background:#f2f5f8;color:#182b43;margin:0}.wrap{max-width:1200px;margin:32px auto;padding:24px;background:white;border-radius:12px;box-shadow:0 5px 24px #18304a15}h1{margin:0}.top{display:flex;align-items:center;justify-content:space-between}.toolbar{display:flex;align-items:center;gap:12px;margin:18px 0}.toolbar select{max-width:360px}.toolbar button,button{font:inherit;padding:11px 18px;border:0;border-radius:6px;background:#123b70;color:white;cursor:pointer}.toolbar a{margin-left:auto}select{font:inherit;padding:11px;border:1px solid #cbd5df;border-radius:6px;width:100%;box-sizing:border-box}.hint{color:#516273;font-size:14px}.status{margin-left:6px;color:#23633d}iframe{width:100%;height:75vh;border:1px solid #cbd5df;border-radius:8px;background:white}.login input{font:inherit;padding:11px;border:1px solid #cbd5df;border-radius:6px;box-sizing:border-box}.login{max-width:460px}.login label{display:block;font-weight:650;margin:18px 0 7px}.notice{padding:12px;background:#e8f4ff;margin:16px 0}.error{background:#fff0ef}a{color:#123b70}</style><div class="wrap"><div class="top"><h1>STAC Site Editor</h1><?php if (!empty($_SESSION['stac_cms_logged_in'])): ?><a href="?logout=1">Log out</a><?php endif; ?></div>
<?php if (empty($_SESSION['stac_cms_logged_in'])): ?>
<p><?= $hasAdmin ? 'Enter your admin password.' : 'Create the owner password. It will be stored securely as a hash in the Hostinger database.' ?></p><?php if (!empty($error)): ?><p class="notice error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form class="login" method="post"><input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>"><label><?= $hasAdmin ? 'Password' : 'Create password (12+ characters)' ?></label><input type="password" name="<?= $hasAdmin ? 'password' : 'new_password' ?>" required minlength="<?= $hasAdmin ? 1 : 12 ?>" autocomplete="<?= $hasAdmin ? 'current-password' : 'new-password' ?>"><button><?= $hasAdmin ? 'Log in' : 'Set admin password' ?></button></form>
<?php else: ?>
<p class="hint">Choose a page, click any text in the preview to edit it, then save. The shared site header and footer stay in place.</p>
<div class="toolbar"><select id="page" aria-label="Choose page"><?php foreach ($pageNames as $p): ?><option value="<?= htmlspecialchars($p) ?>" <?= $p === $selected ? 'selected' : '' ?>><?= htmlspecialchars($p) ?></option><?php endforeach; ?></select><button id="save">Save changes</button><span id="status" class="status" role="status"></span><a target="_blank" href="../<?= rawurlencode($selected) ?>">Open public page</a></div>
<iframe id="preview" title="Visual page editor" src="preview.php?page=<?= rawurlencode($selected) ?>"></iframe>
<script>
const page=document.querySelector('#page'),frame=document.querySelector('#preview'),status=document.querySelector('#status');
page.addEventListener('change',()=>location.href='?page='+encodeURIComponent(page.value));
document.querySelector('#save').addEventListener('click',()=>{status.textContent='Saving…';frame.contentWindow.postMessage({type:'stac-cms-read-content'},location.origin)});
window.addEventListener('message',async event=>{if(event.origin!==location.origin||event.data?.type!=='stac-cms-content')return;try{const response=await fetch('save.php',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-Token':<?= json_encode($_SESSION['csrf']) ?>},body:JSON.stringify({page:page.value,content:event.data.content})});const result=await response.json();if(!response.ok)throw new Error(result.error||'Could not save changes.');status.textContent='Saved';frame.contentWindow.location.reload();}catch(error){status.textContent=error.message;}});
</script><?php endif; ?></div></html>
