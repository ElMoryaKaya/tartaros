<?php

// Informations de connexion à la base de données
$serveur = "localhost";
$nom_utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "tartaros";

// Connexion à la base de données
$connexion = new mysqli($serveur, $nom_utilisateur, $mot_de_passe, $nom_base_de_donnees);

// Vérifie la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupère la valeur de recherche de la barre d'entrée
$recherche = isset($_GET['recherche']) ? $_GET['recherche'] : '';

// Requête SQL pour sélectionner les produits correspondant à la recherche
$sql = "SELECT * FROM produit WHERE type_produit = 'extension' AND nom_produit LIKE '%$recherche%'";
$resultat = $connexion->query($sql);

// Crée un tableau pour stocker les résultats
$liste_produits = array();

// Ajoute chaque résultat au tableau
while ($ligne = $resultat->fetch_assoc()) {
    $liste_produits[] = $ligne;
}

// Retourne les résultats au format JSON
echo json_encode($liste_produits);

// Ferme la connexion à la base de données
$connexion->close();

?>
