<?php
session_start();

// Check if a product ID is provided and it is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Add the product to the cart
    $produit_id = $_GET['id'];
    $utilisateur_id = $_SESSION['utilisateur_id'] ;

    insertOrupdatePanier($produit_id,$utilisateur_id);
      
}

header("Location: panier.php");

function obtenirPrixProduitDepuisBD($produit_id) {
    $serveur = "localhost";
    $nom_utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_de_donnees = "tartaros";
    try {
        // Connexion à la base de données
        $connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);

        // Définir l'attribut PDO::ATTR_ERRMODE sur PDO::ERRMODE_EXCEPTION
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération du prix du produit depuis la base de données
        $requete = $connexion->prepare("SELECT * FROM produit where id = :produit_id");
        $requete->bindParam(':produit_id', $produit_id);
        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
       

        if ($resultat) {
            return $resultat['prix'];
        } else {
            return 0;
        }
    } catch (PDOException $e) {
        die("Échec de la connexion à la base de données: " . $e->getMessage());
    } finally {
        // Fermer la connexion dans le bloc finally pour s'assurer qu'elle est toujours fermée
        $connexion = null;
    }
}

function insertPanier($produit_id,$utilisateur_id) {
    $serveur = "localhost";
    $nom_utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_de_donnees = "tartaros";
    try {
        // Database connection
        $connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
        // Définir l'attribut PDO::ATTR_ERRMODE sur PDO::ERRMODE_EXCEPTION
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into the 'panier' table
        $qte = '1';
        $insert_query = $connexion->prepare("INSERT INTO panier (produit_id, quantite, utilisateur_id) VALUES (:produit_id, :quantite, :utilisateur_id)");
        $insert_query->bindParam(':produit_id', $produit_id);
        $insert_query->bindParam(':quantite', $qte);
        $insert_query->bindParam(':utilisateur_id', $utilisateur_id);
        $insert_query->execute();
        
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    } finally {
        $connexion = null; // Close the connection in the finally block to ensure it is always closed
    }
}

function insertOrupdatePanier($produit_id,$utilisateur_id) {
    $serveur = "localhost";
    $nom_utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_de_donnees = "tartaros";
    try {
        // Database connection
        $connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
        // Définir l'attribut PDO::ATTR_ERRMODE sur PDO::ERRMODE_EXCEPTION
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // select in panier
        $requete = $connexion->prepare("SELECT * FROM panier where produit_id = :produit_id and utilisateur_id = :utilisateur_id");
        $requete->bindParam(':produit_id', $produit_id);
        $requete->bindParam(':utilisateur_id', $utilisateur_id);
        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        if ($resultat && $resultat['id']) {
         // Update data into the 'panier' table
         $qte = $resultat['quantite']+1;
        $insert_query = $connexion->prepare("UPDATE panier set quantite=:new_quantite where id=:id ");
        $insert_query->bindParam(':new_quantite', $qte);
        $insert_query->bindParam(':id', $resultat['id']);
        $insert_query->execute();
        } else {
         insertPanier($produit_id,$utilisateur_id);
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    } finally {
        $connexion = null; // fermée la connection 
    }
}

?>