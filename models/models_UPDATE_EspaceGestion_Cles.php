<?php
    require_once('Bd_connexion.php');

    function getProduitById($connexion, $produit_id) {
        
        $requete = 'SELECT
            
            produit.id,
            produit.nom_produit,
            produit.photo,
            produit.type_produit,
            produit.date_sortie,
            produit.prix,
            produit.note,
            type_jeux.type_jeux,
            plateforme.nom_console,
            jeux.plateforme_ID AS id_plateforme,  -- Correction ici : Utilisez le nom de colonne correct de la table jeux
            jeux.type_jeux_ID AS id_type_jeux    -- Correction ici : Utilisez le nom de colonne correct de la table jeux

        FROM
            produit
        
        INNER JOIN jeux ON produit.id = jeux.id
        INNER JOIN plateforme ON jeux.plateforme_ID = plateforme.id
        INNER JOIN type_jeux ON jeux.type_jeux_ID = type_jeux.id
        
        WHERE produit.id = :produit_id;';

        $stmt = $connexion->prepare($requete);
        $stmt->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
        $stmt->execute();

        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultat;
    }
?>
