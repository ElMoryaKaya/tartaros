<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données tartaros
    $serveur = "localhost"; // Mettez l'adresse du serveur MySQL
    $utilisateur = "root"; // Mettez votre nom d'utilisateur MySQL
    $motDePasse = ""; // Mettez votre mot de passe MySQL
    $baseDeDonnees = "tartaros"; // Mettez le nom de votre base de données

    // Connexion à la base de données
    if ($connexion->connect_error) {
        die("La connexion a échoué : " . $connexion->connect_error);
    }

    // Récupération des données du formulaire
    $texte = $_POST['texte'];
    $utilisateurID = $_POST['utilisateur_ID'];

    // Requête d'insertion dans la table message
    $sql = "INSERT INTO message (texte, date_envoi, utilisateur_ID) VALUES ('$texte', NOW(), '$utilisateurID')";

    if ($connexion->query($sql) === TRUE) {
        echo "Le message a été envoyé avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $connexion->error;
    }

    // Fermeture de la connexion à la base de données
    $connexion->close();
} else {
    echo "Une erreur s'est produite lors de l'envoi du formulaire.";
}
?>
