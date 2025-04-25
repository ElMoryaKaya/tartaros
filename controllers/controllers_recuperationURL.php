<?php
    require_once('../models/Bd_connexion.php');
    require_once('../models/models_UPDATE_EspaceGestion_Cles.php');
   
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    $connexion = obtenirConnexionBd();

    // Récupérer l'ID du produit à modifier depuis l'URL
    if (isset($_GET['id'])) {
        
        $produit_id = $_GET['id'];
        
        // Utilisez la fonction pour récupérer les détails du produit
        $produit = getProduitById($connexion, $produit_id);

        // Les variables seront maintenant remplies avec les valeurs de la base de données
        $id = $produit['id'];
        $nom_produit = $produit['nom_produit'];
        $photo = $produit['photo'];
        $type_produit = $produit['type_produit'];
        $date_sortie = $produit['date_sortie'];
        $prix = $produit['prix'];
        $note = $produit['note'];
        $type_jeux = $produit['type_jeux'];
        $nom_console = $produit['nom_console'];

        // Affichez le formulaire de modification avec les détails du produit
        include('../views/views_UPDATEGestion_produit.php');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Vérification du type de fichier côté serveur
            $allowedTypes = ['image/jpeg', 'image/png'];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
                $fileType = exif_imagetype($_FILES['avatar']['tmp_name']);

                if (!in_array($fileType, [IMAGETYPE_JPEG, IMAGETYPE_PNG])) {
                    echo "Le type de fichier n'est pas autorisé. Veuillez choisir une image JPEG ou PNG.";
                    // Gérer l'erreur (redirection, message d'erreur, etc.)
                    exit;
                }

                // Obtenez les nouvelles informations sur l'image
                $newImageInfo = getimagesize($_FILES['avatar']['tmp_name']);
                $newWidth = $newImageInfo[0];
                $newHeight = $newImageInfo[1];

                include('../views/views_UPDATEGestion_produit.php');
            }
        }

        } else {
            echo "L'ID du produit n'est pas spécifié.";
    }
?>
