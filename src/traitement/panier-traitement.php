<?php
session_start();
include_once('pdo.php');
include_once('functions.php');

access_denied();

if (isset($_POST['order'])) {

  // Suppression de tous les élements du panier a l'id client voulu
  $req_pizza = $bdd->prepare('DELETE FROM panier WHERE id_client = ?');
  $req_pizza->execute(array($_SESSION['id']));
  // $header = "From: valentin.debray@gmail.com";
  // $r = mail('debray.va@gmail.com', 'TEST', 'essai',$header);
  // var_dump($r);
  header('location: ../ordered.php');
  exit();
} else {
  header('location: ../basket.php?error=0'); // Redirection vers la page panier si le panier a été validé sans passer par le bouton
  exit();
}
