<?php
$file = $_GET['file'] ?? '';
$path = realpath(__DIR__ . '/../uploads/' . $file);

// Controleer of bestand bestaat en binnen de `uploads` map ligt
if ($path && file_exists($path) && strpos($path, realpath(__DIR__ . '/../uploads')) === 0) {
    header('Content-Type: ' . mime_content_type($path));
    readfile($path);
    exit;
}

http_response_code(404);
echo 'File not found.';
