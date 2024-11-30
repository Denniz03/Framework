<?php
require_once '../config.php';
require_once '../db.php';

// Controleer de HTTP-methode en parameters
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';
$query = $_GET['query'] ?? '';
$user_role = $_SESSION['user_group_id'] ?? 0; // Rol van de ingelogde gebruiker

header('Content-Type: application/json');

// API-functionaliteiten
try {
    // Controleer of een query is opgegeven en geen actie
    if ($method === 'GET' && !empty($query) && empty($action)) {
        $action = 'search'; // Stel de standaardactie in op 'search'
    }

    switch ($method) {
        case 'GET':
            if ($action === 'read') {
                // Lees gebruikers
                if ($user_role > 1) { // Alleen toegankelijk voor Admin en Manager
                    http_response_code(403);
                    echo json_encode(['error' => 'Unauthorized']);
                    exit;
                }
                $stmt = $pdo->query("SELECT user_id, username, email, first_name, last_name FROM users");
                echo json_encode($stmt->fetchAll());
            } elseif ($action === 'read_single' && isset($_GET['id'])) {
                // Lees een specifieke gebruiker
                if ($user_role > 1) { // Alleen toegankelijk voor Admin en Manager
                    http_response_code(403);
                    echo json_encode(['error' => 'Unauthorized']);
                    exit;
                }
                $stmt = $pdo->prepare("SELECT user_id, username, email, first_name, last_name FROM users WHERE user_id = ?");
                $stmt->execute([$_GET['id']]);
                $result = $stmt->fetch();
                if ($result) {
                    echo json_encode($result);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'User not found']);
                }
            } elseif ($action === 'search') {
                // Zoek gebruikers
                $search_query = $query; // Haal query uit URL
                $sql = "SELECT user_id, username, email, first_name, last_name FROM users WHERE username LIKE ? OR email LIKE ?";
                $params = ["%$search_query%", "%$search_query%"];
                if ($user_role === 1) { // Admin heeft volledig toegang
                    $sql = "SELECT * FROM users WHERE username LIKE ? OR email LIKE ?";
                }
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
                echo json_encode($stmt->fetchAll());
            }
            break;
        case 'POST':
            if ($action === 'create') {
                // Voeg een nieuwe gebruiker toe
                if ($user_role > 1) { // Alleen Admin mag gebruikers aanmaken
                    http_response_code(403);
                    echo json_encode(['error' => 'Unauthorized']);
                    exit;
                }
                $data = json_decode(file_get_contents("php://input"), true);
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->execute([
                    $data['username'],
                    $data['email'],
                    password_hash($data['password'], PASSWORD_BCRYPT)
                ]);
                echo json_encode(['status' => 'success', 'user_id' => $pdo->lastInsertId()]);
            }
            break;
        case 'PUT':
            if ($action === 'update' && isset($_GET['id'])) {
                // Werk een gebruiker bij
                if ($user_role > 1) { // Alleen Admin mag gebruikers bijwerken
                    http_response_code(403);
                    echo json_encode(['error' => 'Unauthorized']);
                    exit;
                }
                $data = json_decode(file_get_contents("php://input"), true);
                $stmt = $pdo->prepare("UPDATE users SET email = ?, username = ? WHERE user_id = ?");
                $stmt->execute([
                    $data['email'],
                    $data['username'],
                    $_GET['id']
                ]);
                echo json_encode(['status' => 'updated']);
            }
            break;
        case 'DELETE':
            if ($action === 'delete' && isset($_GET['id'])) {
                // Verwijder een gebruiker
                if ($user_role > 1) { // Alleen Admin mag gebruikers verwijderen
                    http_response_code(403);
                    echo json_encode(['error' => 'Unauthorized']);
                    exit;
                }
                $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = ?");
                $stmt->execute([$_GET['id']]);
                echo json_encode(['status' => 'deleted']);
            }
            break;
        default:
            http_response_code(405); // Methode niet toegestaan
            echo json_encode(['error' => 'Invalid request method']);
    }
} catch (Exception $e) {
    http_response_code(500); // Interne serverfout
    echo json_encode(['error' => 'Server error', 'details' => $e->getMessage()]);
}
