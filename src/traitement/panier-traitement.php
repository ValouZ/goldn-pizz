<?php
session_start();
include_once('pdo.php');
include_once('functions.php');

access_denied();

if (isset($_POST['order'])) {
  $req_pizza = $bdd->prepare('DELETE FROM panier WHERE id_client = ?');
  $req_pizza->execute(array($_SESSION['id']));
  header('location: ../ordered.php');
  exit();
} else {
  header('location: ../basket.php?error=0');
  exit();
}
