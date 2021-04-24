<!DOCTYPE html>
<html lang="fr">
    <?php 
        include "./php/header.php";
        if(isset($_GET["reset"]) && $_GET["reset"] == "true"){
            $_SESSION["panier"] = array();
        }
    ?>
    <link rel="stylesheet" href="css/index.css">
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
                <img src="./img/logo.png" alt="logo">
                <div>Trouvez tout votre bonheur en découvrant les articles de qualité <br/>supérieure dans notre boutique en ligne d'accessoires de sport.</div>
            </div>
        </div>
    </main>
    <?php 
        include "./php/footer.php";
    ?>
</body>
</html>