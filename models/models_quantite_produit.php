<?php

require_once('../models/Bd_connexion.php');

function obtenirClesDisponibles() {
        $connexion = obtenirConnexionBd();

        $sql = "SELECT c.id, c.numero_cles
                
                FROM cles_activation c
                
                LEFT JOIN (
                    
                    SELECT cles_ID, COUNT(*) AS nombre_achetees
                    FROM cles_achat
                    GROUP BY cles_ID

                ) ca ON c.id = ca.cles_ID
                
                WHERE ca.cles_ID IS NULL OR c.nombre_total > ca.nombre_achetees";

        $resultat = $connexion->query($sql);

        $clesDisponibles = [];

        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $clesDisponibles[] = $row;
        }

        fermerConnexionBd($connexion);

        return $clesDisponibles;
    }


