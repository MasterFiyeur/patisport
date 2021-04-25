
<header class="nav_header">
    <div class="logo_nom">
        <div>
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="nav_text">
            Bienvenue dans la boutique Patisport
        </div>
        <div class="nav_buttons">
<?php 
if(isset($_SESSION["user"]) && isset($_SESSION["usermdp"]) && auth($_SESSION["user"],$_SESSION["usermdp"]) == 2){
    echo '<a href="admin.php">Gestion</a>';
}
if(!isset($_SESSION["user"])){ ?>
            <form action="connexion.php">
                <input type="submit" value="Connexion">
            </form>
<?php }else{ ?>
            <form action="connexion.php" method="GET">
                <input type="hidden" name="deconnexion" value="yes">
                <input type="submit" 
                <?php echo "value='".substr($_SESSION["user"],0,14)." - Déconnexion'"; ?>
                >
            </form>
<?php } ?>
            <a href="panier.php">Panier
            <?php 
                if(isset($_SESSION["panier"])){
                    echo "(".count($_SESSION["panier"]).")";
                }
            ?>
            </a>
        </div>
    </div>
    <div class="nav_menu">
        <a href="index.php">Accueil</a>

<?php
foreach($categories as $value){
    echo "<a href='produits.php?categorie=".$value["id"]."'>".$value["label"]."</a>";
} 
?>

        <a href="contact.php">Contactez-nous</a>
    </div>
</header>