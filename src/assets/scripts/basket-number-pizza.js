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
  let quantity = button.parentNode.children[1];
  let card = button.parentNode.parentNode;
  let counter = parseInt(quantity.textContent);

  counter += value;

  if (counter === 0) {
    // Si une pizza à une quantité nulle
    card.classList.add("remove-card");
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
  } else {
    // Sinon on change la valeur
    quantity.textContent = counter;
  }
}
