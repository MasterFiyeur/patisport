
<?php
session_start();
$data = file_get_contents(__DIR__.'/../js/produits.json');
$produits = json_decode($data, true);
$_SESSION["categories"] = $produits[0]["categories"];
$_SESSION["produits"] = $produits[1];

echo '<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Théo Julien & Alan Dabrowski">
    <meta name="description" content="Projet de developpement web">
    <meta name="keywords" content="Boutique, Patinage, Patisport, Artistique">
    <title>Patisport</title>

    <link rel="stylesheet" href="css/style.css">
</head>';
?>