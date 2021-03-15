var pizzaSizeButtons = document.getElementById("app-pizza-size").children;

for (let i = 0; i < pizzaSizeButtons.length; i++) {
  pizzaSizeButtons[i].addEventListener("click", chooseSize);
}

function chooseSize() {
  for (let i = 0; i < pizzaSizeButtons.length; i++) {
    pizzaSizeButtons[i].classList.remove("active");
  }
  this.classList.add("active");
}
