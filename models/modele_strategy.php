<?php
require_once("../models/Bd_connexion.php");

function getProduitsWithDetails($connexion, $page = 1, $itemsPerPage = 10)
{
    $offset = ($page - 1) * $itemsPerPage;

    $requete = 'SELECT
        produit.id,
        produit.nom_produit,
        produit.photo,
        produit.prix,
        type_jeux.type_jeux
    FROM
        produit
    INNER JOIN jeux ON produit.id = jeux.id
    INNER JOIN type_jeux ON jeux.type_jeux_ID = type_jeux.id
    WHERE type_jeux.type_jeux = :type_jeux
    LIMIT :offset, :itemsPerPage';
    

    $type_jeux = 'stratégie';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':type_jeux', $type_jeux, PDO::PARAM_STR);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
    $stmt->execute();

    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}



function getTotalItemsCount($connexion)
{
    $requete = 'SELECT COUNT(*) as total FROM produit INNER JOIN jeux ON produit.id = jeux.id WHERE jeux.type_jeux_ID = :type_jeux_ID;';
    $type_jeux = 'stratégie';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':type_jeux_ID', $type_jeux, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

