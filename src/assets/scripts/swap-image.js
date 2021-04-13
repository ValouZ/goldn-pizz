let pizzaImages = document.getElementsByClassName("images")[0].children; // Tableau contenant les 3 images à afficher
let classCSS = "displayPizza"; // Class à ajouter à nos images
let swapImageInterval = 2000; // Temps entre le changement des images
let rotatePizza = 0; // Indice de la première image
let oldPizza = pizzaImages[pizzaImages.length - 1]; // Indice de la pizza précédemment affiché

pizzaImages[rotatePizza].classList.add(classCSS); // On ajoute la class d'affichage à la première image

setInterval(swapPizza, swapImageInterval);

function swapPizza() {
  if (rotatePizza >= pizzaImages.length) {
    rotatePizza = 0;
  }

  displayPizza(pizzaImages[rotatePizza]);
  rotatePizza++;
}

function displayPizza(pizza) {
  pizza.classList.add(classCSS);
  oldPizza.classList.remove(classCSS);
  oldPizza = pizza;
}
