<?php

session_start();
include('pdo.php');

var_dump($_POST);

if (isset($_POST['validate'])) {
  
  $nomPizza = htmlspecialchars($_POST['nom-pizza']);
  $prixPizza = htmlspecialchars($_POST['prix-pizza']);
  $idPizza = htmlspecialchars($_POST['id-pizza']);
  $descriPizza = htmlspecialchars($_POST['descri-pizza']);
  var_dump($descriPizza);

  if (!empty($_POST['nom-pizza']) AND !empty($_POST['prix-pizza']) AND !empty($_POST['descri-pizza'])) {
    if (filter_var($prixPizza, FILTER_VALIDATE_FLOAT)) {
      $req = $bdd->prepare('UPDATE pizza SET nom_pizza = ?, prix_pizza = ?, description_pizza = ? WHERE id_pizza = ?');
      $req->execute(array($nomPizza, $prixPizza,$descriPizza, $idPizza));
      header('location:../admin.php');
      exit();
    }
  }
} else {
  // header('location:../admin.php?error=0');
}
