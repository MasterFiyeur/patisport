<!DOCTYPE html>
<html lang="fr">
<?php
    /* Vérification formulaire */
    if(!empty($_POST)){
        $wrong = array();
        $valid = true;
        $metiers = array("agriculture","agroalimentaire","animaux","architecture","artisanat","banque","batiment","biologie","commerce","communication","culture","defense","droit","edition","informatique","enseignement","environnement","gestion","hotellerie","humanitaire","industrie","lettres","mecanique","numerique","sante","sciences","secretariat","social","soins","sport","transport","autre");
        if(!isset($_POST["nom"]) || trim($_POST["nom"])==""){
            $valid = false;
            array_push($wrong,"nom");
        }
        if(!isset($_POST["prenom"]) || trim($_POST["prenom"])==""){
            $valid = false;
            array_push($wrong,"prenom");
        }
        if (!isset($_POST["mail"]) || preg_match("/^\S+@\S+\.\S+$/", $_POST["mail"])==0){
            $valid = false;
            array_push($wrong,"mail");
        }
        if(isset($_POST["ddn"])){
            $ddn = new DateTime($_POST["ddn"]);
            $ddnMin = new DateTime("01-01-1900");
            $ddnMax = new DateTime("NOW");
            if(!($ddn >= $ddnMin) || !($ddn < $ddnMax)){
                $valid = false;
                array_push($wrong,"ddn");
            }
        }else{
            $valid = false;
            array_push($wrong,"ddn");
        }
        if(!isset($_POST["metier"]) || !(in_array($_POST["metier"],$metiers))){
            $valid = false;
            array_push($wrong,"metier");
        }
        if(!isset($_POST["sujet"]) || trim($_POST["sujet"])==""){
            $valid = false;
            array_push($wrong,"sujet");
        }
        if(!isset($_POST["contenu"]) || trim($_POST["contenu"])==""){
            $valid = false;
            array_push($wrong,"contenu");
        }
        if(!isset($_POST["sexe"]) || !(in_array($_POST["sexe"],array("homme","femme")))){
            $valid = false;
            array_push($wrong,"sexe");
        }
    }
