<?php 
    function stockDisponible($tab){
        if(isset($_SESSION["user"])){
            return (verifstock($tab));
        }else{
            return ($_SESSION["produits"][$tab[0]][$tab[1]]["stock"]);
        }
    }

    function verifstock($tab){
        if(isset($_SESSION["panier"])){
            $stockDispo = intval($_SESSION["produits"][$tab[0]][$tab[1]]["stock"]);
            $stockPrecedent = 0;
            for ($i=0; $i < count($_SESSION["panier"]); $i++) { 
                if($_SESSION["panier"][$i][0] == $tab[0] && $_SESSION["panier"][$i][1] == $tab[1]){
                    $stockPrecedent += $_SESSION["panier"][$i][2];
                }
            }
            return ($stockDispo-($stockPrecedent+$tab[2]));
        }
        return -1;
    }

    function in_panier($tab){
        for ($i=0; $i < count($_SESSION["panier"]); $i++) { 
            if($_SESSION["panier"][$i][0] == $tab[0] && $_SESSION["panier"][$i][1] == $tab[1]){
                $_SESSION["panier"][$i][2] += $tab[2];
                return false;
            }
        }
        return true;
    }

?>