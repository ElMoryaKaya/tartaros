<?php
   if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    require('../controllers/controllers_ajout_produit.php'); 
    require_once('../controllers/controllers_select_plataformeCombox.php'); 
    require_once('../controllers/controllers_select_type_jeuxCombox.php'); 
    
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
        <main>
        <div class="button-container">
            <a href="../views/espaceGestion_Cles.php" class="button" style="margin-left: 5px; text-decoration: none;">
                <span class="button__text">Espace Clés</span>
                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
            </a>

            <a href="../views/espaceGestion_Theme.php" class="button" style="margin-left: 5px; width: 210px; text-decoration: none;">
                <span class="button__text">Espace Thèmes</span>
                <span class="button__icon" style="margin-left: 62px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
            </a>

            <a href="../views/espaceGestion_Extension.php" class="button" style="margin-left: 5px; width: 228px; text-decoration: none;">
                <span class="button__text" >Espace Extension</span>
                <span class="button__icon"  style="margin-left: 80px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
            </a>

            <a href="../views/PageOptionSuplementaire.php" class="button right-button" style="margin-left: auto;   width: 270px; text-decoration: none;">
                <span class="button__text">Option supplémentaire</span>
                <span class="button__icon" style="margin-left: 125px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
            </a>
        </div>
            <section class="presentation second">
                <div class="product-presentation">      
                    <h2>Ajouter des données</h2>
                    <!-- Formulaire pour ajouter des données à la table `produit` -->
                    <form action="../controllers/controllers_ajout_produit.php" method="POST"  enctype="multipart/form-data">
                        
                        <label for="nom_produit">Nom du produit :</label>
                        <input type="text" id="nom_produit" name="nom_produit" required>

                        <label for="avatar">Choisir une photo pour le produit :</label>
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" required>      
                        
                        <label for="type_produit">Type de produit :</label>
                        
                            <select id="type_produit" name="type_produit" required>
                            <option value="" selected>-- Veuillez sélectionner un type de produit --</option>
                                <option value="extension">Extension</option>
                                <option value="themes">Thèmes</option>
                                <option value="cles">Cles d'activation jeux</option>
                            </select> 

                        <label for="date_sortie">Date de sortie :</label>
                        <input type="date" id="date_sortie" name="date_sortie" required>

                        <label for="prix">Prix :</label>
                        <input type="number" id="prix" name="prix" step="0.01" required>

                        <label for="note">Note :</label>
                        <input type="number" id="note" name="note" min="1" max="10" required>

                        <?php
                            // Affichage de la liste déroulante des plateformes
                            echo '<label for="plateforme">Plateforme :</label>';

                            echo '<select name="plateforme" id="plateforme" required>';
                            echo '<option value="" disabled selected>-- Veuillez sélectionner une option --</option>';

                                foreach ($plateformes as $plateforme) {
                                    echo '<option value="' . $plateforme['id'] . '">' . $plateforme['nom_console'] . '</option>';
                            }
                            echo '</select>';
                        ?>

                        <?php
                        // Affichage de la liste déroulante des types de jeux
                        echo '<label for="type_jeux">Type de jeux :</label>';
                        echo '<select name="type_jeux" id="type_jeux" required>';
                        echo '<option value="" disabled selected>-- Veuillez sélectionner une option --</option>';

                                foreach ($typesJeux as $typeJeux) {
                                    echo '<option value="' . $typeJeux['id'] . '">' . $typeJeux['type_jeux'] . '</option>';
                            }

                            echo '</select>';
                        ?>
                        <br><br>
                        <button type="submit" name="btn_Ajouter_Produit" >Ajouter Produit</button>
                    </form>
                </div>
            </section>
        </main> 
    </body>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>