<?php
    require "../models/Bd_connexion.php";
    
    $connexion = obtenirConnexionBd();
    function checkConsoleExistence($connexion, $nom_console) {
        $check_console_query = $connexion->prepare("SELECT id FROM plateforme WHERE LOWER(nom_console) = LOWER(:nom_console)");
        $check_console_query->bindParam(':nom_console', $nom_console);
        $check_console_query->execute();
        return $check_console_query->fetch();
    }

    function insertConsole($connexion, $nom_console) {
        $insert_query = $connexion->prepare("INSERT INTO plateforme (nom_console) VALUES (:nom_console)");
        $insert_query->bindParam(':nom_console', $nom_console);
        $insert_query->execute();
    }

