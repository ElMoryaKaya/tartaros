<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../style/styleInscription.css">
      <title>Votre Site de Vente</title>
  </head>
  <body>
  <?php include("../views/butonRetour.php") ?>
    <main>
        <section class="presentation">
            <div class="product">
                <div class="dd">
                  <div class="gg">
                      <p>TARTAROS</p>
                  </div>
                      <p>Bienvenue</p>
                     <!-- <p>Connexion ou création de compte en 1 minute</p> -->
                </div>
                    <form class="ff" action="../controllers/controllers_insertion_utilisateur.php" method="POST">
                        <label for="pseudo">Pseudo:</label>
                        <input type="text" id="pseudo" name="pseudo" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="mot_de_passe">Mot de passe:</label>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

                        <label for="confirmer_mot_de_passe">Confirmer le mot de passe:</label>
                        <input type="password" id="confirmer_mot_de_passe" name="confirmer_mot_de_passe" required>

                        <button type="submit">S'inscrire</button>
                    </form>

                <!-- <div class="hh">
                  <h1>Marvel spiderman 2</h1>
                  <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum
                      odio eos beatae labore possimus. Pariatur ipsa, tempore optio
                      placeat expedita minus cupiditate nulla iure quis error. A vitae
                      quibusdam ipsum dolor sit amet consectetur adipisicing elit.
                  </p>
              </div> -->
              <div class="image-presentation">
                  <img src="" />
              </div>
            </div>
        </section>
    </main>
  </body>
  <footer>

  </footer>
</html>
