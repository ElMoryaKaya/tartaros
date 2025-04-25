<?php
session_start();
require "../models/Bd_connexion.php";
require "../models/models_Insertion_utilisateur.php";

if (isset($_POST['pseudo'], $_POST['email'], $_POST['mot_de_passe'])) {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    try {
        $connexion = obtenirConnexionBd();

        // Vérifiez l'unicité du pseudo et de l'email avant d'effectuer l'insertion
        $existing_user = verifierUnicitePseudo($connexion, $pseudo);
        $existing_user_email = verifierUniciteEmail($connexion, $email);

        if ($existing_user) {
            echo '<div style="text-align:center; margin:20%;0px;"> <h1>Ce pseudo est déjà utilisé. Veuillez en choisir un autre.</h1>
                    <a href ="../views/Page_Inscription_Utilisateur.php"><button>Retour</button></a>
                    </div>';
        } elseif ($existing_user_email) {
            echo '<div style="text-align:center; margin:20%;0px;"> 
                    <h1>Cet email est déjà utilisé. Veuillez en choisir un autre.</h1>
                    <a href ="../views/Page_Inscription_Utilisateur.php"><button>Retour</button></a> 
                </div>';
        } else {
            // Déterminez le statut de l'utilisateur (à implémenter selon vos besoins)
            $statut = determinerStatut($connexion);

            // Insérez l'utilisateur dans la base de données
            insererUtilisateur($connexion, $pseudo, $email, $mot_de_passe, $statut);

            echo "<div 'text-align:center; margin:20%;0px;'> <h1>Insertion réussie.</h1> <h2>Le statut est : $statut </h2> 
                <a href ='../Views/connexion_utilisateur.php'><button>Retour</button></a>
            </div>";
        }
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
    } finally {
        fermerConnexionBd($connexion);
    }
} else {
    echo "Tous les champs du formulaire doivent être remplis.";
}

