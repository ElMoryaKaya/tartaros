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