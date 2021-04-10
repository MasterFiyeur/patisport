
<div class="vertical">
    <h3>Patisport</h3>
    <a href="index.php">Accueil</a>
    <a href="contact.php">Contact</a>
    <img src="./img/flocon.svg" alt="flocon">
    <h3>Produits</h3>

<?php foreach($_SESSION["categories"] as $categorie => $label){//Mettre des id
    echo "<a href='produits.php?categorie=".$categorie."'>".$label."</a>";
} ?>

</div>