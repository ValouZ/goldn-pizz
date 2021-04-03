let updateButtons = document.getElementsByClassName("update-input__button");
let sectionUpdate = document.getElementsByClassName("app-update");
let validateButton = document.getElementById("app-validate");
let hiddenPasswords = document.getElementsByClassName("hidden-password");

// Event listeners
for (let i = 0; i < updateButtons.length; i++) {
  updateButtons[i].addEventListener("click", (e) => edit(e));
}

newPassword();

function edit(e) {
  e.preventDefault();
  // Débloque les input et cache les boutons d'editions
  for (let i = 0; i < sectionUpdate.length; i++) {
    sectionUpdate[i].childNodes[1].disabled = false;
    updateButtons[i].hidden = true;
  }
  // Affiche le bouton de confirmation
  validateButton.classList.remove("hide");
  
}

function newPassword() {
  console.log(hiddenPasswords[0].classList);
  console.log(hiddenPasswords[1].classList);
  for (let i = 0; i < hiddenPasswords.length; i++) {
    hiddenPasswords[i].classList.remove("hidden-password");
  }

  console.dir(hiddenPasswords);
}
