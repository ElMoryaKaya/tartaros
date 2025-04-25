document.addEventListener('DOMContentLoaded', function () {
    // Charge la liste complète des produits au chargement de la page
    rechercherProduits('');

    document.getElementById('search').addEventListener('input', function () {
        let recherche = this.value;

        // Effectuer une requête AJAX pour obtenir les produits correspondant à la recherche
        rechercherProduits(recherche);
    });
});

function rechercherProduits(recherche) {
    // Effectuer une requête AJAX pour obtenir les produits correspondant à la recherche
    let cherche = new XMLHttpRequest();
    cherche.onreadystatechange = function () {
        if (cherche.readyState == 4 && cherche.status == 200) {
            let produits = JSON.parse(cherche.responseText);
            afficherProduits(produits);
        }
    };
    cherche.open('GET', '../controllers/controller_extension.php?recherche=' + recherche, true);
    cherche.send();

    let rechercherDiv = document.querySelector('.rechercher');
}

function afficherProduits(produits) {
    let resultatContainer = document.getElementById('resultats');
    resultatContainer.innerHTML = '';

    if (produits.length > 0) {
        // Affichage des produits dans une liste
        let ul = document.createElement('ul');
        produits.forEach(function (produit) {
            let li = document.createElement('li');

            // Création de l'image
            let detailsContainer = document.createElement('div');
detailsContainer.classList.add('product-containers');

let productsContainer = document.createElement('div');
productsContainer.classList.add('products');

let productDetailsContainer = document.createElement('div');
productDetailsContainer.classList.add('product-detailss');

let productDetails = document.createElement('div');
productDetails.classList.add('product_details');

let centreNom = document.createElement('div');
centreNom.classList.add('centre_nom');

let h1 = document.createElement('h1');
h1.innerText = produit.nom_produit;

centreNom.appendChild(h1);
productDetails.appendChild(centreNom);

let img = document.createElement('img');
img.src = produit.photo;
img.alt = "Photo du produit";
img.classList.add('product-image');
productDetails.appendChild(img);

let productDetailsGras = document.createElement('div');
productDetailsGras.classList.add('productDetails_gras');
productDetailsGras.innerHTML = `
    <p><strong>Type de produit :</strong> ${produit.type_produit}</p>
    <p><strong>Date de sortie :</strong> ${produit.date_sortie}</p>
    <p><strong>Prix :</strong> ${produit.prix}€</p>
    <p><strong>Note :</strong> ${produit.note}</p>
`;

productDetails.appendChild(productDetailsGras);

let productActions = document.createElement('div');
productActions.classList.add('product-actionss');

let addToCartLink = document.createElement('a');
addToCartLink.href = "ajouter_panier.php?id=" + produit.id + "&nom=" + produit.nom_produit + "&prix=" + produit.prix;
addToCartLink.innerText = "Ajouter au panier";

let buyNowLink = document.createElement('a');
buyNowLink.href = "../controllers/controllers_acheterController.php?id=" + produit.id;
buyNowLink.innerText = "Acheter maintenant";

productActions.appendChild(addToCartLink);
productActions.appendChild(buyNowLink);

productDetailsContainer.appendChild(productDetails);
productDetailsContainer.appendChild(productActions);
productsContainer.appendChild(productDetailsContainer);
detailsContainer.appendChild(productsContainer);
li.appendChild(detailsContainer);

ul.appendChild(li);



        });
        resultatContainer.appendChild(ul);
    } else {
        resultatContainer.textContent = "Aucun produit trouvé avec l'extension spécifié.";
    }
}
