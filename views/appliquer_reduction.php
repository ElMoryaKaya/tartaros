<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['code_reduction']) && !empty($_POST['code_reduction'])) {
        $code_reduction = $_POST['code_reduction'];

        // Vous devriez implémenter la logique pour appliquer le code de réduction
        // Ici, je vais simplement afficher un message
        echo "Code de réduction appliqué avec succès!";
    } else {
        echo "Veuillez entrer un code de réduction valide.";
    }
}

?>
