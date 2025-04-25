<?php
    require_once('../models/Bd_connexion.php'); // Assurez-vous d'ajuster le chemin si nécessaire
    require_once('../models/models_ajout_plateforme.php');

    try {
        // Utilisez votre fonction d'obtention de connexion ici
        

        $nom_console = $_POST['nom_console'];

        // Vérification de l'existence de la console
        $existing_console = checkConsoleExistence($connexion, $nom_console);

            if ($existing_console) {
                    echo "Cette console existe déjà dans la base de données. Veuillez en choisir une autre.";
               
                } else {
                    // Insertion
                    insertConsole($connexion, $nom_console);
                    
                    echo "Insertion réussie.";
                }
            } catch (PDOException $e) {
                echo "Erreur d'insertion : " . $e->getMessage();
        } finally {
            // Fermez la connexion à la base de données
            fermerConnexionBd($connexion);
    }
?>
