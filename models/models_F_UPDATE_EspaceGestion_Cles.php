<?php

require ('../models/Bd_connexion.php');

$connexion = obtenirConnexionBd();

function updateProduit($connexion, $produit_id, $nouvellesDonnees)
{
    
    $requete = 'UPDATE produit SET
        nom_produit = :nom_produit,
        photo = :photo,
        type_produit = :type_produit,
        date_sortie = :date_sortie,
        prix = :prix,
        note = :note
    WHERE id = :produit_id ';

    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':nom_produit', $nouvellesDonnees['nom_produit']);
    $stmt->bindParam(':photo', $nouvellesDonnees['photo']);
    $stmt->bindParam(':type_produit', $nouvellesDonnees['type_produit']);
    $stmt->bindParam(':date_sortie', $nouvellesDonnees['date_sortie']);
    $stmt->bindParam(':prix', $nouvellesDonnees['prix']);
    $stmt->bindParam(':note', $nouvellesDonnees['note']);
    $stmt->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);

    $updateResult = $stmt->execute();

    // Mise à jour de la table jeux
    if ($updateResult) {
        $requeteJeux = 'UPDATE jeux SET
            plateforme_ID = :plateforme_ID,
            type_jeux_ID = :type_jeux_ID
        WHERE id = :produit_id ';

        $stmtJeux = $connexion->prepare($requeteJeux);
        $stmtJeux->bindParam(':plateforme_ID', $nouvellesDonnees['plateforme_ID'], PDO::PARAM_INT);
        $stmtJeux->bindParam(':type_jeux_ID', $nouvellesDonnees['type_jeux_ID'], PDO::PARAM_INT);
        $stmtJeux->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);

        $updateResultJeux = $stmtJeux->execute();

        // Si la mise à jour de la table jeux échoue, vous pouvez gérer les erreurs ici
        if (!$updateResultJeux) {
            // Gérer l'erreur, journaliser, renvoyer un message, etc.
        }
    }

    return $updateResult;
}

?>
