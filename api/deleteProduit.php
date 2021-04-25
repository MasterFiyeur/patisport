<?php
include __DIR__.'/../bdd/bdd.php';

if(!empty($_POST) && isset($_POST["ref"]) && isset($_POST["user"]) && isset($_POST["mdp"])){
    if(auth($_POST["user"],$_POST["mdp"])==2){
        $produit = getProduit($_POST["ref"]); 
        if($produit!=null){
            /* Suppression de la catégorie si il n'y a plus de produits */
            try{
                $PDO = ConnexionPDO();
                $req = $PDO -> prepare('SELECT COUNT(*) FROM produits WHERE categorie = ?;');
                $req -> execute(array($produit["categorie"]));
                Deconnexion();
                if ($ligne = $req -> fetch()) {
                    if ($ligne != NULL) {
                        $nombre = $ligne[0];
                    } else {
                        echo "Erreur lors de la lecture du nombre de produits de la categorie.";
                    }
                }
                $req -> closeCursor();
            }catch (PDOException $e) {
                print "Erreur, ".$e -> getMessage();
            }
            if($nombre<2){
                try{
                    $req = $PDO -> prepare('DELETE FROM categories WHERE categorie = ?;');
                    $req -> execute(array($produit["categorie"]));
                    Deconnexion();
                    $req -> closeCursor();
                }catch (PDOException $e) {
                    print "Erreur, ".$e -> getMessage();
                }
            }
            try{
                $req = $PDO -> prepare('DELETE FROM produits WHERE ref = ?;');
                $req -> execute(array($_POST["ref"]));
                Deconnexion();
                $req = NULL;
                echo "ok";
            }catch (PDOException $e) {
                print "Erreur, ".$e -> getMessage();
            }
        }else{
            echo "Erreur, la réference n'existe pas.";
        }
    }else{
        echo "Erreur, l'utilisateur n'est pas administrateur.";
    }
}else{
    echo "Erreur, il n'y a pas les arguments requis.";
}
?>