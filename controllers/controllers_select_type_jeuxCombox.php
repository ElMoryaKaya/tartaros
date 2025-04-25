<?php
    require_once('../models/models_select_type_jeuxCombox.php'); // Assurez-vous d'ajuster le chemin

    try {
        // Utilisez votre fichier de connexion ici
        $connexion = obtenirConnexionBd();

        // Récupération des types de jeux depuis le modèle
        $typesJeux = getTypesJeux($connexion);


        } catch (PDOException $e) {
            echo "Erreur de récupération des types de jeux : " . $e->getMessage();
    }
?>
