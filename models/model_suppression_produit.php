<?php

require_once('Bd_connexion.php');

function supprimerProduit($connexion, $produit_id, $utilisateur_id)
{
    try {
        // Supprimer les données de la table CLES_ACTIVATION
        $stmtCles = $connexion->prepare("DELETE FROM cles_activation WHERE produit_ID IN (SELECT id FROM produit WHERE id = :produit_id AND utilisateur_id = :utilisateur_id)");
        $stmtCles->bindParam(':produit_id', $produit_id);
        $stmtCles->bindParam(':utilisateur_id', $utilisateur_id);
        $stmtCles->execute();

        // Supprimer les données de la table JEUX
        $stmtJeux = $connexion->prepare("DELETE FROM jeux WHERE id IN (SELECT id FROM produit WHERE id = :produit_id AND utilisateur_id = :utilisateur_id)");
        $stmtJeux->bindParam(':produit_id', $produit_id);
        $stmtJeux->bindParam(':utilisateur_id', $utilisateur_id);
        $stmtJeux->execute();

        // Supprimer le produit de la table PRODUIT
        $stmtProduit = $connexion->prepare("DELETE FROM produit WHERE id = :produit_id AND utilisateur_id = :utilisateur_id");
        $stmtProduit->bindParam(':produit_id', $produit_id);
        $stmtProduit->bindParam(':utilisateur_id', $utilisateur_id);
        $stmtProduit->execute();

        return true;
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la suppression du produit : " . $e->getMessage());
    }
}



