<?php 

$cnx="";

function Connexion(){
    include 'bddData.php';
    try{
        $GLOBALS['cnx'] = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $mdp);
        return true;
    }catch(PDOException $e){
        print "Erreur de connexion PDO";
        return false;
    }
}

function ConnexionPDO(){
    include 'bddData.php';
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $mdp);
        return $pdo;
    }catch(PDOException $e){
        print "Erreur de connexion PDO";
        return null;
    }
}

function Deconnexion(){
    $GLOBALS['cnx']=null;
}

function recup(){
    echo Connexion();
    var_dump($GLOBALS['cnx']);
}

function getCategories(){
    if (Connexion()==false){
        echo "Erreur dans la lecture des catégories";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM categories;');
        $req -> execute();
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return $res;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

function getProduits($categorie){
    if (Connexion()==false){
        echo "Erreur dans la lecture des produits";
        return NULL;
    }
    try{
        if(strrpos($categorie, ";")!=false){
            //Prévention des injections
            return;
        }
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM produits WHERE categorie = ?;');
        $req -> execute(array($categorie));
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return $res;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

function auth($user,$password){
    if (Connexion()==false){
        echo "Erreur dans la connexion.";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM users WHERE user = ? AND password = ?;');
        $req -> execute(array($user,$password));
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        if(count($res)>0){
            if($res[0]['role']=='administrateur'){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 0;
        }
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return 0;
    }
}

function getStock($ref){
    if (Connexion()==false){
        echo "Erreur dans la lecture du stock du produit.";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT stock FROM produits WHERE ref = ? LIMIT 1;');
        $req -> execute(array($ref));
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return count($res)>0?intval($res[0]['stock']):0;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

function getProduit($ref){
    if (Connexion()==false){
        echo "Erreur dans la lecture du stock du produit.";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM produits WHERE ref = ? LIMIT 1;');
        $req -> execute(array($ref));
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return count($res)>0?$res[0]:NULL;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

function verificationFinale($panier){
    foreach ($panier as $value){
        $produit = getProduit($value[0]);
        if(intval($value[1])>intval($produit['stock']) && intval($value[1])>0){
            return false;
        }
    }
    return true;
}

function updateStock($ref,$stock){
    if (Connexion()==false){
        echo "Erreur dans la mise a jour du stock du produit.";
        return false;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('UPDATE produits SET stock = ? WHERE ref = ?');
        $req -> execute(array($stock,$ref));
        Deconnexion();
        $req = NULL;
        return true;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return false;
    }
}

function getAllProduits(){
    if (Connexion()==false){
        echo "Erreur dans la lecture des produits";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM produits ORDER BY label;');
        $req -> execute();
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return $res;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

function supprimerProduit($produit){
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
}

function updateProduit(){
    $produit = getProduit($_POST["ref"]);
    $cats = getCategories();
    $catExist = false;
    foreach ($cats as $value) {
        if($value["categorie"] == $_POST["categorie"]){$catExist = true;}
    }
    if($catExist){
        if($produit!=null){
            $image = 'src="'.$_POST["img"].'" alt="'.$_POST["label"].'"';
            try{
                $PDO = ConnexionPDO();
                $req = $PDO -> prepare('UPDATE produits SET img = ?, stock = ?, label = ?, prix = ?, categorie = ? WHERE ref = ?;');
                $req -> execute(array($image,intval($_POST["stock"]),$_POST["label"],floatval($_POST["prix"]),$_POST["categorie"],$_POST["ref"]));
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
        echo "Erreur, la catégorie n'existe pas.";
    }
}
?>