<?php

// Haal de pagina op uit de URL
//$page_name = $_GET['page'] ?? 'home';
$page_name = preg_replace('/[^a-z0-9_-]/i', '', $_GET['page'] ?? 'home');

// Query de database om de layout en componenten op te halen
$query = $pdo->prepare("SELECT sections FROM templates WHERE name = ?");
$query->execute([$page_name]);
$page = $query->fetch();

if (!$page) {
    echo "Page not found!";
    exit;
}

$components = explode(',', $page['components']);

// Laad elk component en zijn artikelen
foreach ($components as $component) {
    $query_articles = $pdo->prepare("SELECT * FROM articles WHERE page = ? AND component = ?");
    $query_articles->execute([$page_name, $component]);
    $articles = $query_articles->fetchAll();

    // Include het componentbestand
    include "components/{$component}.php";
}
?>
