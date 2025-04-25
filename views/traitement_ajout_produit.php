<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serveur = "localhost";
    $nom_utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_de_donnees = "tartaros";

    $connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);

    // Récupération des données du formulaire
    $nom_produit = $_POST['nom_produit'];
    $prix = $_POST['prix'];
    $note = $_POST['note'];
    $date_sortie = $_POST['date_sortie'];

    // Préparation de la requête
    $requete = $connexion->prepare("INSERT INTO produit (nom_produit, prix, note, date_sortie) VALUES (:nom_produit, :prix, :note, :date_sortie)");

    // Liaison des paramètres
    $requete->bindParam(':nom_produit', $nom_produit);
    $requete->bindParam(':prix', $prix);
    $requete->bindParam(':note', $note);
    $requete->bindParam(':date_sortie', $date_sortie);

    // Exécution de la requête
    $requete->execute();

    // Redirection vers la page des produits après l'ajout
    header("Location: produit.php");
    exit();
}
?>
