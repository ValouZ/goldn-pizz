<?php
session_start();
include_once('pdo.php');

if (isset($_POST['formconnexion'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);

  if (!empty($pseudo) and !empty($password)) {

    // On sélectionne les lignes de la table client qui correspondent au pseudo de notre client
    $req = $bdd->prepare('SELECT * FROM client WHERE pseudo_client = ?');
    $req->execute(array($pseudo));
    $clientExist = $req->rowCount(); // On compte le nombre de ligne (retourne 0 ou 1)
    if ($clientExist == 1) {
      // Si le client existe 
      $infoClient = $req->fetch();
      $passwordUser = $infoClient['mdp_client'];
      $getRole = $infoClient['role_client'];
      if (password_verify($password, $passwordUser)) {
        if ($getRole == 1) {
          // Admin
          $_SESSION['id'] = $infoClient['id_client'];
          $_SESSION['pseudo'] = $infoClient['pseudo_client'];
          $_SESSION['role'] = $infoClient['role_client'];
          header('location:../admin.php');
          exit();
        } elseif ($getRole == 0) {
          // Client
          $_SESSION['id'] = $infoClient['id_client'];
          $_SESSION['pseudo'] = $infoClient['pseudo_client'];
          $_SESSION['role'] = $infoClient['role_client'];
          header('location:../index.php');
          exit();
        }
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
