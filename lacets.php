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
                    <div class="carte">
                        <div class="imageBox">
                            <img src="./img/produits/lacets/lacet1.png" alt="Lacets jaunes">
                        </div>
                        <div class="contentBox">
                            <h3>Lacets jaunes</h3>
                            <h2 class="prix">€6.99</h2>
                            <div class="hidden_contentBox">
                                <form action="">
                                    <div class="stock">Stock : 9</div>
                                    <div class="gestion_stock">
                                        <div class="moins_stock" onclick="del_stock(0)">-</div>
                                        <input type="text" name="nombre_produit" id="nombre_produit" value="0" disabled>
                                        <div class="plus_stock" onclick="add_stock(0)">+</div>
                                    </div>
                                    <button class="btn_acheter">Acheter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="carte">
                        <div class="imageBox">
                            <img src="./img/produits/lacets/lacet2.png" alt="Lacets bleus">
                        </div>
                        <div class="contentBox">
                            <h3>Lacets bleus</h3>
                            <h2 class="prix">€6.99</h2>
                            <div class="hidden_contentBox">
                                <form action="">
                                    <div class="stock">Stock : 9</div>
                                    <div class="gestion_stock">
                                        <div class="moins_stock" onclick="del_stock(1)">-</div>
                                        <input type="text" name="nombre_produit" id="nombre_produit" value="0" disabled>
                                        <div class="plus_stock" onclick="add_stock(1)">+</div>
                                    </div>
                                    <button class="btn_acheter">Acheter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="carte">
                        <div class="imageBox">
                            <img src="./img/produits/lacets/lacet3.png" alt="Lacets verts">
                        </div>
                        <div class="contentBox">
                            <h3>Lacets verts</h3>
                            <h2 class="prix">€6.99</h2>
                            <div class="hidden_contentBox">
                                <form action="">
                                    <div class="stock">Stock : 9</div>
                                    <div class="gestion_stock">
                                        <div class="moins_stock" onclick="del_stock(2)">-</div>
                                        <input type="text" name="nombre_produit" id="nombre_produit" value="0" disabled>
                                        <div class="plus_stock" onclick="add_stock(2)">+</div>
                                    </div>
                                    <button class="btn_acheter">Acheter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="carte">
                        <div class="imageBox">
                            <img src="./img/produits/lacets/lacet4.png" alt="Lacets rouges">
                        </div>
                        <div class="contentBox">
                            <h3>Lacets rouges</h3>
                            <h2 class="prix">€6.99</h2>
                            <div class="hidden_contentBox">
                                <form action="">
                                    <div class="stock">Stock : 9</div>
                                    <div class="gestion_stock">
                                        <div class="moins_stock" onclick="del_stock(3)">-</div>
                                        <input type="text" name="nombre_produit" id="nombre_produit" value="0" disabled>
                                        <div class="plus_stock" onclick="add_stock(3)">+</div>
                                    </div>
                                    <button class="btn_acheter">Acheter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="carte">
                        <div class="imageBox">
                            <img src="./img/produits/lacets/lacet5.png" alt="Lacets roses">
                        </div>
                        <div class="contentBox">
                            <h3>Lacets roses</h3>
                            <h2 class="prix">€6.99</h2>
                            <div class="hidden_contentBox">
                                <form action="">
                                    <div class="stock">Stock : 9</div>
                                    <div class="gestion_stock">
                                        <div class="moins_stock" onclick="del_stock(4)">-</div>
                                        <input type="text" name="nombre_produit" id="nombre_produit" value="0" disabled>
                                        <div class="plus_stock" onclick="add_stock(4)">+</div>
                                    </div>
                                    <button class="btn_acheter">Acheter</button>
                                </form>
                            </div>
                        </div>
                    </div>
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