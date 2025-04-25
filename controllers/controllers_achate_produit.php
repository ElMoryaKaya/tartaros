<?php
    // Inclure le modèle et d'autres dépendances
    require_once("../models/models_achate_produit.php");

    // Vérifier si la session n'est pas déjà active
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Si le formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commander'])) {
        // Vérifiez si les clés nécessaires existent dans $_POST
        if (
            isset($_POST["nom_client"]) &&
            isset($_POST["prenom_client"]) &&
            isset($_POST["ville_client"]) &&
            isset($_POST["adresse"]) &&
            isset($_POST["code_postal"]) &&
            isset($_POST["pays"])
        ) {
            // Récupérer les données du formulaire
            $nom = $_POST["nom_client"];
            $prenom = $_POST["prenom_client"];
            $ville = $_POST["ville_client"];
            $adresse = $_POST["adresse"];
            $code_postal = $_POST["code_postal"];
            $pays = $_POST["pays"];

            // Utilisez la session pour récupérer l'id_utilisateur si c'est là que vous le stockez
            if (isset($_SESSION['utilisateur_id'])) {
                
                $id_utilisateur = $_SESSION['utilisateur_id'];

                // Appeler la fonction pour ajouter l'utilisateur avec une adresse
                $ajoutReussi = ajouterUtilisateurAvecAdresse($id_utilisateur, $nom, $prenom, $ville, $adresse, $code_postal, $pays);

                // Vérifier si l'ajout a réussi
                if ($ajoutReussi) {
                   
                    echo "commande ajouté avec succès!";
                    
                    // Vous pouvez également rediriger l'utilisateur ou faire d'autres actions nécessaires ici
                    
                    // Ajouter l'ID d'achat à la session si vous en avez besoin dans d'autres parties de votre application
                    $_SESSION['product_id'] = $productDetails['id'];

                } else {
                    echo "Une erreur est survenue lors de l'achet.";
                }
            } else {
                echo "L'id_utilisateur n'est pas défini dans la session.";
            }
        } else {
            echo "Tous les champs requis ne sont pas présents dans le formulaire.";
        }
    }

