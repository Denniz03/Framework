<?php
// Laad configuratie
require_once 'config.php';

try {
    // Maak een nieuwe PDO-instantie
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Zet foutmeldingmodus aan
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Associatieve arrays standaard
            PDO::ATTR_EMULATE_PREPARES => false, // Gebruik echte prepared statements
        ]
    );
} catch (PDOException $e) {
    // Foutmelding als de verbinding mislukt
    die("Database connection failed: " . $e->getMessage());
}
?>
