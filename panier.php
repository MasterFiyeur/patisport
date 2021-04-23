<!DOCTYPE html>
<html lang="fr">
    <?php
        include "./php/header.php";
        include "./php/functions.php";
        deleteCart();
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/panier.css">
</head>
<body>
    <?php
        include "./php/navbar.php";
    ?>
    <main>
        <?php
            if(!empty($_POST["prenom"]) && isset($_SESSION["user"])){
                include "./php/confirmCommande.php";
            }else{
                if(isset($_GET["page"]) && intval($_GET["page"]) == 2 && isset($_SESSION["user"]) && count($_SESSION["panier"])>0){
                    include "./php/infoClient.php";
                }else{
                    include "./php/recapPanier.php";
                }
            }
        ?>
    </main>
    <?php
        include "./php/footer.php";
    ?>
</body>
</html>