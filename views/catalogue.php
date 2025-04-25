<?php
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
   
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../Style/jeu_de_la_categorie.css">
  <link rel="stylesheet" type="text/css" href="../Style/style.css">
  <title>Tartaros</title>
</head>

<body>

  <header>
    <?php include("menu_principal.php"); ?>
  </header>
<br>
<br>
<br>
<br>
  <main>
  <center>
    <section class="cards">
      <article class="card">
        <div class="slideshow">
          <img src="https://i.pinimg.com/originals/0d/08/5a/0d085a7bea4c7e48ae074fc0dd40246c.gif" alt="Description de l'image 2">
          <img src="https://i.pinimg.com/originals/bf/5c/7c/bf5c7cddcd11fed8bdc73a72b283987a.gif" alt="Description de l'image 2">
          <img src="https://i.pinimg.com/originals/3c/a0/9b/3ca09b0abc62a02ce9084a68adc5e03f.gif" alt="Description de l'image 3">
        </div>
        <h3>action</h3>
        <form method="post" action="view_action.php">
        <input type="hidden" name="category" value="action">
        <div class="actions">
          <button type="submit" class="continue-btn">Action games</button>
        </div>
      </form>
      </article>
      

      <article class="card">
        <div class="slideshow">
          <img src="https://i.pinimg.com/originals/b3/84/cc/b384cc983dcb04834f0746ed94e00960.gif" alt="random image from picsum">
          <img src="https://i.pinimg.com/originals/1e/db/dd/1edbdd65845b6adfcbfcafd01cf1100c.gif" alt="Description de l'image 2">
        </div>
        <h3>RPG</h3>
        <form method="post" action="view_rpg.php">
        <input type="hidden" name="category" value="RPG">
        <div class="actions">
          <button type="submit" class="continue-btn">RPG</button>
        </div>
      </form>
      </article>

      <article class="card">
        <div class="slideshow">
	<img src="https://i.pinimg.com/originals/a2/07/51/a207518cf0ddc95c7bff77fcd2b8c347.gif" alt="random image from picsum">
   	 <img src="https://i.pinimg.com/originals/ee/b5/ec/eeb5ec3c0112c4f2d032c716a60064c7.gif" alt="Description de l'image 2">
   	 <img src="https://i.pinimg.com/originals/65/ed/05/65ed05f75271b64ef8273985cf5dfc9e.gif" alt="Description de l'image 3">         
        </div>
        <h3>simulation</h3>
        <form method="post" action="view_simulation.php">
        <input type="hidden" name="category" value="simulation">
        <div class="actions">
          <button type="submit" class="continue-btn">simulation games</button>
        </div>
      </form>
      </article>

      <article class="card">
        <div class="slideshow">
          <img src="https://i.pinimg.com/originals/fb/38/10/fb3810ac923d30f36ef7470ef43668cb.gif" alt="random image from picsum">
    <img src="https://i.pinimg.com/originals/52/d5/3d/52d53d69745a16bf259776d440e76e29.gif" alt="Description de l'image 2">
        </div>
        <h3>strategy</h3>
        <form method="post" action="view_strategy.php">
        <input type="hidden" name="category" value="Strategy">
        <div class="actions">
          <button type="submit" class="continue-btn">Strategy games</button>
        </div>
      </form>
      </article>

      <article class="card">
        <div class="slideshow">
          <img src="https://i.pinimg.com/originals/ca/55/12/ca5512c28749520388bbb744492685e4.gif" alt="random image from picsum">
    <img src="https://i.pinimg.com/originals/a3/7d/4d/a37d4de6746129e632a9dc418fba8085.gif" alt="Description de l'image 2">
    <img src="https://i.pinimg.com/originals/0b/90/5f/0b905f25cbab434ee3d229e189c50eb5.gif" alt="Description de l'image 3">
    <img src="https://i.pinimg.com/originals/c1/62/d8/c162d8ad04bb81c69983aa4989c7669e.gif" alt="Description de l'image 4">
    <img src="https://i.pinimg.com/originals/8a/6f/cd/8a6fcd3b6f651fdc3945694be76fdc75.gif" alt="Description de l'image 5">
        </div>
        <h3>sport</h3>
        <form method="post" action="view_sport.php">
        <input type="hidden" name="category" value="Sports">
        <div class="actions">
          <button type="submit" class="continue-btn">Sports games</button>
        </div>
      </form>
      </article>

      <article class="card">
        <div class="slideshow">
          <img src="https://i.pinimg.com/originals/a0/17/6c/a0176c79c05d7fff6ed1e5ab71284712.gif" alt="random image from picsum">
    	<img src="https://i.pinimg.com/originals/da/6f/35/da6f353375b579e44a009b1b3845aa1b.gif" alt="Description de l'image 2">
        </div>
        <h3>FPS</h3>
        <form method="post" action="view_evasion.php">
        <input type="hidden" name="category" value="FPS">
        <div class="actions">
          <button type="submit" class="continue-btn">FPS games</button>
        </div>
      </form>
      </article>

      <article class="card">
        <div class="slideshow">
          <img src="https://i.pinimg.com/originals/a9/4b/cd/a94bcd8fec885422d75e7e6828f3fc76.gif" alt="random image from picsum">
    	<img src="https://i.pinimg.com/originals/ac/c9/96/acc996a5a730c987f2591fcf5cb7b1e4.gif" alt="Description de l'image 2">
	<img src="https://i.pinimg.com/originals/b1/7c/7a/b17c7aba7551f02412063f18c3384f0a.gif" alt="Description de l'image 2">
        </div>
        <h3>adventure</h3>
        <form method="post" action="jeu_de_la_categorie.php">
        <input type="hidden" name="category" value="Adventure">
        <div class="actions">
          <button type="submit" class="continue-btn">Adventure games</button>
        </div>
      </form>
      </article>

      <article class="card">
        <div class="slideshow">
         <img src="../images/Checkers.png" alt="random image from picsum">
    	<img src="../images/LosAlamos.png" alt="random image from picsum">
	<img src="../images/MindRaceMaster.png" alt="random image from picsum">
	<img src="../images/Braintech.png" alt="random image from picsum">
	<img src="../images/Paper_float.png" alt="random image from picsum">
	<img src="../images/SABL.png" alt="random image from picsum">
        </div>
        <h3>Indie</h3>
        <form method="post" action="jeu_de_la_categorie.php">
        <input type="hidden" name="category" value="Indie">
        <div class="actions">
          <button type="submit" class="continue-btn">Indie Games</button>
        </div>
      </form>
      </article>

      <!-- Ajoutez d'autres articles ici -->

    </section>
  </center>
  </main>

  <footer>
    <?php include("Footer.php"); ?>
  </footer>

  <script>
    // Fonction pour mélanger les images aléatoirement
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const slideshows = document.querySelectorAll(".slideshow");

        slideshows.forEach(slideshow => {
            const images = Array.from(slideshow.getElementsByTagName("img"));

            // Mélangez les images aléatoirement
            shuffle(images);

            // Affichez la première image
            images[0].style.display = "block";

            let currentIndex = 0;

            // Changez l'image toutes les 5 secondes (ajustable selon vos besoins)
            setInterval(function () {
                images[currentIndex].style.display = "none";
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].style.display = "block";
            }, 5000);
        });

        // Ajoutez un gestionnaire d'événements à tous les boutons "Continue"
        const continueButtons = document.querySelectorAll(".continue-btn");
        continueButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Redirection vers jeu_de_la_categorie.php
                window.location.href = "jeu_de_la_categorie.php";
            });
        });
    });
  </script>

</body>

</html>
