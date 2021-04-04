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
                        $fileData = file_get_contents('./js/produits.json');
                        $produits = json_decode($fileData, true);
                        if (isset($_GET["categorie"]) && in_array($_GET["categorie"],$produits[0]["categories"])) {
                            $categorie =  $_GET["categorie"];
                        }else{
                            $categorie="lacets";
                        }
                        for ($i=0; $i < count($produits[1][$categorie]); $i++) { 
                            echo "<div class='carte'>
                                <div class='imageBox'>
                                    <img ".$produits[1][$categorie][$i]["img"].">
                                </div>
                                <div class='contentBox'>
                                    <h3>".$produits[1][$categorie][$i]["label"]."</h3>
                                    <h2 class='prix'>€".$produits[1][$categorie][$i]["prix"]."</h2>
                                    <div class='hidden_contentBox'>
                                        <form action=''>
                                            <div class='stock'>Stock : ".$produits[1][$categorie][$i]["stock"]."</div>
                                            <div class='gestion_stock'>
                                                <div class='moins_stock' onclick='del_stock(".$i.")'>-</div>
                                                <input type='text' name='nombre_produit' id='nombre_produit' value='0' disabled>
                                                <div class='plus_stock' onclick='add_stock(".$i.")'>+</div>
                                            </div>
                                            <button class='btn_acheter'>Acheter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>";
                        }
                    ?>
                </div>
                <button class="btn_stock-switch" onclick="stock_switch()"><img id="toggle_stock" src="./img/produits/show.svg"></button>
            </div>
        </div>
    </main>
    <footer>
        <!-- Mentions légales + contacts -->
        <div class="copyright">&copy;Patisport - 2021<br/>Alan Dabrowski & Théo Julien</div>
        <div class="legales">
            <div>
                <b>19 rue du projet d'informatique<br/>
                95000, Cergy, Société Patisport</b>
                Webmasters : M. Dabrowski et M. Julien<br/>
                01 00 00 00 00<br/>
                <a href="mailto:alan.dabrowski@eisti.fr">alan.dabrowski@eisti.fr</a>
                <a href="mailto:theo.julien@eisti.fr">theo.julien@eisti.fr</a>
            </div>
        </div>
        <script type="text/javascript" src="./js/produits.js"></script>
    <footer>
</body>
</html>