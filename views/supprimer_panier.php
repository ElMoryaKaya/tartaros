<?php
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $panier_id = $_GET['id'];
        //
        $serveur = "localhost";
        $nom_utilisateur = "root";
        $mot_de_passe = "";
        $nom_base_de_donnees = "tartaros";
    
        $connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
    
        // Préparation de la requête de suppression
        $requete = $connexion->prepare("DELETE FROM panier WHERE id = :id");
    
        // Liaison des paramètres
        $requete->bindParam(':id', $panier_id);
    
        // Exécution de la requête
        $requete->execute();
    
        // Redirection vers la page des produits après la suppression
       // header("Location: produit.php");
    
}

header("Location: panier.php");
?>
