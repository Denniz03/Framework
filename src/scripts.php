<?php

// Log activity
function logActivity($pdo, $activity_page, $activity_class, $activity_message, $activity_details = null, $created_by = null) {
    $stmt = $pdo->prepare("
        INSERT INTO log (activity_page, activity_class, activity_message, activity_details, ip_address, user_agent, created_on, created_by)
        VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)
    ");
    
    $stmt->execute([
        $activity_page,
        $activity_class,
        $activity_message,
        $activity_details ? json_encode($activity_details) : null,
        $_SERVER['REMOTE_ADDR'],
        $_SERVER['HTTP_USER_AGENT'],
        $created_by,
    ]);
}

// Get cache
function getCache($key) {
    $file = __DIR__ . "/cache/{$key}.cache";
    if (file_exists($file) && time() - filemtime($file) < 3600) { // 1 uur
        return json_decode(file_get_contents($file), true);
    }
    return null;
}

// Set cache
function setCache($key, $data) {
    $file = __DIR__ . "/cache/{$key}.cache";
    file_put_contents($file, json_encode($data));
}

// Validate posta code
function validatePostalCode($country_id, $postal_code) {
    global $pdo; // Veronderstel een PDO-verbinding
    
    $stmt = $pdo->prepare("SELECT country_postal_code_format FROM countries WHERE country_id = ?");
    $stmt->execute([$country_id]);
    $format = $stmt->fetchColumn();

    if (!$format) {
        return true; // Geen validatie als er geen formaat is gedefinieerd
    }

    return preg_match("/$format/", $postal_code);
}

?>