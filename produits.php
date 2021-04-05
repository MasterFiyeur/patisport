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
                                            <form action=''>
                                                <div class='stock'>Stock : ".$_SESSION["produits"][$categorie][$i]["stock"]."</div>
                                                <div class='gestion_stock'>
                                                    <input type='button' class='moins_stock' onclick='del_stock(".$i.")' value='-'>
                                                    <input type='text' name='nombre_produit' id='nombre_produit' value='0' disabled>
                                                    <input type='button' class='plus_stock' onclick='add_stock(".$i.")' value='+'>
                                                </div>
                                                <button class='btn_acheter'>Acheter</button>
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