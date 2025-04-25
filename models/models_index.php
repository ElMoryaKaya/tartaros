<?php
    require "../models/Bd_connexion.php";
        
    $connexion = obtenirConnexionBd();
   
    function getProduitsPopulaires($connexion) {
        $query = "SELECT id, nom_produit, photo, prix FROM produit ORDER BY RAND() LIMIT 8";
        $stmt = $connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    function getNouvellesSorties($connexion) {
        $query = "SELECT id, nom_produit, photo, prix FROM produit ORDER BY date_sortie DESC LIMIT 8";
        $stmt = $connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getOffresSpeciales($connexion) {
        $query = "SELECT id, nom_produit, photo, prix FROM produit ORDER BY note DESC LIMIT 8";
        $stmt = $connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getMeilleuresVentes($connexion) {
        $query = "SELECT id, nom_produit, photo, prix FROM produit ORDER BY prix ASC LIMIT 8";
        $stmt = $connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>
