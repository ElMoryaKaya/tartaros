<?php
require_once("../models/Bd_connexion.php");

function getProduitsWithDetails($connexion, $page = 1, $itemsPerPage = 10)
{
    $offset = ($page - 1) * $itemsPerPage;

    $requete = 'SELECT
        produit.id,
        produit.nom_produit,
        produit.photo,
        produit.type_produit,
        produit.date_sortie,
        produit.prix,
        produit.note,
        type_jeux.type_jeux,
        plateforme.nom_console,
        cles_activation.numero_cles
    FROM
        
        produit
    
    INNER JOIN jeux ON produit.id = jeux.id
    INNER JOIN plateforme ON jeux.plateforme_ID = plateforme.id
    INNER JOIN cles_activation ON produit.id = cles_activation.produit_ID
    INNER JOIN type_jeux ON jeux.type_jeux_ID = type_jeux.id
    WHERE produit.type_produit = :type_produit
    LIMIT :offset, :itemsPerPage;';

    $type_produit = 'cles';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':type_produit', $type_produit, PDO::PARAM_STR);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
    $stmt->execute();

    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}

function getTotalItemsCount($connexion)
{
    $requete = 'SELECT COUNT(*) as total FROM produit WHERE type_produit = :type_produit;';
    $type_produit = 'cles';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':type_produit', $type_produit, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

