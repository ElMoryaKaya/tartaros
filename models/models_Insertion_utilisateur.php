<?php
    require "../models/Bd_connexion.php";
    function verifierUnicitePseudo($connexion, $pseudo) {
        $check_pseudo_query = $connexion->prepare("SELECT COUNT(*) FROM utilisateur WHERE pseudo = :pseudo");
        $check_pseudo_query->bindParam(':pseudo', $pseudo);
        $check_pseudo_query->execute();
        return $check_pseudo_query->fetchColumn() > 0;
    }    

function verifierUniciteEmail($connexion, $email) {
   
    $check_email_query = $connexion->prepare("SELECT id FROM utilisateur WHERE email = :email");
    $check_email_query->bindParam(':email', $email);
    $check_email_query->execute();
    return $check_email_query->fetch();
}

function determinerStatut($connexion) {
   
    $count_users_query = $connexion->query("SELECT COUNT(*) FROM utilisateur")->fetchColumn();
    return ($count_users_query == 0) ? "administrateur" : "utilisateur";
}

function insererUtilisateur($connexion, $pseudo, $email, $mot_de_passe, $statut) {
    
    $insert_query = $connexion->prepare("INSERT INTO utilisateur (pseudo, email, mot_de_passe, statut) VALUES (:pseudo, :email, :mot_de_passe, :statut)");
    $insert_query->bindParam(':pseudo', $pseudo);
    $insert_query->bindParam(':email', $email);
    $insert_query->bindParam(':mot_de_passe', $mot_de_passe);
    $insert_query->bindParam(':statut', $statut);
    $insert_query->execute();
}


