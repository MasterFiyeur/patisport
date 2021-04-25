<!DOCTYPE html>
<html lang="fr">
    <?php
        include "./php/header.php";
        if(!(isset($_SESSION["user"])) || !(isset($_SESSION["usermdp"])) || auth($_SESSION["user"],$_SESSION["usermdp"]) != 2){
            header("Location: index.php");
        }
        include "./php/functions.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <?php
        include "./php/navbar.php";
    ?>
    <main>
        <div class="section">
        <?php
            if(isset($_GET["success"])){
                if($_GET["success"]=="true"){
                    ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                        Votre opération a été effectuée.
                        <button type="button" class="btn-close-alert btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                }elseif($_GET["success"]=="false"){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Un problème a été rencontré, votre opération n'a pas pu s'exécuter correctement.
                    <button type="button" class="btn-close-alert btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
            include "./php/adminModals.php";
        ?>
        <h4>Gestion des articles</h4>
            <form action="" method="post" id="formAction">
                <div class="margin-lr row align-items-start d-flex justify-content-center">
                    <select class="form-select form-select mb-3" aria-label=".form-select" name="refProduit" id="refProduit">
                        <?php
                            $produits = getAllProduits();
                            foreach ($produits as $value) {
                                echo "<option value='".$value["ref"]."'>".$value["ref"]." - ".$value["label"]." (".$value["stock"].")</option>";
                            }
                        ?>
                    </select>
                    <button type="button" class="btn btn-success col-md-5" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter</button>
                        <input type="hidden" name="action" value="modify">
                        <input type="hidden" name="ref" id="refValueModify" value="">
                        <button type="button" class="btn btn-warning col-md-5" onclick="changeMod()">Modifier</button>
                    </form>
                    <button type="button" class="btn btn-danger col-md-5" data-bs-toggle="modal" data-bs-target="#delModal" onclick="changeDel()">Supprimer</button>
                </div>
            </form>
        </div>
    </main>
    <?php
        include "./php/footer.php";
    ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./js/admin.js"></script>
    <?php
        echo "<script>init('".$_SESSION["user"]."','".$_SESSION["usermdp"]."');</script>";
    ?>
</body>
</html>