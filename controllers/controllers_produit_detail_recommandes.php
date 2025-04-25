<?php
    require_once("../controllers/controllers_produit_details_recommandes.php");

    $connexion = obtenirConnexionBd();

    // Appel de la fonction et récupération des données dans une variable
    $dataToDisplay = afficherPageAccueil($connexion);

    // Fermeture de la connexion à la base de données
    fermerConnexionBd($connexion);
