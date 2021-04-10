
<div class="vertical">
    <h3>Patisport</h3>
    <a href="index.php">Accueil</a>
    <a href="contact.php">Contact</a>
    <img src="./img/flocon.svg" alt="flocon">
    <h3>Produits</h3>

<?php 
$i = 0;
foreach($_SESSION["categories"] as $categorie => $label){
    echo "<a href='produits.php?categorie=".$i."'>".$label."</a>";
    $i += 1;
} ?>

</div>