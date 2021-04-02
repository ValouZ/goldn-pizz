<?php

include('pdo.php');


if (isset($_POST['formconnexion'])){
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);

  if(!empty($pseudo) AND !empty($password)){
    $req = $bdd -> prepare('SELECT * FROM client WHERE pseudo_client = ?');
    $req->execute(array($pseudo));
    $clientExist = $req->rowCount();
    if($clientExist == 1){
      $infoClient = $req->fetch();
      $passwordUser = $infoClient['mdp_client'];
      if(password_verify($password, $passwordUser)){
        $_SESSION['id'] = $infoClient['id_client'];
        $_SESSION['pseudo'] = $infoClient['pseudo_client'];
        $_SESSION['password'] = $infoClient['mdp_client'];
        header('location:../profile.php?id='.$_SESSION['id']);
      }else{
        echo "pas bon mdp";
      }
    }else{
      echo "erreur de merde";
      ?>
        <a href="../sign-in.php">RETOUR</a>
      <?php
    }
  }else{
    echo "erreur";
    ?>
      <a href="../sign-in.php">RETOUR</a>
    <?php
  }
}

// var_dump($_POST);

// if (isset($_POST['formconnexion'])) {
//   $pseudo = htmlspecialchars($_POST['pseudo']);
//   $password = htmlspecialchars($_POST['password']);

//   if (!empty($_POST['pseudo']) and !empty($_POST['password'])) {
//     $reqPseudo = $bdd->prepare("SELECT * FROM client WHERE pseudo_client  = ?");
//     $reqPseudo->execute(array($pseudo));
//     $pseudoExist = $reqPseudo->rowCount();
//     if ($pseudoExist == 1) {
//       $user = $reqPseudo->fetch(PDO::FETCH_ASSOC);
//       $passwordUser = $user['mdp_client'];
//       echo $password . '<br>';
//       var_dump(password_verify($password, $passwordUser));
//       if (password_verify($password, $passwordUser)) {
//         // if ($password === $passwordUser) {
//         echo "<h2> TU ES MAINTENANT CONNECTÉ </h2>";
//       } else {
//         echo "<h2> MAUVAIS MDP </h2> <p>" . $password . "</p><p>" . $passwordUser . "</p>";
//       }
//     } else {
//       echo "<h2> PSEUDO INCONNU </h2>";
//     }
//   } else {
//     echo "<h2> CHAMPS VIDE </h2>";
//   }
// } else {
//   echo "<h2> RIEN N'EXISTE </h2>";
// }
// 



?>
