<?php
    require_once('../models/Bd_connexion.php');
    require_once('../models/models_UPDATE_EspaceGestion_Cles.php');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        if (isset($_POST["produit_id"])) {
            
            $produit_id = $_POST["produit_id"];
            
            // Redirigez vers la page de modification avec l'ID du produit sélectionné
            
            header("Location: controllers_recuperationURL.php?id=$produit_id");
            exit;
        }
    }
