let updateButtons = document.getElementsByClassName("update-input__button");
let sectionUpdate = document.getElementsByClassName("update-input");
let validateButton = document.getElementById("app-validate");

// Event listeners
for (let i = 0; i < updateButtons.length; i++) {
  updateButtons[i].addEventListener("click", (e) => edit(e));
}

function edit(e) {
  e.preventDefault();
  for (let i = 0; i < sectionUpdate.length; i++) {
    sectionUpdate[i].childNodes[1].disabled = false;
    updateButtons[i].hidden = true;
  }
}
