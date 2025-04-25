<?php

require_once("../models/Bd_connexion.php");
function checkTypeJeuxExistence($connexion, $type_jeux) {
    $check_type_jeux_query = $connexion->prepare("SELECT id FROM type_jeux WHERE LOWER(type_jeux) = LOWER(:type_jeux)");
    $check_type_jeux_query->bindParam(':type_jeux', $type_jeux);
    $check_type_jeux_query->execute();
    return $check_type_jeux_query->fetch();
}

function insertTypeJeux($connexion, $type_jeux) {
    $insert_query = $connexion->prepare("INSERT INTO type_jeux (type_jeux) VALUES (:type_jeux)");
    $insert_query->bindParam(':type_jeux', $type_jeux);
    $insert_query->execute();
}

