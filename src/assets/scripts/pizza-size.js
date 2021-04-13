let pizzaSizeButtons = document.getElementById("app-pizza-size").children;
let price = document.getElementById("app-price");


for (let i = 0; i < pizzaSizeButtons.length; i++) {
  pizzaSizeButtons[i].addEventListener("click", chooseSize);
}

function chooseSize() {
  for (let i = 0; i < pizzaSizeButtons.length; i++) {
    pizzaSizeButtons[i].classList.remove("active");
  }
  this.classList.add("active");
}
