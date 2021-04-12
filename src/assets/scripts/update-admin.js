let updateButton = document.getElementsByClassName("button__update");
let validateButton = document.getElementById("validate");
console.log(validateButton);

for (let i = 0; i < updateButton.length; i++) {
  updateButton[i].addEventListener("click", function (e) {
    e.preventDefault();
    updateAdmin(this);
  });

  
}


function updateAdmin(button){

  let line = button.parentNode.parentNode;
  let prixPizza = line.children[1].children[0];
  let nomPizza = line.children[0].children[0];

  prixPizza.disabled = false;
  nomPizza.disabled = false;

  

  validateButton.classList.remove("hide");
}