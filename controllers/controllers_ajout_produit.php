<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Affichage des erreurs PHP
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $utilisateur_id = $_SESSION['utilisateur_id'];

    require_once('../models/Bd_connexion.php');
    require_once('../models/models_ajout_produit.php');

    if (isset($_POST['btn_Ajouter_Produit'])) {

        try {

            // Fonction de validation pour vérifier si une chaîne est non vide
            function estNonVide($chaine)
            {
                return isset($chaine) && trim($chaine) !== '';
            }

            // Récupération des données du formulaire
            $nom_produit = empty($_POST['nom_produit']) ? '' : $_POST['nom_produit'];
            $type_produit = empty($_POST['type_produit']) ? '' : $_POST['type_produit'];
            $date_sortie = empty($_POST['date_sortie']) ? '' : $_POST['date_sortie'];
            $prix = empty($_POST['prix']) ? '' : $_POST['prix'];
            $note = empty($_POST['note']) ? '' : $_POST['note'];
            $plateforme_ID = empty($_POST['plateforme']) ? '' : $_POST['plateforme'];
            $type_jeux_ID = empty($_POST['type_jeux']) ? '' : $_POST['type_jeux'];
            $numero_cles = empty($_POST['cles']) ? '' : $_POST['cles'];

            // Vérifier si les champs ne sont pas vides

            if (
                estNonVide($date_sortie) &&
                estNonVide($prix) &&
                estNonVide($note) &&
                estNonVide($plateforme_ID) &&
                estNonVide($type_jeux_ID) &&
                estNonVide($nom_produit) &&
                estNonVide($utilisateur_id)
            ) {

                $dossier_upload = '../images/';
                $nom_fichier = basename($_FILES['avatar']['name']);
                $chemin_fichier = $dossier_upload . $nom_fichier;

                // Vérifier si le produit existe déjà pour cet utilisateur
                if (!produitExistePourUtilisateur($connexion, $nom_produit, $utilisateur_id)) {

                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin_fichier)) {

                        // Insertion dans la table produit
                        $produit_info = insertProduit($connexion, $nom_produit, $chemin_fichier, $type_produit, $date_sortie, $prix, $note, $utilisateur_id);

                        if ($produit_info !== false) {
                            // Utilisez $produit_info['produit_id'] pour obtenir l'ID du produit

                            // INSERTION DES DONNÉES DANS LA TABLE jeux
                            insertJeux($connexion, $produit_info['produit_id'], $plateforme_ID, $type_jeux_ID);

                            // INSERTION DES DONNÉES DANS LA TABLE CLES D'ACTIVATION
                            $numero_cles = generateRandomActivationKey();
                            insertCles($connexion, $produit_info['produit_id'], $numero_cles);

                            echo '<div style="text-align:center; margin:20%;0px;"> <h1> Ajout Reussi.</h1>
                            <a href="../Views/espaceGestion_Cles.php"><button> Retour </button></a> </div>';
                        } else {
                            echo "Erreur lors de l'insertion du produit.";
                        
                        }
                    } else {
                        echo "Erreur lors du téléchargement du fichier.";
                    
                    }
                } else {
                    echo "Le produit existe déjà pour cet utilisateur.";
               
                }
            } else {
                echo "Veuillez remplir tous les champs du formulaire.";
           
            }
        } catch (PDOException $e) { 
            echo "Erreur d'insertion : " . $e->getMessage();
        
        } finally {
            fermerConnexionBd($connexion);
        }
    }
?>
