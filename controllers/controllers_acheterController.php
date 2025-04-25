<?php
    session_start();

    // Vérification de session pour l'utilisateur connecté
    if (!isset($_SESSION['utilisateur_id'])) {
        // Stocker l'URL dans la session
        $_SESSION['derniere_url'] = $_SERVER['REQUEST_URI'];

        // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
        header("Location: ../views/connexion_utilisateur.php");
        exit();
    }

    // Vérification si l'utilisateur est un administrateur
    if ($_SESSION['statut'] === 'administrateur') {
        
        // Stocker l'URL dans la session
        $_SESSION['derniere_url'] = $_SERVER['REQUEST_URI'];

     // Afficher le message dans un div centré
    echo '<div style="display: flex; align-items: center; justify-content: center; height: 100vh; text-align: center;">
            <p>Il n\'est pas permis à un administrateur d\'acheter un produit. Veuillez créer un compte utilisateur</p>
            <a href="../views/connexion_utilisateur.php">
                <button style="display: block;">Veuillez cliquer ici pour créer votre compte</button>
            </a>
        </div>';
        session_destroy();  // Déconnexion de l'administrateur

        exit();
    }

    // Redirection vers la page d'achat avec l'ID du produit
    $productDetails = isset($_GET['id']) ? $_GET['id'] : '';

    // Assurez-vous que l'ID du produit est valide avant la redirection
    if ($productDetails) {
        // Utilisation de var_dump pour déboguer

        header("Location:../views/views_achate_produit.php?id=$productDetails");
        exit();

    } else {
       
        // Gérer le cas où l'ID du produit n'est pas défini ou est invalide
        header("Location: erreur.php");
        
        exit();
    }
