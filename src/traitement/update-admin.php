<?php

session_start();
include('pdo.php');

if (isset($_POST['validate'])) {

  $idPizza = htmlspecialchars($_POST['id-pizza']);
  $nomPizza = htmlspecialchars($_POST['nom-pizza']);
  $prixPizza = htmlspecialchars($_POST['prix-pizza']);
  

  if (!empty($_POST['nom-pizza']) or !empty($_POST['prix-pizza'])) {
    if (filter_var($prixPizza, FILTER_VALIDATE_FLOAT)) {
      $req = $bdd->prepare('UPDATE pizza SET nom_pizza = ?, prix_pizza = ? WHERE id_pizza = ?');
      $req->execute(array($nomPizza, $prixPizza, $idPizza));
      header('location:../admin.php');
      exit();
    }
  }
} else {
  header('location:../admin.php?error=0');
}
