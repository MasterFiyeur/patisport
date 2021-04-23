<?php
$data = file_get_contents(__DIR__.'/../data/produits.json');
$produits = json_decode($data, true);
$req = "TRUNCATE TABLE `categories`; TRUNCATE TABLE `produits`; TRUNCATE TABLE `users`;";

/* Catégories */
foreach ($produits[0]["categories"] as $cat => $label) {
    $req .= " INSERT INTO categories (`categorie`, `label`) VALUES('$cat','$label');";
}

/* Produits */
foreach ($produits[1] as $key => $value){
    foreach ($value as $value2) {
        $req .= " INSERT INTO produits VALUES ('".$value2['ref']."','".$value2['img']."',".$value2['stock'].",'".$value2['label']."',".$value2['prix'].",'".$key."');";
    }
}

/* Utilisateur */
$data = file_get_contents(__DIR__."/../data/users.xml");
$users = xmlrpc_decode($data);
foreach ($users as $value) {
    $req .= " INSERT INTO users(`user`, `password`, `role`) VALUES ('".$value[0]."','".$value[1]."','".$value[2]."');";
}

/* Requete SQL */
include 'bdd.php';
if (Connexion()==false){
    echo "Erreur dans l'execution du script d'initialisation.";
    return NULL;
}
try{
    $request = $GLOBALS['cnx'] -> prepare($req);
    $request -> execute();
    Deconnexion();
    $request = NULL;
    echo "Tout s'est bien passé !";
}catch (PDOException $e) {
    print "Erreur !".$e -> getMessage();
}
?>