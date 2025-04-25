<?php
//session_start();

$serveur = "localhost";
$nom_utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "tartaros";

$connexion = new PDO("mysql:host=$serveur; dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
// Définir l'attribut PDO::ATTR_ERRMODE sur PDO::ERRMODE_EXCEPTION
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// recuperer les produits dans le panier
$utilisateur_id = $_SESSION['utilisateur_id'];

$resultat = $connexion->query("SELECT distinct p.id as id, pp.prix as prix,
 p.quantite as quantite , pp.id as produit_id,  
 pp.nom_produit as nom_produit  
 FROM panier p, produit pp 
where p.produit_id=pp.id and p.utilisateur_id=".$utilisateur_id);

if ($resultat->rowCount() > 0) {
    echo "<table border='3'>
            <tr>
                <th hidden>Id</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
                <th>Suppression</th>
            </tr>";

    $total = 0;

    while ($produit = $resultat->fetch()) {
        $totalProduit = $produit['quantite'] * $produit['prix'];
        $total += $totalProduit;

        echo "<tr>
                <td hidden>{$produit['id']}</td>
                <td>{$produit['nom_produit']}</td>
                <td>{$produit['quantite']}</td>
                <td>{$produit['prix']} €</td>
                <td>{$totalProduit} €</td>
                <td><button><a href='supprimer_panier.php?id={$produit['id']}'>Supprimer</a></button></td>
              </tr>";
    }

    echo "<tr>
            <td colspan='3'>Total</td>
            <td>{$total} €</td>
            <td></td>
          </tr>
        </table>";

    
    echo "<form action='achat.php' method='post'>
            <input type='hidden' name='total_achat' value='{$total}'>
            <button type='submit'>Effectuer l'achat</button>
          </form>";

    
    echo "<form action='appliquer_reduction.php' method='post'>
            <label for='code_reduction'>Code de réduction:</label>
            <input type='text' name='code_reduction' id='code_reduction'>
            <input type='submit' value='Appliquer Réduction'>
          </form>";
} else {
    echo "Le panier est vide.";
}
?>
