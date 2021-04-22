<?php
session_start();
$data = file_get_contents(__DIR__.'/../data/produits.json');
$produits = json_decode($data, true);
$_SESSION["categories"] = $produits[0]["categories"];
$_SESSION["produits"] = $produits[1];
include __DIR__.'/../bdd/bdd.php';
$categories = getCategories();
?>  

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Théo Julien & Alan Dabrowski">
    <meta name="description" content="Projet de developpement web">
    <meta name="keywords" content="Boutique, Patinage, Patisport, Artistique">
    <title>Patisport</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">