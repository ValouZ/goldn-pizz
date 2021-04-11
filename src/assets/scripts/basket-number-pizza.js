let removeButton = document.getElementsByClassName("app-remove");
let addButton = document.getElementsByClassName("app-add");

for (let i = 0; i < addButton.length; i++) {
  addButton[i].addEventListener("click", function (e) {
    e.preventDefault();
    changeQuantity(1, this);
  });
  removeButton[i].addEventListener("click", function (e) {
    e.preventDefault();
    changeQuantity(-1, this);
  });
}

function changeQuantity(value, button) {
  let quantity = button.parentNode.children[1];
  let counter = parseInt(quantity.textContent);

  counter += value;
  quantity.textContent = counter < 0 ? 0 : counter;
}
