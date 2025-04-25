<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $serveur = "localhost";
    $nom_utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_de_donnees = "tartaros";

    $connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);

    // Récupération de l'ID du produit à supprimer
    $id_produit = $_GET['id'];

    // Préparation de la requête de suppression
    $requete = $connexion->prepare("DELETE FROM produit WHERE id = :id");

    // Liaison des paramètres
    $requete->bindParam(':id', $id_produit);

    // Exécution de la requête
    $requete->execute();

    // Redirection vers la page des produits après la suppression
    header("Location: produit.php");
    exit();
}
?>
