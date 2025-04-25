<?php
    require "../models/Bd_connexion.php";
    require_once("../models/models_index.php");

    $connexion = obtenirConnexionBd();
    function afficherPageAccueil($connexion, $page = 1, $itemsPerPage = 10) {
        $produitsPopulaires = getProduitsPopulaires($connexion);
        $nouvellesSorties = getNouvellesSorties($connexion);
        $offresSpeciales = getOffresSpeciales($connexion);
        $meilleuresVentes = getMeilleuresVentes($connexion);

        // Autres traitements si nécessaires...

        // Retourne un tableau associatif contenant les données à afficher
        return [
            'produitsPopulaires' => $produitsPopulaires,
            'nouvellesSorties' => $nouvellesSorties,
            'offresSpeciales' => $offresSpeciales,
            'meilleuresVentes' => $meilleuresVentes,
        ];
    }

    // Appel de la fonction et récupération des données dans une variable
    $dataToDisplay = afficherPageAccueil($connexion);

    // Fermeture de la connexion à la base de données
    fermerConnexionBd($connexion);


