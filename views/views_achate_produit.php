
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require('../controllers/controllers_achate_produit_photo.php'); 
   // require_once('../controllers/controllers_quantite_produit.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_panier.css">
   
    <title>Achat Produit</title>
</head>
<body>
    <header>
        <?php include("views_Panier.php"); ?>   
        <?php include("menu_principal.php"); ?>
    </header>
        <div class="">
            <table>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="padding-right: 70px;"> <!-- Ajoutez de l'espace à droite de l'image -->
                        <img src="<?= $productDetails['photo']; ?>" alt="Photo du produit" class="image-styling" style="width: 300px; border: 2px solid #ccc; margin-left : 38%;">
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <div class="nom_produit_centre" style="letter-spacing: 5px;">
                            <h1><?= $productDetails['nom_produit']; ?></h1>
                        </div>
                    </td>
                    <td>
                        <select name="cles" id="cles" required>
                            <option value="" disabled selected>-- Sélectionnez le nombre de clés --</option>
                            <?php if (!empty($clesDisponibles)) : ?>
                                <?php $nombreCles = 1; ?>
                                <?php foreach ($clesDisponibles as $cle) : ?>
                                    <option value="<?= $cle['id'] ?>"><?= $nombreCles++ ?></option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <option value="" disabled selected>Produits indisponibles</option>
                            <?php endif; ?>
                        </select>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <input type="hidden" id="id" name="id" value="<?= $productDetails['nom_produit']; ?>">
        </div>
    <div>
    <br><br>
    <form action="../controllers/controllers_achate_produit.php" method="post"  enctype="multipart/form-data">
        
        <label for="nom_client">Nom :</label>
        <input type="text" id="nom_client" name="nom_client" required>

        <label for="prenom_client">Prénom :</label>
        <input type="text" id="prenom_client" name="prenom_client" required>

        <label for="ville_client">Ville :</label>
        <input type="text" id="ville_client" name="ville_client" required>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required>

        <label for="code_postal">Code Postal :</label>
        <input type="text" id="code_postal" name="code_postal" required>

        <label for="pays">Pays :</label>
        <input type="text" id="pays" name="pays" required>
        <br><br>
        <button type="submit" name="commander">Passer la commande</button>
    </form>
    <br><br>

         <?php include("Footer.php"); ?>

</body>
   
</html>
