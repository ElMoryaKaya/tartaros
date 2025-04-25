<?php
// product_model.php
require_once("../models/Bd_connexion.php");

function getDetailsProduit($productId) {
    $connexion = obtenirConnexionBd();

    $requete = 'SELECT
        produit.id,
        produit.nom_produit,
        produit.photo,
        produit.type_produit,
        produit.date_sortie,
        produit.prix,
        produit.note,
        type_jeux.type_jeux,
        plateforme.nom_console
    FROM
        produit
    INNER JOIN jeux ON produit.id = jeux.id
    INNER JOIN plateforme ON jeux.plateforme_ID = plateforme.id
    INNER JOIN type_jeux ON jeux.type_jeux_ID = type_jeux.id
    WHERE produit.id = :id;';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

