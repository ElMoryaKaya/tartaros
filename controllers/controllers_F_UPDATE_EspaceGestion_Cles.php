<?php
	require_once('../models/Bd_connexion.php');
	require_once('../models/models_F_UPDATE_EspaceGestion_Cles.php');
	require_once('../models/models_UPDATE_EspaceGestion_Cles.php');


		// Obtenez la liste des plateformes et des types de jeux depuis votre base de données

		// Traitement du formulaire lorsqu'il est soumis
		if (isset($_POST['Btn_modifier_produit'])) {
            $produit_id=$_POST['id'];

            $nouvellesDonnees = getProduitById($connexion, $produit_id);

            // Initialisez les variables avec les données existantes du produit
            $nom_produit = $nouvellesDonnees['nom_produit'];
            $photo = $nouvellesDonnees['photo'];
            $type_produit = $nouvellesDonnees['type_produit'];
            $date_sortie = $nouvellesDonnees['date_sortie'];
            $prix = $nouvellesDonnees['prix'];
            $note = $nouvellesDonnees['note'];


			$nouvellesDonnees = array(
              
            'nom_produit' => $_POST['nom_produit'],
            'type_produit' => $_POST['type_produit'],
            'date_sortie' => $_POST['date_sortie'],
            'prix' => $_POST['prix'],
            'note' => $_POST['note'],
            'plateforme_ID' => $_POST['plateforme'],
            'type_jeux_ID' => $_POST['type_jeux']
        );

        // Gérez le téléchargement de la nouvelle photo s'il y en a une
        if ($_FILES['avatar']['error'] == 0) {
            // Assurez-vous que le dossier d'enregistrement des images existe
            $dossierEnregistrement = '../images/';
            if (!file_exists($dossierEnregistrement)) {
                mkdir($dossierEnregistrement, 0777, true);
            }

            // Générez un nom unique pour la nouvelle photo
            $nouveauNomPhoto = uniqid('photo_') . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

            // Déplacez la nouvelle photo vers le dossier d'enregistrement
            move_uploaded_file($_FILES['avatar']['tmp_name'], $dossierEnregistrement . $nouveauNomPhoto);

            // Mettez à jour le chemin de la photo dans les nouvelles données
            $nouvellesDonnees['photo'] = $dossierEnregistrement . $nouveauNomPhoto;
        }

        // Appelez la fonction de mise à jour
        $updateResult = updateProduit($connexion, $produit_id, $nouvellesDonnees);

        if ($updateResult) {
            echo "Mise à jour réussie.";
        } else {
            echo "Erreur lors de la mise à jour.";
        }
	}
?>
