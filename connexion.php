<!DOCTYPE html>
<html lang="fr">
    <?php 
        include "./php/header.php";
    ?>
    <link rel="stylesheet" href="css/connexion.css">
<body>
    <?php
        include "./php/navbar.php";
    ?>
    <main>
        <div class="section">
            <div class="box">
                <div class="form">
                    <h2>Connexion</h2>
                    <form action="">
                        <div class="inputBx">
                            <input type="text" placeholder="Nom d'utilisateur">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                        <div class="inputBx">
                            <input type="password" placeholder="Mot de passe">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </div>
                        <div class="inputBx">
                            <input type="button" value="Connexion">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include "./php/footer.php";
    ?>
</body>
</html>