<!DOCTYPE html>
<html lang="fr">
    <?php 
        include "./php/header.php";
    ?>
    <link rel="stylesheet" href="css/panier.css">
<body>
    <?php
        include "./php/navbar.php";
    ?>
    <main>
        <div class="cart">
            <h1>Panier</h1>
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="./img/produits/lacets/lacet1" alt="lacet1">
                            <div>
                                <p>Lacets 1</p>
                                <small>Prix : €5.00</small><br>
                                <a href="">Supprimer</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1"></td>
                    <td>€50.00</td>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="./img/produits/lacets/lacet2" alt="lacet1">
                            <div>
                                <p>Lacets 2</p>
                                <small>Prix : €5.00</small><br>
                                <a href="">Supprimer</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1"></td>
                    <td>€50.00</td>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="./img/produits/lacets/lacet3" alt="lacet1">
                            <div>
                                <p>Lacets 3</p>
                                <small>Prix : €5.00</small><br>
                                <a href="">Supprimer</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1"></td>
                    <td>€50.00</td>
                </tr>
            </table>
            <div class="total-prix">
                <table>
                    <tr>
                        <td>Sous-total</td>
                        <td>€18.00</td>
                    </tr>
                    <tr>
                        <td>Frais</td>
                        <td>€5.00</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>€23.00</td>
                    </tr>
                </table>
            </div>

        </div>
    </main>
    <?php 
        include "./php/footer.php";
    ?>
</body>
</html>