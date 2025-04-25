<?php

    require_once('../models/Bd_connexion.php');
    require_once('../models/models__ajout_type_jeux.php');

    try {
        // Utilisez votre fonction d'obtention de connexion ici
        $connexion = obtenirConnexionBd();

        // Assurez-vous que la valeur est récupérée à partir d'un formulaire ou d'une autre source
        $type_jeux = $_POST['type_jeux'];

        // Vérification de l'existence du type de jeux
        $existing_type_jeux = checkTypeJeuxExistence($connexion, $type_jeux);

        if ($existing_type_jeux) {
                echo "Ce type de jeux existe déjà dans la base de données. Veuillez en choisir un autre.";
            
            } else {
                    // Insertion
                    insertTypeJeux($connexion, $type_jeux);

                    echo "Insertion réussie.";
                }
            } catch (PDOException $e) {
                echo "Erreur d'insertion : " . $e->getMessage();
        } finally {
            // Fermez la connexion à la base de données
            fermerConnexionBd($connexion);
    }
?>
