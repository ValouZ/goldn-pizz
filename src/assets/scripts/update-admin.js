// On récupère le bouton update
let updateButton = document.getElementsByClassName("button__update");
// Création d'une variable pour la longueur du bouton updatebutton
let updateButtonLength = updateButton.length;
let deleteButtons = document.getElementsByClassName("app-delete");
deleteButtonsLength = deleteButtons.length;

// Boucle qui permet d'ajouter des eventListener sur les boutons
for (let i = 0; i < updateButtonLength; i++) {
  updateButton[i].addEventListener("click", function (e) {
    e.preventDefault();
    updateAdmin(this);
  });
}

for (let i = 0; i < deleteButtonsLength; i++) {
  deleteButtons[i].addEventListener("click", function (e) {
    e.preventDefault();
    confirmDelete(this);
  });
}

// Fonction pour mettre a jour chaque element de notre tableau admin
function updateAdmin(button) {
  // Variable pour stocker une ligne de tableau
  let line = button.parentNode.parentNode;
  // On récupère l'élément exact du nomPizza
  let nomPizza = line.children[1].children[0];
  // On récupère l'élément exact du prixPizza
  let prixPizza = line.children[2].children[0];
  // On récupère l'élément exact de descriPizza
  let descriPizza = line.children[3].children[0];
  // On récupère l'élément exact du button valider
  let validateButton = line.children[5].children[0];

  disableUpdate();

  // On débloque tout les inputs de la ligne
  prixPizza.disabled = false;
  nomPizza.disabled = false;
  descriPizza.disabled = false;

  // On affiche le bouton de validation
  validateButton.classList.remove("hide");
}

// Fonction permettant de désactiver tout les boutons de modifications
function disableUpdate() {
  for (let i = 0; i < updateButtonLength; i++) {
    updateButton[i].disabled = true;
  }
}

function confirmDelete(button) {
  if (confirm("Êtes vous sur de vouloir supprimer cette ligne ?")) {
    document.location.href = button.href;
  }
}
