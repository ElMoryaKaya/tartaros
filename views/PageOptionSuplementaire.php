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
    <link rel="stylesheet" href="../style/style_Produit.css">
    <title>Votre Site de Vente</title>
</head>
<body>
    <header>
        <?php include("menu_principal.php"); ?>
    </header>
        <?php include("buton_RetourOption.php") ?>
        <div class="clearfix">
            <section class="console">
                <div class="gauche_console">
                    <!-- Formulaire pour ajouter des données à la table `plateforme` -->
                    <form action="../controllers/controllers_ajout_plateforme.php" method="POST">
                        <label for="nom_console">Nom de la plateforme:</label>
                        <input type="text" id="nom_console" name="nom_console" required>
                        <button type="submit">Ajouter</button>
                    </form>
                </div>
            </section>
            <aside class="type_jeux">
                <div class="droit_jeux">
                  <!-- Formulaire pour ajouter des données à la table `type_jeux` -->
                    <form action="../controllers/controllers_ajout_type_jeux.php" method="POST">
                        <label for="type_jeux">Type de jeux:</label>
                        <input type="text" id="type_jeux" name="type_jeux" required>
                        <button type="submit">Ajouter</button>
                    </form>
                </div>
            </aside>
        </div>
        <aside class="type_jeux">
                <div class="droit_jeux">
                  <!-- Formulaire pour ajouter des données à la table `type_jeux` -->
                    <form action="../controllers/controllers_ajout_type_jeux.php" method="POST">
                        <label for="type_jeux">Type de jeux:</label>
                        <input type="text" id="type_jeux" name="type_jeux" required>
                        <button type="submit">Ajouter</button>
                    </form>
                </div>
            </aside>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>
