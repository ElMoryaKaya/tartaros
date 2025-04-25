<?php
include_once "../models/Bd_connexion.php";
include_once "../models/Models_Select_utilisateur.php";

try {
    $connexion = obtenirConnexionBd();
    session_start();

    if (isset($_POST['Btn_connecter'])) {

        if (isset($_POST['pseudo'], $_POST['mot_de_passe'])) {

            $pseudo = $_POST['pseudo'];
            $mot_de_passe_saisi = $_POST['mot_de_passe'];

            $resultat = obtenirUtilisateurParPseudo($connexion, $pseudo);

            if ($resultat) {

                $mot_de_passe_crypte = $resultat['mot_de_passe'];

                if (password_verify($mot_de_passe_saisi, $mot_de_passe_crypte)) {

                    $_SESSION['statut'] = $resultat['statut'];
                    $_SESSION['utilisateur_id'] = $resultat['id'];

                    // Stocker l'URL dans la session
                    if (isset($_SESSION['derniere_url'])) {
                       
                        $derniere_url = $_SESSION['derniere_url'];
                        unset($_SESSION['derniere_url']);  // Optionnel : supprimer l'URL stockée après la redirection
                        header("Location: $derniere_url");
                        
                    } else {
                        // Redirection vers l'URL par défaut
                        header("Location: ../views/index.php");
                    }
                    exit;
                } else {
                    // Stocker l'URL dans la session
                    $_SESSION['derniere_url'] = $_SERVER['REQUEST_URI'];

                    // Afficher une image pour l'échec de la connexion
                    echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">';
                    echo '<img src="../images/Échec.png" alt="Échec de la connexion" style="width: 500px; height: auto;">';
                    echo '</div>';
                }
            } else {
                // Stocker l'URL dans la session
                $_SESSION['derniere_url'] = $_SERVER['REQUEST_URI'];

                // Afficher une image pour l'échec de la connexion
                echo '<div style="text-align:center; margin:20%;0px;"> <h1> Echec de la Connexion</h1>
                <a href="../views/connexion_utilisateur.php"><button> Retour </button></a> </div>';
            }
        }
    }
} catch (PDOException $e) {
    // Stocker l'URL dans la session
    $_SESSION['derniere_url'] = $_SERVER['REQUEST_URI'];

    // Afficher une image pour l'erreur de connexion à la base de données
    echo '<img src="../tartaros/images/Échec.png" alt="Erreur de connexion à la base de données" style="width: 1200px; height: 700px;">';
} finally {
    fermerConnexionBd($connexion);
}

