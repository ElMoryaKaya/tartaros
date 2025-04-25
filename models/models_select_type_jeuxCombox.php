<?php
require_once('../models/Bd_connexion.php'); // Assurez-vous d'ajuster le chemin

function getTypesJeux($connexion) {
    try {
        // Requête pour récupérer les types de jeux
        $requete = "SELECT `id`, `type_jeux` FROM `type_jeux`";
        $resultat = $connexion->query($requete);

        // Vérifiez s'il y a des résultats
        if ($resultat->rowCount() > 0) {
            // Retournez les résultats sous forme de tableau associatif
            return $resultat->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    } catch (PDOException $e) {
        echo "Erreur de requête pour récupérer les types de jeux : " . $e->getMessage();
    }
}

