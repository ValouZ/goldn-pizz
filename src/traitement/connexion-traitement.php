<?php

include('pdo.php');

var_dump($_POST);

if (isset($_POST['formconnexion'])){
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);

  echo $pseudo;
  echo $password;
}