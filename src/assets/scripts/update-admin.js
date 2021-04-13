let updateButton = document.getElementsByClassName("button__update");
let updateButtonLength = updateButton.length;

for (let i = 0; i < updateButtonLength; i++) {
  updateButton[i].addEventListener("click", function (e) {
    e.preventDefault();
    updateAdmin(this);
  });
}

function updateAdmin(button) {
  let line = button.parentNode.parentNode;
  let nomPizza = line.children[1].children[0];
  let prixPizza = line.children[2].children[0];
  let descriPizza = line.children[3].children[0];
  let validateButton = line.children[5].children[0];

  disableUpdate();
  console.log(validateButton);
  // console.log(nomPizza);

  prixPizza.disabled = false;
  nomPizza.disabled = false;

  validateButton.classList.remove("hide");
}

function disableUpdate() {
  for (let i = 0; i < updateButtonLength; i++) {
    updateButton[i].disabled = true;
  }
}
