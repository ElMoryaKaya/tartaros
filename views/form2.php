<?php
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../Style/chat.css"> 
  <link rel="stylesheet" type="text/css" href="../Style/style.css">
  <title>Tartaros</title>
</head>
<body>
  <header>
    <?php include("menu_principal.php"); ?>
  </header>
  
  <?php
  if(isset($_POST['category'])) {
    $category = $_POST['category'];
    switch($category) {
      case 'produits':
        echo '<h1>Questions sur les produits</h1>';
        // Formulaire pour les questions sur les produits
        echo '<form method="post" action="form3.php">';
        echo '<button type="submit" name="category" value="produits">Quelles sont les différentes consoles disponibles ?</button>';
        echo '<button type="submit" name="category" value="produits">Quels sont les prix des jeux ?</button>';
        echo '<button type="submit" name="category" value="produits">Quelles sont les caractéristiques des extensions ?</button>';
        echo '<button type="submit" name="category" value="produits">Quels sont les avis des clients sur les produits ?</button>';
        echo '</form>';
        break;
      // Les autres cas pour d'autres catégories avec leurs formulaires respectifs peuvent être ajoutés ici
      case 'commande':
        echo '<form method="post" action="form3.php">';
        echo ' <button type="submit" name="category" value="commande">Comment passer une commande ?</button>';
        echo '<button type="submit" name="category" value="commande">Comment suivre ma commande ?</button>';
        echo '<button type="submit" name="category" value="commande">Comment payer ma commande ?</button>';
        echo '<button type="submit" name="category" value="commande">Comment obtenir un remboursement ?</button>';
        echo '</form>';
        break;
      case 'assistance':
        echo '<form method="post" action="form3.php">';
        echo '<button type="submit" name="category" value="assistance">Comment contacter le service client ?</button>';
        echo '<button type="submit" name="category" value="assistance">Quelles sont les heures d ouverture du service client ?</button>';
        echo '<button type="submit" name="category" value="assistance">Comment résoudre un problème avec ma commande ?</button>';
        echo '</form>';
        break;
      case 'ouvertes':
        echo '<form method="post" action="form3.php">';
        echo '<button type="submit" name="category" value="ouvertes">Avez-vous des recommandations de jeux ?</button>';
        echo '<button type="submit" name="category" value="ouvertes">Quel est votre jeu vidéo préféré ?</button>';
        echo '<button type="submit" name="category" value="ouvertes">Pourquoi avez-vous choisi de vendre des clés en ligne </button>';
        echo '</form>';
        break;
      default:
        echo '<p>Aucune catégorie sélectionnée</p>';
    }
  } else {
    echo '<p>Aucune catégorie sélectionnée</p>';
  }
  ?>

  <footer>
    <?php include("Footer.php"); ?>
  </footer>
</body>
</html>
