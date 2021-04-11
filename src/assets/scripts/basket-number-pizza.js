let removeButton = document.getElementsByClassName("app-remove");
let addButton = document.getElementsByClassName("app-add");
let quantityTest = document.getElementsByClassName("app-quantity")[0];

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
  let card = button.parentNode.parentNode;
  let counter = parseInt(quantity.textContent);

  counter += value;

  if (counter === 0) {
    card.classList.add('remove-card');
  } else {
    quantity.textContent = counter;
  }
}
