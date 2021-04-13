<?php

session_start();
include('pdo.php');

var_dump($_POST);

if (isset($_POST['validate'])) {

  var_dump($_POST);
  
  $nomPizza = htmlspecialchars($_POST['nom-pizza']);
  $prixPizza = htmlspecialchars($_POST['prix-pizza']);
  $idPizza = htmlspecialchars($_POST['id-pizza']);
  
  // var_dump($idPizza);

  if (!empty($_POST['nom-pizza']) or !empty($_POST['prix-pizza'])) {
    if (filter_var($prixPizza, FILTER_VALIDATE_FLOAT)) {
      $req = $bdd->prepare('UPDATE pizza SET nom_pizza = ?, prix_pizza = ? WHERE id_pizza = ?');
      $req->execute(array($nomPizza, $prixPizza, $idPizza));
      header('location:../admin.php');
      exit();
    }
  }
} else {
  // header('location:../admin.php?error=0');
}
