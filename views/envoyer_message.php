<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'envoi de message</title>
</head>
<body>

<h2>Envoyer un message</h2>

<form action="nom_du_script_php.php" method="post">
    <label for="texte">Message :</label><br>
    <textarea id="texte" name="texte" rows="4" cols="50"></textarea><br><br>

    <label for="utilisateur_ID">Identifiant de l'utilisateur :</label><br>
    <input type="text" id="utilisateur_ID" name="utilisateur_ID"><br><br>

    <input type="submit" value="Envoyer">
</form>

</body>
</html>
