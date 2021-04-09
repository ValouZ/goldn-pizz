"use strict";
document.addEventListener("DOMContentLoaded", function (event) {
  document
    .getElementById("app-add")
    .addEventListener("click", function (event) {
      event.preventDefault();
      ajax(1); // 1 -> on ajoute, -1 -> on enleve
    });
  document
    .getElementById("app-remove")
    .addEventListener("click", function (event) {
      event.preventDefault();
      ajax(-1); // 1 -> on ajoute, -1 -> on enleve
    });
});

function ajax(operation) {
  // console.dir(XMLHttpRequest);
  let fileTraitement = "traitement/config-ajax.php",
    xhr;

  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  // console.dir(xhr);

  let idPizza = window.location.search;
  let prixPizza = document.getElementById("app-price").textContent;

  idPizza = idPizza.replace("?id=", ""); // On supprime ?id= de la chaine de caractere avant notre id
  idPizza = parseInt(idPizza);

  prixPizza = prixPizza.replace(" €", "");
  prixPizza = parseFloat(prixPizza);

  let param =
    "idPizza=" + idPizza + "&prixPizza=" + prixPizza + "&operation=" + operation;

  xhr.open("POST", fileTraitement, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };

  xhr.send(param);

  // xhr.onload = function (){
  //     document.getElementById('resultat').innerHTML = this.responseText;
  // }
}
