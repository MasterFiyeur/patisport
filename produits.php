<!DOCTYPE html>
<html lang="fr">
    <?php
        include "./php/header.php";
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/produits.css">
</head>
<body>
    <div class="modal" tabindex="-1" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attention</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <?php
        include "./php/functions.php";
        $admin = false;
        if(isset($_SESSION["user"]) && isset($_SESSION["usermdp"])){
            if(auth($_SESSION["user"],$_SESSION["usermdp"]) == 2){
                $admin = true;
            }
        }
        $categorie = choixCat($categories);
        $produits = getProduits($categorie);
        $showModale = 0;
        if(!isset($_SESSION["user"]) && !empty($_POST)){
            $showModale = 1;
            echo "<p>Vous devez être connecté pour ajouter un produit au panier.</p>";
        }elseif(!empty($_POST)){
            $tableau = array($_POST["ref"],intval($_POST["nombre_produit"]));
            if(verifstock($tableau,$produits)>=0 && intval($_POST["nombre_produit"])>0){
                if(in_panier($tableau)){
                    array_push($_SESSION["panier"],$tableau);
                }
            }elseif((intval($_POST["nombre_produit"])>0)){
                $showModale = 2;
                echo "<p>Le stock ne permet pas d'ajouter ce(s) article(s) au panier.</p>";
            }
        }
    ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <?php
                if($showModale==1){
                    echo '<a href="connexion.php"><button type="button" class="btn btn-primary">Se connecter</button></a>';
                }
                ?>
            </div>
            </div>
        </div>
    </div>
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
                                                    <?php echo stockDisponible(array($produits[$i]["ref"],0),$produits); ?>
                                                </div>
                                                <div class='gestion_stock'>
                                                    <input type='hidden' name='ref' 
                                                        value= <?php echo "'".$produits[$i]["ref"]."'"; ?>
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
                <?php
                    if($admin==true){
                ?>
                <button class="btn_stock-switch" onclick="stock_switch()"><img id="toggle_stock" src="./img/produits/show.svg"></button>
                <?php }else{
                    echo "<style>.stock{display:none;}</style>";
                } ?>
            </div>
        </div>
    </main>
    <?php
        include './php/footer.php';
    ?>
    <?php
    if($showModale>0){
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    </script>
    <?php } ?>
    <script type="text/javascript" src="./js/produits.js"></script>
</body>
</html>