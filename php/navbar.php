<?php 
$menu = '<header class="nav_header">
    <div class="logo_nom">
        <div>
            <img src="img/logo.svg" alt="logo">
        </div>
        <div class="nav_text">
            Bienvenue dans la boutique Patisport
        </div>
        <div class="nav_buttons">';
if(!isset($_SESSION["user"])){
    $menu .= '<form action="connexion.php">
    <input type="submit" value="Connexion">
</form>';
}else{
    $menu .= '<form action="connexion.php" method="GET">
        <input type="hidden" name="deconnexion" value="yes">
        <input type="submit" value="Déconnexion">
    </form>';
}

$menu .=    '<a href="panier.php">Panier</a>
        </div>
    </div>
    <div class="nav_menu">
        <a href="index.php">Accueil</a>';
foreach($_SESSION["categories"] as $categorie => $label){//Mettre des id
    $menu .= "<a href='produits.php?categorie=".$categorie."'>".$label."</a>";
}

$menu .= '<a href="contact.php">Contactez-nous</a>
    </div>
</header>';

echo $menu;
?>