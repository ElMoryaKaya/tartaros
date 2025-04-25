<?php
    require_once('../models/Bd_connexion.php');
    require_once('../models/modele_sport.php');

    $connexion = obtenirConnexionBd();

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $itemsPerPage = 12;

    $totalItems = getTotalItemsCount($connexion);

    // Calcul de $totalPages ici
    $totalPages = ceil($totalItems / $itemsPerPage);

    $resultat = getProduitsWithDetails($connexion, $page, $itemsPerPage);

    fermerConnexionBd($connexion);

