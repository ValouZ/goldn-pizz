let removeButtons = document.getElementsByClassName("app-remove"); // Tableau de tous les boutons '-' de la page
let addButtons = document.getElementsByClassName("app-add"); // Tableau de tous les boutons '+' de la page

for (let i = 0; i < addButtons.length; i++) {
  addButtons[i].addEventListener("click", function (e) {
    e.preventDefault();
    changeQuantity(1, this);
  });
  removeButtons[i].addEventListener("click", function (e) {
    e.preventDefault();
    changeQuantity(-1, this);
  });
}

// La fonction change la quantité de pizza à commander
// value -> valeur à additionner à notre nombre de pizza de base
// button -> le bouton cliqué
function changeQuantity(value, button) {
  let quantity = button.parentNode.children[1]; // Section d'affichage du nombre de pizza
  let counter = parseInt(quantity.textContent); // Le nombre de pizza
  let card = button.parentNode.parentNode; // La carte de chaque pizza
  let price = button.parentNode.parentNode.children[1].children[2]; // Section d'affichage du prix
  let priceContent = parseFloat(price.textContent); // Le prix
  let priceOnePizza = priceContent / counter; // Prix d'une pizza unique
  priceOnePizza = priceOnePizza.toFixed(2); // Arrondi à deux chiffres apres la virgule

  counter += value; // Le nouveau nombre de pizza à commander
  quantity.textContent = counter; // On modifie l'affichage de la quantité
  let priceValue = priceOnePizza * counter;
  priceValue = priceValue.toFixed(2);
  price.innerHTML = priceDisplay(priceValue); // On modifie l'affichage du prix

  if (counter === 0) {
    // Si une pizza à une quantité nulle
    card.classList.add("remove-card"); // On cache sa carte
    price.innerHTML = 0; // On met le prix à 0 pour s'assurer que l'affichage du total fonctionne correctement !
    emptyBasket(); // On affiche 'panier vide' si il l'est
  }

  updateBill(); // On met à jour la facture
}

// La fonction sert à actualiser la section des totaux
function updateBill() {
  let priceReview = document.getElementsByClassName("price-review__item"); // Tableau contenant les 4 éléments récap des prix
  let productReview = priceReview[0].children[1]; // Element contenant le Total des produits
  let totalReview = priceReview[3].children[1]; // Element contenant le total des totaux
  let cards = document.getElementsByClassName("basket-card"); // tableau de toutes les cartes affichés sur la page
  let productPrice = 0; // total des produits
  let totalPrice = 0; // total des totaux
  let cardsLength = cards.length;
  let priceReviewLength = priceReview.length;

  for (let i = 0; i < cardsLength; i++) {
    // On fait la somme des prix contenu dans chacune des cartes de la page
    productPrice += parseFloat(cards[i].children[1].children[2].textContent);
  }
  productPrice = productPrice.toFixed(2); // Arrondi à deux chiffres apres la virgule

  // On affiche ce nouveau prix calculé
  productReview.innerHTML = priceDisplay(productPrice);

  for (let i = 0; i < priceReviewLength - 1; i++) {
    // On fait la somme des prix contenu dans chacune des lignes du récap des prix
    totalPrice += parseFloat(priceReview[i].children[1].textContent);
  }
  totalPrice = totalPrice.toFixed(2); // Arrondi à deux chiffres apres la virgule

  // On affiche ce nouveau total calculé
  totalReview.innerHTML = priceDisplay(totalPrice);
}

// Fonction vérifiant si le panier est vide
function emptyBasket() {
  let basket = document.getElementsByClassName("basket")[0]; // Section contenant tout le panier
  let content = document.getElementsByClassName("basket-content")[0]; // Section contenant tout le contenu du panier
  let cards = document.getElementsByClassName("basket-card"); // tableau de toutes les cartes du panier
  let hideAll = true; // True signifie qu'on va cacher tout le contenu pour dire que le panier est vide
  let cardsLength = cards.length;

  for (let i = 0; i < cardsLength; i++) {
    if (cards[i].classList.length !== 2) {
      // Si ne serait ce qu'une des cartes à moins de classe que les autres, ( ne contient pas la class 'remove-card')
      // alors il reste des pizza dans la commande
      // et on peut changer l'état de hideAll à false
      hideAll = false;
    }
  }

  if (hideAll) {
    // On cache le contenu et affiche un nouveau (contenu dans la page basket -> CACA mais fonctionne)
    content.classList.add("remove-card");
    basket.innerHTML +=
      "<section class='basket__empty'> <h3>Votre panier est actuellement vide</h3><p>Passe vite commande avant que ton ventre ne se creuse trop</p><img src='assets/favicon/pizza.svg' alt='Pizza'></section>";
  }
}

// Fonction affichant le bon format d'un prix
function priceDisplay(p) {
  return p + "<span> € </span>";
}
