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
    <link rel="stylesheet" href="../style/extension_theme.css">
    <link rel="stylesheet" href="../style/style_indexE.css">
   <!-- <link rel="stylesheet" href="../style/style_recherche2.css"> -->
   
    <title>Recherche de Produits</title>
    <style>
        #search-results {
            list-style: none;
            padding: 0;
            max-width: 300px;
        }

        #search-results li {
            cursor: pointer;
            padding: 5px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }

        .product-image {
            max-width: 500px;  
            max-height: 500px; 
        }

    </style>
</head>

<header>
    <?php include("menu_principal.php"); ?>
  </header>

<body>

<div class="container">

<input type="text" id="search" placeholder="Rechercher un produit...">
<ul id="search-results"></ul>

<div id="resultats"></div>

</div>

<script src="../models/models_script2.js"></script>


</body>
</html>
