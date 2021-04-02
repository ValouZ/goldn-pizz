<?php

include('pdo.php');

session_start();


if (isset($_POST['formconnexion'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);

  if (!empty($pseudo) and !empty($password)) {
    $req = $bdd->prepare('SELECT * FROM client WHERE (pseudo_client = ? or email_client =?)');
    $req->execute(array($pseudo, $pseudo));
    $clientExist = $req->rowCount();
    if ($clientExist == 1) {
      $infoClient = $req->fetch();
      $passwordUser = $infoClient['mdp_client'];
      if (password_verify($password, $passwordUser)) {
        $_SESSION['id'] = $infoClient['id_client'];
        $_SESSION['pseudo'] = $infoClient['pseudo_client'];
        $_SESSION['password'] = $infoClient['mdp_client'];
        header('location:../profile.php');
        exit();
      } else {
        header('location:../sign-in.php?error=0'); // mauvais mdp
        exit();
      }
    } else {
      header('location:../sign-in.php?error=0'); // pas de compte
      exit();
    }
  } else {
    header('location:../sign-in.php?error=1'); // champs vide
    exit();
  }
} else {
  header('location:../sign-in.php?error=2'); // tentative de connexion sans passer par la page sign-in
  exit();
}