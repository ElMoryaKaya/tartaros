<?php
   if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
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

                    <h2>Modifier les produits</h2>
                    <!-- Formulaire pour ajouter des données à la table `produit` -->
                    <form action="../controllers/controllers_F_UPDATE_EspaceGestion_Cles.php" method="POST"  enctype="multipart/form-data">
                    
                    <input type="hidden" id="id" name="id" value="<?php echo $produit_id; ?>" required>
                        <label for="nom_produit">Nom du produit :</label>
                        <input type="text" id="nom_produit" name="nom_produit" value="<?php echo $nom_produit; ?>" required>

                        <label for="avatar">Choisir une photo pour le produit :</label>
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                        <?php
                                // Affichez l'image existante seulement si elle est définie
                                if (!empty($photo)) {
                                    // Définissez une taille fixe pour l'image (par exemple, largeur=300, hauteur=200)
                                    $width = 300;
                                    $height = 200;

                                    // Affichez l'image avec les dimensions fixées
                                    echo '<img src="' . $photo . '" alt="Image du produit" width="' . $width . '" height="' . $height . '">';
                                }
                            ?>

                        <label for="type_produit">Type de produit :</label>
                        <select id="type_produit" name="type_produit">
                            <option value="" disabled>-- Veuillez sélectionner un type de produit --</option>
                            <option value="extension" <?php echo ($type_produit === 'extension') ? 'selected' : ''; ?>>Extension</option>
                            <option value="themes" <?php echo ($type_produit === 'themes') ? 'selected' : ''; ?>>Thèmes</option>
                            <option value="cles" <?php echo ($type_produit === 'cles') ? 'selected' : ''; ?>>Cles d'activation jeux</option>
                        </select>

                        <label for="date_sortie">Date de sortie :</label>
                        <input type="date" id="date_sortie" name="date_sortie" value="<?php echo $date_sortie; ?>" required>

                        <label for="prix">Prix :</label>
                        <input type="number" id="prix" name="prix" step="0.01" value="<?php echo $prix; ?>" required>

                        <label for="note">Note :</label>
                        <input type="number" id="note" name="note" min="1" max="10" value="<?php echo $note; ?>" required>

                        <!-- Affichage de la liste déroulante des plateformes -->
                        <label for="plateforme">Plateforme :</label>
                        <select name="plateforme" id="plateforme" required>
                            <option value="" disabled>-- Veuillez sélectionner une option --</option>
                            <?php
                            foreach ($plateformes as $plateforme) {
                                $selected = ($plateforme['id'] == $produit['plateforme_ID']) ? 'selected' : '';
                                echo '<option value="' . $plateforme['id'] . '" ' . $selected . '>' . $plateforme['nom_console'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- Affichage de la liste déroulante des types de jeux -->
                        <label for="type_jeux">Type de jeux :</label>
                        <select name="type_jeux" id="type_jeux" required>
                            <option value="" disabled>-- Veuillez sélectionner une option --</option>
                            <?php
                            foreach ($typesJeux as $typeJeux) {
                                $selected = ($typeJeux['id'] == $produit['type_jeux_ID']) ? 'selected' : '';
                                echo '<option value="' . $typeJeux['id'] . '" ' . $selected . '>' . $typeJeux['type_jeux'] . '</option>';
                            }
                            ?>
                        </select>
                        <br><br>
                        <button type="submit" name="Btn_modifier_produit">Modifier Produit</button>
                    </form>
                </div>
            </section>
        </main> 
    </body>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</html>