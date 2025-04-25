<?php
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
   
?>

<!DOCTYPE html>
<html lang="fr">
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
  
  <form method="POST" action="form2.php">
    <div class="user-box">
      <button type="submit" name="category" value="produits">Questions sur les produits</button>
    </div>
    <div class="user-box">
      <button type="submit" name="category" value="commande">Questions sur la commande</button>
    </div>
    <div class="user-box">
      <button type="submit" name="category" value="assistance">Questions sur l'assistance</button>
    </div>
    <div class="user-box">
      <button type="submit" name="category" value="ouvertes">Questions plus ouvertes</button>
    </div>
  </form>


  <footer>
    <?php include("Footer.php"); ?>
  </footer>

  <script src="script.js"></script>
</body>
</html>
