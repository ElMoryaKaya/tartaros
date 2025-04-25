<?php
    if (!function_exists('obtenirConnexionBd')) {
        function obtenirConnexionBd() {
            $serveur = "localhost";
            $nom_utilisateur = "root";
            $mot_de_passe = "";
            $nom_base_de_donnees = "tartaros";

            try {
                $connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connexion;
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
                exit; // Arrête le script en cas d'échec de la connexion
            }
        }

        function fermerConnexionBd($connexion) {
            // Fermeture de la connexion à la base de données
            $connexion = null;
        }
    }

