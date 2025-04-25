<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Votre Site de Vente</title>
</head>
<body>
    <header>
        <?php include("menu_principal.php"); ?>
    </header>
    <main>
        <section class="presentation first">
            <div class="product-presentation">
              <form action="../controllers/controller_Select_utillisateur.php" method="POST">
                  <h2>Connexion</h2>

                  <label for="username">Nom d'utilisateur :</label>
                  <input type="text" id="pseudo" name="pseudo" required>

                  <label for="password">Mot de passe :</label>
                  <input type="password" id="password" name="mot_de_passe" required>

                  <button type="submit" name="Btn_connecter">Se Connecter</button>

                  <div class="connexion">
                      <p><strong>Pas encore inscrit ? </strong><a href="../views/Page_Inscription_Utilisateur.php">Inscrivez-vous</a></p>
                  </div>
              </form>
            </div>
            <div class="image-presentation">
                <img src="" />
            </div>
        </section>
       
    </main> 

</body>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html