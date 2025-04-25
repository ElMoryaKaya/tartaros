<?php
require_once('../models/Bd_connexion.php'); // Assurez-vous d'ajuster le chemin
require_once('../models/models_select_plataformeCombox.php'); // Assurez-vous d'ajuster le chemin

try {
    // Utilisez votre fichier de connexion ici
    $connexion = obtenirConnexionBd();

    // Récupération des plateformes depuis le modèle
    $plateformes = getPlateformes($connexion);
    
} catch (PDOException $e) {
    echo "Erreur de récupération des plateformes : " . $e->getMessage();
}

