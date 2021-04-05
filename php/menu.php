<?php 
$menu = '<div class="vertical">
<h3>Patisport</h3>
<a href="#">Accueil</a>
<a href="contact.html">Contact</a>
<img src="./img/flocon.svg" alt="flocon">
<h3>Produits</h3>';
for ($i=0; $i < count($_SESSION["categories"]); $i++) { 
    switch ($_SESSION["categories"][$i]) {
        case 'lacets':
            $menu .= "<a href='produits.php?categorie=lacets'>Lacets</a>";
            break;
        case 'proteges':
            $menu .= "<a href='produits.php?categorie=proteges'>Protèges lames</a>";
            break;
        case 'patins':
            $menu .= "<a href='produits.php?categorie=patins'>Patins</a>";
            break;
        default:
            $menu .= "<a href='produits.php?categorie=".$_SESSION["categories"][$i]."'>".$_SESSION["categories"][$i]."</a>";
            break;
    }
}
$menu .= "</div>";

echo $menu;
?>