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
        plateforme.nom_console
    FROM
        produit
    INNER JOIN jeux ON produit.id = jeux.id
    INNER JOIN plateforme ON jeux.plateforme_ID = plateforme.id
    WHERE plateforme.nom_console = :nom_console
    LIMIT :offset, :itemsPerPage';
    

    $nom_console = 'Xbox Series X|S';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':nom_console', $nom_console, PDO::PARAM_STR);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
    $stmt->execute();

    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}



function getTotalItemsCount($connexion)
{
    $requete = 'SELECT COUNT(*) as total FROM produit INNER JOIN jeux ON produit.id = jeux.id WHERE jeux.plateforme_ID = :plateforme_ID;';
    $nom_console = 'Xbox Series X|S';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':plateforme_ID', $nom_console, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

