<?php
require_once '../db.php';
require_once '../scripts.php'; // Hierin staat logActivity()

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $activity_page = $input['activity_page'] ?? 'unknown';
    $activity_class = $input['activity_class'] ?? 'unknown';
    $activity_message = $input['activity_message'] ?? 'No message';
    $activity_details = $input['activity_details'] ?? null;
    $created_by = $_SESSION['user_id'] ?? 'system'; // Haal gebruiker uit sessie

    logActivity($pdo, $activity_page, $activity_class, $activity_message, $activity_details, $created_by);

    echo json_encode(['status' => 'success']);
}
