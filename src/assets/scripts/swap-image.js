let pizzaImages = document.getElementsByClassName("images")[0].children;
let classCSS = "displayPizza";
let swapImageInterval = 2000;
let rotatePizza = 0;
let oldPizza = pizzaImages[pizzaImages.length - 1];

pizzaImages[rotatePizza].classList.add(classCSS);

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
