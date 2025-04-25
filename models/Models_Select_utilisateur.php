<?php
    include_once "../models/Bd_connexion.php";
        function obtenirUtilisateurParPseudo($connexion, $pseudo) {
            $select_query = $connexion->prepare("SELECT id, pseudo, mot_de_passe, statut FROM utilisateur WHERE actif = 1 AND deleted_at IS NULL AND pseudo = :pseudo");
            $select_query->bindParam(':pseudo', $pseudo);
            $select_query->execute();
            return $select_query->fetch();
        }
    
