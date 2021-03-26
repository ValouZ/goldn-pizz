<?php

include('pdo.php');

// var_dump($_POST);

if (isset($_POST['formconnexion'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);

  if (!empty($_POST['pseudo']) and !empty($_POST['password'])) {
    $reqPseudo = $bdd->prepare("SELECT * FROM client WHERE pseudo_client  = ?");
    $reqPseudo->execute(array($pseudo));
    $pseudoExist = $reqPseudo->rowCount();
    if ($pseudoExist == 1) {
      $user = $reqPseudo->fetch(PDO::FETCH_ASSOC);
      $passwordUser = $user['mdp_client'];
      echo $password . '<br>';
      var_dump(password_verify($password, $passwordUser));
      if (password_verify($password, $passwordUser)) {
        // if ($password === $passwordUser) {
        echo "<h2> TU ES MAINTENANT CONNECTÉ </h2>";
      } else {
        echo "<h2> MAUVAIS MDP </h2> <p>" . $password . "</p><p>" . $passwordUser . "</p>";
      }
    } else {
      echo "<h2> PSEUDO INCONNU </h2>";
    }
  } else {
    echo "<h2> CHAMPS VIDE </h2>";
  }
} else {
  echo "<h2> RIEN N'EXISTE </h2>";
}
?>
<a href="../sign-in.php">RETOUR</a>