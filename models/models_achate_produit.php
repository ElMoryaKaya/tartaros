<?php
require_once("../models/Bd_connexion.php");

function ajouterUtilisateurAvecAdresse($id_utilisateur, $nom, $prenom, $ville, $adresse, $code_postal, $pays)
{
    $connexion = obtenirConnexionBd();

    try {
        
        // Commencer une transaction
        $connexion->beginTransaction();

        // Mettre à jour les colonnes nom_client et prenom_client de l'utilisateur
        $stmtUtilisateur = $connexion->prepare("UPDATE utilisateur SET nom_client = :nom, prenom_client = :prenom WHERE id = :id_utilisateur");
        $stmtUtilisateur->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmtUtilisateur->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmtUtilisateur->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $stmtUtilisateur->execute();

        // Récupérer l'ID de l'utilisateur ajouté
        $utilisateurID = $connexion->lastInsertId();

        // Ajouter l'adresse associée à l'utilisateur
        $stmtAdresse = $connexion->prepare("INSERT INTO adresse (ville_client, adresse, code_postal, pays, utilisateur_ID) VALUES (:ville, :adresse, :code_postal, :pays, :utilisateur_id)");
        $stmtAdresse->bindParam(':ville', $ville, PDO::PARAM_STR);
        $stmtAdresse->bindParam(':adresse', $adresse, PDO::PARAM_STR);
        $stmtAdresse->bindParam(':code_postal', $code_postal, PDO::PARAM_STR);
        $stmtAdresse->bindParam(':pays', $pays, PDO::PARAM_STR);
        $stmtAdresse->bindParam(':utilisateur_id', $id_utilisateur, PDO::PARAM_INT);
        $stmtAdresse->execute();

        // Récupérer l'ID de l'adresse ajoutée
        $adresseID = $connexion->lastInsertId();

        // Ajouter une entrée dans la table achat
        $stmtAchat = $connexion->prepare("INSERT INTO achat (date_achat, utilisateur_ID) VALUES (CURRENT_DATE, :utilisateur_id)");
        $stmtAchat->bindParam(':utilisateur_id', $id_utilisateur, PDO::PARAM_INT);
        $stmtAchat->execute();

        // Récupérer l'ID de l'achat ajouté
        $achatID = $connexion->lastInsertId();

        // Ajouter une entrée dans la table cles_achat
        $stmtClesAchat = $connexion->prepare("INSERT INTO cles_achat (achet_ID, cles_ID) VALUES (:achat_id, :cles_id)");

        // Assume that $clesID is the ID of the key obtained from sessions
     
        $stmtClesAchat->bindParam(':achat_id', $achatID, PDO::PARAM_INT);
        $stmtClesAchat->bindParam(':cles_id', $clesID, PDO::PARAM_INT);
        $stmtClesAchat->execute();

        // Valider la transaction
        $connexion->commit();

        fermerConnexionBd($connexion);

        return true;
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        $connexion->rollBack();
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

