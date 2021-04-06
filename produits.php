<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "./php/header.php";
    ?>
    <link rel="stylesheet" href="css/produits.css">
</head>
<body>
    <?php
        include "./php/navbar.php";
    ?>
    <main>
        <div class="milieu">
            <?php 
                include "./php/menu.php";
            ?>
            <div class="display_block">
                <div class="content">
                    <?php
                        include "./php/functions.php";
                        if(!isset($_SESSION["user"]) && !empty($_POST)){
                            echo '<script>alert("Vous devez être connecté pour ajouter un produit au panier");</script>';
                        }elseif(!empty($_POST)){
                            $tableau = array($_POST["categorie"],intval($_POST["index"]),intval($_POST["nombre_produit"]));
                            if(verifstock($tableau)>=0 && intval($_POST["nombre_produit"])>0){
                                if(in_panier($tableau)){
                                    array_push($_SESSION["panier"],$tableau);
                                }
                            }elseif((intval($_POST["nombre_produit"])>0)){
                                echo '<script>alert("Le stock ne permet pas d\'ajouter ce(s) article(s) au panier.");</script>';
                            }
                        }
                        if (isset($_GET["categorie"]) && in_array($_GET["categorie"],$_SESSION["categories"])) {
                            $categorie =  $_GET["categorie"];
                        }else{
                            $categorie="lacets";
                        }
                        if(isset($_SESSION["produits"][$categorie])){
                            for ($i=0; $i < count($_SESSION["produits"][$categorie]); $i++) { 
                                echo "<div class='carte'>
                                    <div class='imageBox'>
                                        <img ".$_SESSION["produits"][$categorie][$i]["img"].">
                                    </div>
                                    <div class='contentBox'>
                                        <h3>".$_SESSION["produits"][$categorie][$i]["label"]." <small>(".$_SESSION["produits"][$categorie][$i]["ref"].")</small></h3>
                                        <h2 class='prix'>€".$_SESSION["produits"][$categorie][$i]["prix"]."</h2>
                                        <div class='hidden_contentBox'>
                                            <form action='' method='POST'>
                                                <div class='stock'>Stock : ".stockDisponible(array($categorie,$i,0))."</div>
                                                <div class='gestion_stock'>
                                                    <input type='hidden' name='categorie' value='".$categorie."'>
                                                    <input type='hidden' name='index' value='".$i."'>
                                                    <input type='button' class='moins_stock' onclick='del_stock(".($i+1).")' value='-'>
                                                    <input type='text' name='nombre_produit' id='nombre_produit' value='0'>
                                                    <input type='button' class='plus_stock' onclick='add_stock(".($i+1).")' value='+'>
                                                </div>
                                                <input type='submit' class='btn_acheter' value='Acheter'>
                                            </form>
                                        </div>
                                    </div>
                                </div>";
                            }
                        }else{
                            echo "<div>Il n'y a aucun produit disponible pour cette catégorie</div>";
                        }
                    ?>
                </div>
                <button class="btn_stock-switch" onclick="stock_switch()"><img id="toggle_stock" src="./img/produits/show.svg"></button>
            </div>
        </div>
    </main>
    <?php
        include './php/footer.php';
    ?>
    <script type="text/javascript" src="./js/produits.js"></script>
</body>
</html>