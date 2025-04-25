<?php

    require_once('../models/Bd_connexion.php');
    $connexion = obtenirConnexionBd();

    function insertProduit($connexion, $nom_produit, $photo, $type_produit, $date_sortie, $prix, $note) {
        // Assurez-vous d'avoir $_SESSION['utilisateur_id'] défini avant d'utiliser la fonction
        if (!isset($_SESSION['utilisateur_id'])) {
            // Gérez le cas où l'utilisateur n'est pas connecté
            return false;
        }

        $utilisateur_id = $_SESSION['utilisateur_id'];

        $insert_query = $connexion->prepare("INSERT INTO produit (nom_produit, photo, type_produit, date_sortie, prix, note, utilisateur_id) VALUES (:nom_produit, :photo, :type_produit, :date_sortie, :prix, :note, :utilisateur_id)");

        $insert_query->bindParam(':nom_produit', $nom_produit);
        $insert_query->bindParam(':photo', $photo);
        $insert_query->bindParam(':type_produit', $type_produit);
        $insert_query->bindParam(':date_sortie', $date_sortie);
        $insert_query->bindParam(':prix', $prix);
        $insert_query->bindParam(':note', $note);
        $insert_query->bindParam(':utilisateur_id', $utilisateur_id);

        try {
            $insert_query->execute();
            $produit_id = $connexion->lastInsertId();
            return ['produit_id' => $produit_id, 'connexion' => $connexion];
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion du produit : " . $e->getMessage();
            return false;
        }
    }

    function insertJeux($connexion, $produit_id, $plateforme_ID, $type_jeux_ID) {

        $insert_query = $connexion->prepare("INSERT INTO jeux (id, plateforme_ID, type_jeux_ID) VALUES (:produit_id, :plateforme_ID, :type_jeux_ID)");

        $insert_query->bindParam(':produit_id', $produit_id);
        $insert_query->bindParam(':plateforme_ID', $plateforme_ID);
        $insert_query->bindParam(':type_jeux_ID', $type_jeux_ID);
        $insert_query->execute();
    }

    //LA FONCTION GENERE LE CODE D'ACTIVATION ALEOTOIRE
    function generateRandomActivationKey() {
        $key = '';
        for ($i = 0; $i < 16; $i++) {
            if ($i > 0 && $i % 4 === 0) {
                $key .= '-';
            }
            $key .= rand(0, 9);
        }
        return $key;
    }
    
    //
    function insertCles($connexion, $produit_id) {
        
        $numero_cles = generateRandomActivationKey();
    
        $insert_query = $connexion->prepare("INSERT INTO cles_activation (numero_cles, produit_ID) VALUES (:numero_cles, :produit_ID)");
    
        $insert_query->bindParam(':numero_cles', $numero_cles);
        $insert_query->bindParam(':produit_ID', $produit_id);
        $insert_query->execute();
    }

    function produitExistePourUtilisateur($connexion, $nom_produit, $utilisateur_id) {

        $select_query = $connexion->prepare("SELECT COUNT(*) FROM produit WHERE nom_produit = :nom_produit AND utilisateur_id = :utilisateur_id");
        $select_query->bindParam(':nom_produit', $nom_produit);
        $select_query->bindParam(':utilisateur_id', $utilisateur_id);
        $select_query->execute();
        $count = $select_query->fetchColumn();
        return $count > 0;
    }

    