"use strict";
document.addEventListener("DOMContentLoaded", function (event) {
  document
    .getElementById("app-add")
    .addEventListener("click", function (event) {
      event.preventDefault();
      ajax(1); // 1 -> on ajoute
    });
  document
    .getElementById("app-remove")
    .addEventListener("click", function (event) {
      event.preventDefault();
      ajax(-1); // -1 -> on enleve
    });
});

function ajax(operation) {

  let fileTraitement = "traitement/config-ajax.php",
    xhr;

  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

  let idPizza = window.location.search;
  idPizza = idPizza.replace("?id=", ""); // On supprime ?id= de la chaine de caractere avant notre id
  idPizza = parseInt(idPizza);

  let prixPizza = document.getElementById("app-price").textContent;
  prixPizza = prixPizza.replace(" €", "");
  prixPizza = parseFloat(prixPizza);

  let param =
    "idPizza=" +
    idPizza +
    "&prixPizza=" +
    prixPizza +
    "&operation=" +
    operation;

  xhr.open("POST", fileTraitement, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.send(param);
}
