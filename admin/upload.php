<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
if (empty($_SESSION['stac_cms_logged_in'])) { http_response_code(401); exit(json_encode(['error' => 'Please log in again.'])); }
if (!hash_equals($_SESSION['csrf'] ?? '', $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '')) { http_response_code(403); exit(json_encode(['error' => 'Refresh the editor and try again.'])); }
$file = $_FILES['image'] ?? null;
if (!$file || $file['error'] !== UPLOAD_ERR_OK || $file['size'] > 8 * 1024 * 1024) { http_response_code(400); exit(json_encode(['error' => 'Choose an image under 8 MB.'])); }
$mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
$extensions = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
$image = @getimagesize($file['tmp_name']);
if (!isset($extensions[$mime]) || !$image || $image[0] > 8000 || $image[1] > 8000) { http_response_code(400); exit(json_encode(['error' => 'Use a valid JPG, PNG, WebP, or GIF image (maximum 8000 × 8000).'])); }
$directory = dirname(__DIR__) . '/uploads';
if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) { http_response_code(500); exit(json_encode(['error' => 'The image folder could not be created.'])); }
if (!is_file($directory . '/.htaccess')) file_put_contents($directory . '/.htaccess', "Options -ExecCGI\n<FilesMatch \"\\.(php[0-9]?|phtml|phar)$\">\nRequire all denied\n</FilesMatch>\n");
$name = bin2hex(random_bytes(16)) . '.' . $extensions[$mime];
if (!move_uploaded_file($file['tmp_name'], $directory . '/' . $name)) { http_response_code(500); exit(json_encode(['error' => 'The image could not be saved.'])); }
echo json_encode(['url' => '/uploads/' . $name]);
