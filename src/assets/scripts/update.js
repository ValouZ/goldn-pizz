let updateButtons = document.getElementsByClassName("update-input__button");
let sectionUpdate = document.getElementsByClassName("app-update");
let validateButton = document.getElementById("app-validate");
let hiddenPasswords = document.getElementsByClassName("hidden-password");
let oldPassword = document.getElementById("app-old-password");

// Event listeners
for (let i = 0; i < updateButtons.length; i++) {
  updateButtons[i].addEventListener("click", (e) => edit(e));
}

function edit(e) {
  e.preventDefault();
  // Débloque les input et cache les boutons d'editions
  for (let i = 0; i < sectionUpdate.length; i++) {
    sectionUpdate[i].childNodes[1].disabled = false;
    updateButtons[i].hidden = true;
  }
  // Affiche le bouton de confirmation
  validateButton.classList.remove("hide");
  oldPassword.childNodes[1].value = ""; // Supprimer le contenu de l'input
  // oldPassword.childNodes[1].placeholder = "";
  oldPassword.childNodes[5].textContent = "Ancien mot de passe"; // Changer le texte du label
  newPassword();
}

function newPassword() {
  // Les élements sont enlevé à chaque tour de l'objet hiddenPasswords,
  // c'est pourquoi on boucle sur le premier élément à chaque fois
  while (hiddenPasswords[0]) {
    hiddenPasswords[0].classList.remove("hidden-password");
  }
}
