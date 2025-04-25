<?php
    session_start();

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Affichage des erreurs PHP
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $utilisateur_id = $_SESSION['utilisateur_id'];

    require_once('../models/Bd_connexion.php');
    require_once('../models/model_suppression_produit.php');
    

    if (isset($_GET['id'])) {
        $produit_id = $_GET['id'];
    

        try {
            $connexion = obtenirConnexionBd();

            // Vérifier si le produit appartient à l'utilisateur
            if (supprimerProduit($connexion, $produit_id, $utilisateur_id)) {
               
                // Supprimer le produit et ses données associées
                if (supprimerProduit($connexion, $produit_id, $utilisateur_id)) {
                    
                    echo '<div style="text-align:center; margin:20%;0px;"> <h1> Suppression Reussie.</h1>
                    <a href="../Views/espaceGestion_Cles.php"><button> Retour </button></a> </div>';

                } else {

                    echo "Erreur lors de la suppression du produit.";

                }
            } else {
                
                echo "Le produit ne peut pas être supprimé car il n'appartient pas à l'utilisateur.";

            }
        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();
            
        } finally {

            fermerConnexionBd($connexion);

        }
    } else {

        echo "ID du produit non spécifié.";

    }
