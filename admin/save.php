<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
if (empty($_SESSION['stac_cms_logged_in'])) { http_response_code(401); exit(json_encode(['error' => 'Please log in again.'])); }
if (!hash_equals($_SESSION['csrf'] ?? '', $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '')) { http_response_code(403); exit(json_encode(['error' => 'Refresh the editor and try again.'])); }
$data = json_decode(file_get_contents('php://input'), true);
$page = basename($data['page'] ?? '');
if (!preg_match('/^[a-zA-Z0-9_-]+\.php$/', $page) || !is_file(__DIR__ . '/../' . $page) || !isset($data['content']) || !is_string($data['content'])) { http_response_code(400); exit(json_encode(['error' => 'Invalid page content.'])); }
require_once __DIR__ . '/../includes/cms.php';
$db = stac_cms_db();
if (!$db) { http_response_code(503); exit(json_encode(['error' => 'CMS database is unavailable.'])); }
$db->exec('CREATE TABLE IF NOT EXISTS cms_pages (page VARCHAR(190) PRIMARY KEY, content MEDIUMTEXT NOT NULL, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');
$q = $db->prepare('INSERT INTO cms_pages (page, content) VALUES (?, ?) ON DUPLICATE KEY UPDATE content = VALUES(content)');
$q->execute([$page, $data['content']]);
echo json_encode(['ok' => true]);
