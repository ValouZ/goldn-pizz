"use strict";
let add = document.getElementsByClassName("app-add");
let remove = document.getElementsByClassName("app-remove");

document.addEventListener("DOMContentLoaded", function () {
  for (let i = 0; i < add.length; i++) {
    add[i].addEventListener("click", function (event) {
      event.preventDefault();
      ajax(this, 1); // 1 -> on ajoute
    });
  }

  for (let i = 0; i < remove.length; i++) {
    remove[i].addEventListener("click", function (event) {
      event.preventDefault();
      ajax(this, -1); // -1 -> on enleve
    });
  }
});

function ajax(button, operation) {
  let fileTraitement = "traitement/config-ajax.php",
    xhr;

  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

  let idPizza = button.parentElement.parentElement.children[1].children[0].id; // Recupere l'id dans le titre

  let prixPizza = 0;

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
