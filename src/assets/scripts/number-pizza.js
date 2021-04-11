let removeButton = document.getElementById("app-remove");
let addButton = document.getElementById("app-add");
let quantity = document.getElementById("app-quantity");

let counter = parseInt(quantity.textContent);

addButton.addEventListener("click", () => changeQuantity(1));
removeButton.addEventListener("click", () => changeQuantity(-1));

function changeQuantity(value) {
  counter += value;
  quantity.textContent = counter < 0 ? 0 : counter;
}
