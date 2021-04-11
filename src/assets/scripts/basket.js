let removeButtons = document.getElementsByClassName("app-remove");
let addButtons = document.getElementsByClassName("app-add");

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

function changeQuantity(value, button) {
  let quantity = button.parentNode.children[1]; // Section d'affichage du nombre de pizza
  let counter = parseInt(quantity.textContent); // Le nombre de pizza
  let card = button.parentNode.parentNode; // La carte de chaque pizza
  let price = button.parentNode.parentNode.children[1].children[2]; // Section d'affichage du prix
  let priceContent = parseFloat(price.textContent); // Le prix
  let priceOnePizza = priceContent / counter; // Prix d'une pizza unique

  counter += value;

  if (counter === 0) {
    // Si une pizza à une quantité nulle
    card.classList.add("remove-card"); // On cache sa carte
    price.innerHTML = 0; // On met le prix à 0 pour s'assurer que l'affichage du total fonctionne correctement !
    emptyBasket(); // On affiche 'panier vide' si il l'est
  } else {
    // Sinon on change la valeur
    quantity.textContent = counter; // On modifie l'affichage de la quantité
    price.innerHTML = priceDisplay(priceOnePizza * counter); // On modifie l'affichage du prix
  }
  updateBill();
}

function updateBill() {
  let priceReview = document.getElementsByClassName("price-review__item");
  let productReview = priceReview[0].children[1];
  let totalReview = priceReview[3].children[1];
  let cards = document.getElementsByClassName("basket-card");
  let productPrice = 0;
  let totalPrice = 0;
  for (let i = 0; i < cards.length; i++) {
    productPrice += parseFloat(cards[i].children[1].children[2].textContent);
  }
  productReview.innerHTML = priceDisplay(productPrice);

  for (let i = 0; i < priceReview.length - 1; i++) {
    totalPrice += parseFloat(priceReview[i].children[1].textContent);
  }
  totalReview.innerHTML = priceDisplay(totalPrice);
}

function emptyBasket() {
  let basket = document.getElementsByClassName("basket")[0];
  let content = document.getElementsByClassName("basket-content")[0];
  let cards = document.getElementsByClassName("basket-card");
  let hideAll = true; // True signifie qu'on va cacher tout le contenu pour dire que le panier est vide

  for (let i = 0; i < cards.length; i++) {
    if (cards[i].classList.length !== 2) {
      // Si ne serait ce qu'une des cartes à moins de classe que les autres,
      // alors il reste des pizza dans la commande
      // et on peut changer l'état de hideAll à false
      hideAll = false;
    }
  }

  if (hideAll) {
    // On cache le contenu et affiche un nouveau (contenu dans la page basket -> CACA mais 'fonctionne')
    content.classList.add("remove-card");
    basket.innerHTML +=
      "<section class='basket__empty'> <h3>Votre panier est actuellement vide</h3><p>Passe vite commande avant que ton ventre ne se creuse trop</p><img src='assets/favicon/pizza.svg' alt='Pizza'></section>";
  }
}

function priceDisplay(p) {
  return p + "<span> € </span>";
}
