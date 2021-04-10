<!DOCTYPE html>
<html lang="fr">
    <?php
        include "./php/header.php";
        if(isset($_GET["delete"]) && isset($_SESSION["panier"]) && intval($_GET["delete"])<count($_SESSION["panier"])){
            $tempSessionPanier = array();
            for ($i=0; $i < count($_SESSION["panier"]); $i++) { 
                if($i != intval($_GET["delete"])){
                    array_push($tempSessionPanier,$_SESSION["panier"][$i]);
                }
            }
            $_SESSION["panier"] = $tempSessionPanier;

        }
    ?>
    <link rel="stylesheet" href="css/panier.css">
</head>
<body>
    <?php
        include "./php/navbar.php";
    ?>
    <main>
        <?php
            if(isset($_SESSION["panier"]) && count($_SESSION["panier"])>0){
        ?>
        <div class="cart">
            <h1>Panier</h1>
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
                <?php
                    $total = 0;
                    for ($i=0; $i < count($_SESSION["panier"]); $i++) { 
                        $produit = $_SESSION["produits"][$_SESSION["panier"][$i][0]][$_SESSION["panier"][$i][1]];
                        $total += $_SESSION["panier"][$i][2]*$produit["prix"];
                        echo "<tr>
                            <td>
                                <div class='cart-info'>
                                    <img ".$produit["img"].">
                                    <div>
                                        <p>".$produit["label"]."- ".$produit["ref"]."</p>
                                        <small>Prix : €".$produit["prix"]."</small><br>
                                        <a href='panier.php?delete=".$i."'>Supprimer</a>
                                    </div>
                                </div>
                            </td>
                            <td>".$_SESSION["panier"][$i][2]."</td>
                            <td>€".($_SESSION["panier"][$i][2]*$produit["prix"])."</td>
                        </tr>";
                    }
            echo "</table>
            <div class='total-prix'>
                <table>
                    <tr>
                        <td>Sous-total</td>
                        <td>€".$total."</td>
                    </tr>
                    <tr>
                        <td>Frais</td>
                        <td>€".$_SESSION["taxes"]."</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>€".($total+$_SESSION["taxes"])."</td>
                    </tr>
                </table>
            </div>";
            ?>
        </div>
        <?php 
            }else{
                echo '<div class="no_panier">Vous n\'avez aucun article dans votre panier !</div>';
            }
        ?>
    </main>
    <?php
        include "./php/footer.php";
    ?>
</body>
</html>