<?php
   // include('../Model/session_start.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/Catalogue.css">
    <title>Votre Site de Vente</title>
</head>
<body>
    <header>
        <?php include("menu_principal.php"); ?>
    </header>
    <?php include ("view_catalogue_.php");?>
    <footer>
        <?php include('Footer.php'); ?>
    </footer>
</body>
</html>
