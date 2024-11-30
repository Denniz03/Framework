<?php
// Configuratie laden
include_once '../../src/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Pagina Niet Gevonden</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            text-align: center;
            background-color: <?= $site_color === 'red' ? '#ffdddd' : '#f4f4f4' ?>;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            font-size: 3rem;
            color: <?= $site_color ?>;
        }
        p {
            font-size: 1.2rem;
            margin: 10px 0;
        }
        a {
            color: <?= $site_color ?>;
            text-decoration: none;
            font-weight: bold;
        }
        .logo {
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="<?= $site_logo ?>" alt="Site Logo">
    </div>
    <h1>404 - Pagina Niet Gevonden</h1>
    <p>Sorry, de pagina die je zoekt bestaat niet.</p>
    <p>Keer terug naar de <a href="/">homepagina</a> of <a href="/contact">neem contact op</a>.</p>
</body>
</html>