?>
<head>
    <?php 
        include "./php/header.php";
    ?>
    <link rel="stylesheet" href="css/contact.css">
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
            <div class="content">
                <div class="black-back"></div>
                <div class="formulaire_contact">
                    <h2>Nous contacter</h2>
                    <?php
                        if(!empty($_POST) && $valid){
                            $to      = 'julientheo@eisti.eu';
                            $subject = $_POST["sujet"];
                            $message = $_POST["contenu"];
                            $message .= "\n De : ".$_POST["prenom"]." ".$_POST["nom"]." <".$_POST["mail"].">";
                            $message .= "\n".$_POST["ddn"]." - ".$_POST["metier"]." - ".$_POST["sexe"];
                            mail($to, $subject, $message);
                            echo "<h5>Votre mail a bien été envoyé !</h5>";
                        }
                    ?>
                    <form id="contact_form" action="contact.php" method="POST">
                        <!-- Nom, Prénom, email, genre, métier(select), date naissance, sujet et contenu du mail -->
                        <!--Genre-->
                        <div class="inputBox">
                            <input type="text" name="nom" id="nom" required>
                            <label for="nom">Nom</label>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="prenom" id="prenom" required>
                            <label for="prenom">Prénom</label>
                        </div>
                        <div class="inputBox">
                            <input type="email" name="mail" id="mail" required>
                            <label for="mail">Email</label>
                        </div>
                        <div class="inputBox">
                            <input type="date" name="ddn" id="ddn" required value="2000-01-01" max="2003-02-25" min="1900-01-01">
                            <label for="ddn">Date de naissance</label>
                        </div>
                        <div class="inputBox">
                            <select name="metier" id="metier">
                                <option selected value="agriculture">Agriculture</option>
                                <option value="agroalimentaire">Agroalimentaire</option>
                                <option value="animaux">Animaux</option>
                                <option value="architecture">Architecture</option>
                                <option value="artisanat">Artisanat - Métier d'art</option>
                                <option value="banque">Banque - Assurance - Finance</option>
                                <option value="batiment">Bâtiment - Travaux publics</option>
                                <option value="biologie">Biologie - Chimie</option>
                                <option value="commerce">Commerce - Immobilier</option>
                                <option value="communication">Communication - Information</option>
                                <option value="culture">Culture - Spectacle</option>
                                <option value="defense">Défense - sécurité - Secours</option>
                                <option value="droit">Droit</option>
                                <option value="edition">Edition - Imprimerie - Livre</option>
                                <option value="informatique">Informatique - Electronique</option>
                                <option value="enseignement">Enseignement - Formation</option>
                                <option value="environnement">Environnement - Nature - Nettoyage</option>
                                <option value="gestion">Gestion - Audit - Ressources Humaines</option>
                                <option value="hotellerie">Hôtellerie - Restauration - Tourisme</option>
                                <option value="humanitaire">Humanitaire</option>
                                <option value="industrie">Industrie - Matériaux</option>
                                <option value="lettres">Lettres - Sciences Humaines</option>
                                <option value="mecanique">Mécanique - Maintenance</option>
                                <option value="numerique">Numérique - Multimédia - Audiovisuel</option>
                                <option value="sante">Santé</option>
                                <option value="sciences">Sciences - Maths - Physique</option>
                                <option value="secretariat">Secrétariat - Accueil</option>
                                <option value="social">Social - Services à la personne</option>
                                <option value="soins">Soins - Esthétique - Coiffure</option>
                                <option value="sport">Sport et animation</option>
                                <option value="transport">Transport - Logistique</option>
                                <option value="autre">Autres</option>
                            </select>
                            <label for="metier">Secteur du métier :</label>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="sujet" id="sujet" required>
                            <label for="sujet">Sujet</label>
                        </div>
                        <div class="inputBox textarea">
                            <textarea name="contenu" id="contenu" required></textarea>
                            <label for="contenu">Contenu du mail</label>
                        </div>
                        <div>
                            <div class="form_sexe">
                                <input class="radio_input" type="radio" value="homme" name="sexe" id="sexe1" checked>
                                <label class="radio_label" for="sexe1">Homme</label>
                                <input class="radio_input" type="radio" value="femme" name="sexe" id="sexe2">
                                <label class="radio_label" for="sexe2">Femme</label>
                            </div>
                        <input type="button" value="Envoyer" onclick="verification_contact()">
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </main>
    <?php
        include './php/footer.php';
    ?>
    <script type="text/javascript" src="./js/contact.js"></script>
    <?php 
        if(isset($valid) && !$valid){
            var_dump($wrong);
            $good = array_diff(array("nom","prenom","mail","ddn","metier","sujet","contenu"), $wrong);
            var_dump($good);

            echo "<script>
            let good = [\"".implode("\",\"", $good)."\"];
            let wrong = [\"".implode("\",\"", $wrong)."\"];
            for (let index = 0; index < wrong.length; index++) {
                switch (wrong[index]) {
                    case 'nom':
                        document.getElementById('nom').classList.add('wrong');
                        break;
                    case 'prenom':
                        document.getElementById('prenom').classList.add('wrong');
                        break;
                    case 'mail':
                        document.getElementById('mail').classList.add('wrong');
                        break;
                    case 'ddn':
                        document.getElementById('ddn').classList.add('wrong');
                        break;
                    case 'metier':
                        document.getElementById('metier').classList.add('wrong');
                        break;
                    case 'sujet':
                        document.getElementById('sujet').classList.add('wrong');
                        break;
                    case 'contenu':
                        document.getElementById('contenu').classList.add('wrong');
                        break;                
                    default:
                        console.log('Le formulaire est bon');
                        break;
                }
            }
            for (index = 0; index < good.length; index++) {
                switch (good[index]) {
                    case 'nom':
                        document.getElementById('nom').value = '".$_POST["nom"]."';
                        break;
                    case 'prenom':
                        document.getElementById('prenom').value = '".$_POST["prenom"]."';
                        break;
                    case 'mail':
                        document.getElementById('mail').value = '".$_POST["mail"]."';
                        break;
                    case 'ddn':
                        document.getElementById('ddn').value = '".$_POST["ddn"]."';
                        break;
                    case 'metier':
                        document.getElementById('metier').value = '".$_POST["metier"]."';
                        break;
                    case 'sujet':
                        document.getElementById('sujet').value = '".$_POST["sujet"]."';
                        break;
                    case 'contenu':
                        document.getElementById('contenu').value = '".$_POST["contenu"]."';
                        break;                
                    default:
                        console.log('Le formulaire est bon');
                        break;
                }
            }
        </script>";
        }
    ?>
</body>
</html>