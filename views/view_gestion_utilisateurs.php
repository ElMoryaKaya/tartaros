<?php

session_start();

// Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
$serveur = "localhost";
$nom_utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "tartaros";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion à la base de données: " . $e->getMessage());
}

// Récupération des utilisateurs actifs
$requete = $connexion->prepare("SELECT * FROM utilisateur WHERE statut = 'utilisateur'");
$requete->execute();
$utilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Style/chat.css">
  <link rel="stylesheet" type="text/css" href="../Style/style.css">
  <link rel="stylesheet" type="text/css" href="../Style/panier.css">
    <title>Liste des Utilisateurs</title>
</head>

<header>
    <?php include("menu_principal.php"); ?>
  </header>

<body>
    <h2>Liste des Utilisateurs</h2>
    <?php if (!empty($utilisateurs)) : ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom d'Utilisateur</th>
            <th>Email</th>
            <th>Actif</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <tr>
                <td><?= $utilisateur['id'] ?></td>
                <td><?= $utilisateur['pseudo'] ?></td>
                <td><?= $utilisateur['email'] ?></td>
                <td><?= $utilisateur['actif'] ?></td>
                <td>
                    <form action="gestion_utilisateurs.php" method="post">
                        <input type="hidden" name="id_utilisateur" value="<?= $utilisateur['id'] ?>">
                        <button type="submit" name="bloquer">Bloquer</button>
                        <button type="submit" name="supprimer">Supprimer</button>
                        <button type="submit" name="reactiver">Réactiver</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php else : ?>
        <p>Aucun utilisateur trouvé.</p>
    <?php endif; ?>
    <?php

    // Traitement des actions de blocage et de suppression
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idUtilisateur = $_POST['id_utilisateur'];

        if (isset($_POST['bloquer'])) {
            // Met à jour la colonne 'actif' dans la table utilisateur à 0
            $requeteBloquer = $connexion->prepare("UPDATE utilisateur SET actif = 0 WHERE id = ?");
            $requeteBloquer->execute([$idUtilisateur]);
        } elseif (isset($_POST['reactiver'])) {
            // Réactive l'utilisateur en mettant à jour la colonne 'actif' à 1
            $requeteReactiver = $connexion->prepare("UPDATE utilisateur SET actif = 1 WHERE id = ?");
            $requeteReactiver->execute([$idUtilisateur]);
        } elseif (isset($_POST['supprimer'])) {
            // Met à jour la colonne 'deleted_at' dans la table utilisateur avec la date actuelle
            $dateActuelle = date('Y-m-d H:i:s');
            $requeteSupprimer = $connexion->prepare("UPDATE utilisateur SET deleted_at = ? WHERE id = ?");
            $requeteSupprimer->execute([$dateActuelle, $idUtilisateur]);
        }

        // Rafraîchir la page après l'action
        header("Location: view_gestion_utilisateurs.php");
        exit();
    }

    ?>

 <footer>
    <?php include("Footer.php"); ?>
  </footer>

</body>

</html>
