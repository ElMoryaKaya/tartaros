<?php
	session_start(); // Démarrez la session si ce n'est pas déjà fait

	// Détruisez toutes les données de la session
	session_unset();
	session_destroy();

	// Redirigez l'utilisateur vers la page de connexion ou la page d'accueil
	header("Location: ../views/index.php"); // Remplacez par la page souhaitée
?>
