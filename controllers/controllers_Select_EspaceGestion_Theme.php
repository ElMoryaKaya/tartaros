<?php
    require_once('../models/Bd_connexion.php');
    require_once('../models/models_Select_EspaceGestion_Theme.php');

    $connexion = obtenirConnexionBd();

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $itemsPerPage = 12;

    $totalItems = getTotalItemsCount($connexion);

    $resultat = getProduitsWithDetails($connexion, $page, $itemsPerPage);

    fermerConnexionBd($connexion);

