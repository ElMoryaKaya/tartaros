 <?php 

function obtenirNombreProduitsPanier($utilisateur_id) {
    $serveur = "localhost";
    $nom_utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_de_donnees = "tartaros";
    try {
        // Database connection
        $connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
        // Set PDO attribute PDO::ATTR_ERRMODE to PDO::ERRMODE_EXCEPTION
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Count the number of products in the user's cart
        $requete = $connexion->prepare("SELECT SUM(quantite) as total FROM panier WHERE utilisateur_id = :utilisateur_id");
        $requete->bindParam(':utilisateur_id', $utilisateur_id);
        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        return $resultat['total'] ?? 0;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    } finally {
        $connexion = null; // Close the connection
    }
}

?>

<a href="panier.php" id="cart-link">
    <div id="cart-container">
        <img src="../images/font/panier.png" alt="Logo du panier" id="cart-logo">
        <?php
        if (isset($_SESSION['utilisateur_id']) && is_numeric($_SESSION['utilisateur_id'])) {
            // Si l'ID de l'utilisateur est défini et numérique, affiche le nombre de produits dans le panier
            echo '<span id="cart-count">' . obtenirNombreProduitsPanier($_SESSION['utilisateur_id']) . '</span>';
        } else {
            // Si l'ID de l'utilisateur n'est pas trouvé, affiche un message demandant de se connecter
            echo '<span id="cart-count"><p style="color: white;">Veuillez vous connecter pour voir votre panier</p></span>';
        }
        ?>
    </div>
</a>


