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
                        $value = $_SESSION["panier"][$i];
                        $produit = getProduit($value[0]);
                        $total += $value[1]*floatval($produit['prix']);
                        ?>
                        <tr>
                            <td>
                                <div class='cart-info'>
                                    <img 
                                        <?php echo $produit["img"]; ?>
                                    >
                                    <div>
                                        <p>
                                            <?php echo $produit["label"]."- ".$produit["ref"]; ?>
                                        </p>
                                        <small>
                                            <?php echo "Prix : €".$produit["prix"]; ?> 
                                        </small><br>
                                        <a <?php echo "href='panier.php?delete=".$i."'"; ?>>
                                            Supprimer
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php echo $value[1]; ?>
                            </td>
                            <td>
                                <?php echo "€".($value[1]*$produit["prix"]); ?>
                            </td>
                        </tr>
                    <?php } ?>
            </table>
            <div class='total-prix'>
                <table>
                    <tr>
                        <td>Sous-total</td>
                        <td>
                            <?php echo "€".$total; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Frais</td>
                        <td>
                            <?php echo "€".$_SESSION["taxes"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>
                            <?php echo "€".($total+$_SESSION["taxes"]); ?>
                        </td>
                    </tr>
                </table>
                <a href="?page=2"><button type="button" class="btn btn-primary">Valider</button></a>
            </div>
        </div>
        <?php 
            }else{ ?>
               <div class="no_panier">Vous n'avez aucun article dans votre panier !</div>
            <?php } ?>