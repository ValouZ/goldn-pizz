let pizzaSizeButtons = document.getElementById("app-pizza-size").children;
let price = document.getElementById("app-price");

let tabPrice = ["12.00", "13.80", "14.90"];

for (let i = 0; i < pizzaSizeButtons.length; i++) {
  pizzaSizeButtons[i].addEventListener("click", chooseSize);
}

function chooseSize() {
  for (let i = 0; i < pizzaSizeButtons.length; i++) {
    pizzaSizeButtons[i].classList.remove("active");
  }
  this.classList.add("active");
  changePrice(this.textContent);
}

function changePrice(value) {
  if (value == "S") {
    price.innerHTML = tabPrice[0] + "<span> € </span>";
  } else if (value == "M") {
    price.innerHTML = tabPrice[1] + "<span> € </span>";
  } else {
    price.innerHTML = tabPrice[2] + "<span> € </span>";
  }
}
