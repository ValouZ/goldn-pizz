const searchBar = document.getElementById("app-search-bar"); // Barre de recherche
const pizzasElement = document.getElementsByClassName("pizza-name"); // Tableau des élements contenants le nom des pizzas
const cards = document.getElementsByClassName("card"); // Tableau des cartes de pizza

let pizzasValue = []; // Tableau des noms des pizzas
let pizzasElementLength = pizzasElement.length;
for (let i = 0; i < pizzasElementLength; i++) {
  pizzasValue.push(pizzasElement[i].textContent);
}

// On écoute les frappes dans la barre de recherche
searchBar.addEventListener("keyup", (e) => {
  let searchString = e.target.value.toLowerCase();
  // Permet d'obtenir un tableau de pizzas trié contenant uniquement celle correspondant au champ de saisie
  let filteredPizzas = pizzasValue.filter((pizza) => {
    return pizza.toLowerCase().includes(searchString);
  });

  // On affiche les bonne pizzas
  displayPizzas(filteredPizzas);
});

function displayPizzas(pizzas) {
  let cardsLength = cards.length;

  // Cache toutes les cartes de la page
  for (let i = 0; i < cardsLength; i++) {
    cards[i].classList.add("hide");
  }

  for (let i = 0; i < pizzasElementLength; i++) {
    for (let j = 0; j < pizzas.length; j++) {
      // Si les éléments des pizzas triés se retrouvent dans pizzasElement
      // On enlève la classe hide aux cartes en questions
      if (pizzasElement[i].textContent === pizzas[j]) {
        cards[i].classList.remove("hide");
      }
    }
  }
}
