<?php
// Gebruik autoloaders of handmatige includes
require __DIR__ . '/../src/config.php';
require __DIR__ . '/../src/db.php';
require_once __DIR__ . '/../src/scripts.php';

// Route requests
$page = $_GET['page'] ?? 'home';
include 'page.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Website</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include '../src/components/header.php'; ?>
    <main id="main-content">
        <!-- Dynamische inhoud komt hier -->
    </main>
    <?php include '../src/components/footer.php'; ?>
    <script src="/public/assets/js/script.js"></script>
</body>
</html>
