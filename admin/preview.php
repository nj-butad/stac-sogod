<?php
session_start();
if (empty($_SESSION['stac_cms_logged_in'])) { http_response_code(403); exit('Log in to preview pages in the editor.'); }
$page = basename($_GET['page'] ?? 'index.php');
if (!preg_match('/^[a-zA-Z0-9_-]+\.php$/', $page) || !is_file(__DIR__ . '/../' . $page)) { http_response_code(404); exit('Page not found.'); }
require_once __DIR__ . '/../includes/cms.php';
$GLOBALS['stac_cms_preview_page'] = $page;
$GLOBALS['stac_cms_visual_preview'] = true;
$_SERVER['REQUEST_URI'] = '/' . $page;
$_SERVER['SCRIPT_NAME'] = '/' . $page;
require __DIR__ . '/../' . $page;
