<?php 
    function stockDisponible($tab,$prod){
        if(isset($_SESSION["user"])){
            return (verifstock($tab,$prod));
        }else{
            return ($prod[$tab[1]]["stock"]);
        }
    }

    function verifstock($tab,$prod){
        if(isset($_SESSION["panier"])){
            $stockDispo = intval($prod[$tab[1]]["stock"]);
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

    function verifContact(){
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
        return array($wrong,$valid);
    }
    

    function scriptContact($wrong,$good){
        ?>
        <script>
            <?php 
                echo "let good = [\"".implode("\",\"", $good)."\"];";
                echo "let wrong = [\"".implode("\",\"", $wrong)."\"];"; 
            ?>
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
                        document.getElementById('nom').value = <?php echo "'".$_POST["nom"]."'"; ?>;
                        break;
                    case 'prenom':
                        document.getElementById('prenom').value = <?php echo "'".$_POST["prenom"]."'"; ?>;
                        break;
                    case 'mail':
                        document.getElementById('mail').value = <?php echo "'".$_POST["mail"]."'"; ?>;
                        break;
                    case 'ddn':
                        document.getElementById('ddn').value = <?php echo "'".$_POST["ddn"]."'"; ?>;
                        break;
                    case 'metier':
                        document.getElementById('metier').value = <?php echo "'".$_POST["metier"]."'"; ?>;
                        break;
                    case 'sujet':
                        document.getElementById('sujet').value = <?php echo "'".$_POST["sujet"]."'"; ?>;
                        break;
                    case 'contenu':
                        document.getElementById('contenu').value = <?php echo "'".$_POST["contenu"]."'"; ?>;
                        break;                
                    default:
                        console.log('Le formulaire est bon');
                        break;
                }
            }
        </script>
<?php
    }

    function deleteCart(){
        if(isset($_GET["delete"]) && isset($_SESSION["panier"]) && intval($_GET["delete"])<count($_SESSION["panier"])){
            $tempSessionPanier = array();
            for ($i=0; $i < count($_SESSION["panier"]); $i++) { 
                if($i != intval($_GET["delete"])){
                    array_push($tempSessionPanier,$_SESSION["panier"][$i]);
                }
            }
            $_SESSION["panier"] = $tempSessionPanier;
        }
    }

    function choixCat($cat){
        if(isset($_GET["categorie"])){
            foreach ($cat as $value) {
                if($value["id"]==$_GET["categorie"]){
                    return($value["categorie"]);
                }
            }
            return $value["categorie"];
        }else{
            return $cat[0]["categorie"];
        }
    }

    function estExistante($categories,$categorie){
        $res = false;
        foreach ($categories as $value) {
            if($value["categorie"]==$categorie){
                return true;
            }
        }
        return $res;
    }
?>