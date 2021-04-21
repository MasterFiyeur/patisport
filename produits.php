<!DOCTYPE html>
<html lang="fr">
    <?php 
        include "./php/header.php";
        include "./php/functions.php";
        $categorie = choixCat($categories);
        $produits = getProduits($categorie);
        if(!isset($_SESSION["user"]) && !empty($_POST)){
            echo '<script>alert("Vous devez être connecté pour ajouter un produit au panier");</script>';
        }elseif(!empty($_POST)){
            $tableau = array($_POST["categorie"],intval($_POST["index"]),intval($_POST["nombre_produit"]));
            if(verifstock($tableau,$produits)>=0 && intval($_POST["nombre_produit"])>0){
                if(in_panier($tableau)){
                    array_push($_SESSION["panier"],$tableau);
                }
            }elseif((intval($_POST["nombre_produit"])>0)){
                echo '<script>alert("Le stock ne permet pas d\'ajouter ce(s) article(s) au panier.");</script>';
            }
        }
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
                        if(estExistante($categories,$categorie)){
                            /* Utilisation du for car besoin d'un indice $i pour le JS*/
                            for ($i=0; $i < count($produits); $i++) {
                            ?>
                                <div class='carte'>
                                    <div class='imageBox'>
                                        <img 
                                            <?php echo $produits[$i]["img"]; ?>
                                        >
                                    </div>
                                    <div class='contentBox'>
                                        <h3>
                                            <?php echo $produits[$i]["label"]; ?>
                                            <small>(
                                                <?php echo $produits[$i]["ref"]; ?>
                                            )</small>
                                        </h3>
                                        <h2 class='prix'>€
                                            <?php echo $produits[$i]["prix"]; ?>
                                        </h2>
                                        <div class='hidden_contentBox'>
                                            <form action='' method='POST'>
                                                <div class='stock'>Stock : 
                                                    <?php echo stockDisponible(array($categorie,$i,0),$produits); ?>
                                                </div>
                                                <div class='gestion_stock'>
                                                    <input type='hidden' name='categorie' 
                                                        value=<?php echo "'".$categorie."'"; ?>
                                                    >
                                                    <input type='hidden' name='index' 
                                                        value= <?php echo "'".$i."'"; ?>
                                                    >
                                                    <input type='button' class='moins_stock' 
                                                        <?php echo "onclick='del_stock(".($i+1).")'"; ?> 
                                                    value='-'>
                                                    <input type='text' name='nombre_produit' id='nombre_produit' value='0'>
                                                    <input type='button' class='plus_stock' 
                                                        <?php echo "onclick='add_stock(".($i+1).")'"; ?>
                                                    value='+'>
                                                </div>
                                                <input type='submit' class='btn_acheter' value='Acheter'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }else{ 
                            ?>
                            <div>Il n'y a aucun produit disponible pour cette catégorie</div>
                    <?php }
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