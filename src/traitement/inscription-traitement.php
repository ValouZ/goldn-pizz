<?php

include('pdo.php');

if (isset($_POST['forminscription'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $civilite = htmlspecialchars($_POST['civilite']);
  // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $password = htmlspecialchars($_POST['password']);
  $passwordConfirm = htmlspecialchars($_POST['password-confirm']);
  $email = htmlspecialchars($_POST['email']);
  $pays = htmlspecialchars($_POST['pays']);
  $postcode = htmlspecialchars($_POST['postcode']);
  $ville = htmlspecialchars($_POST['ville']);
  $rue = htmlspecialchars($_POST['rue']);
  $telephone = htmlspecialchars($_POST['telephone']);


  if (!empty($_POST['pseudo']) and !empty($_POST['civilite']) and !empty($_POST['password']) and !empty($_POST['password-confirm']) and !empty($_POST['email']) and !empty($_POST['pays']) and !empty($_POST['postcode']) and !empty($_POST['ville']) and !empty($_POST['rue']) and !empty($_POST['telephone'])) {
    $pseudoLenght = strlen($pseudo);
    $reqPseudo = $bdd->prepare("SELECT * FROM client WHERE pseudo_client  = ?");
    $reqPseudo->execute(array($pseudo));
    $pseudoExist = $reqPseudo->rowCount();
    if ($pseudoExist == 0) {
      if ($pseudoLenght < 18) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $reqemail = $bdd->prepare("SELECT * FROM client WHERE email_client = ?");
          $reqemail->execute(array($email));
          $mailexist = $reqemail->rowCount();
          if ($mailexist == 0) {
            if (preg_match('~^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[$%?!]).{10,20}$~u', $password) == 1) {
              if ($passwordConfirm === $password) {
                if (filter_var(intval($telephone), FILTER_VALIDATE_INT)) {
                  $telephoneLenght = strlen($telephone);
                  if ($telephoneLenght == 10) {
                    if (filter_var(intval($postcode), FILTER_VALIDATE_INT)) {
                      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                      $reqinsert = $bdd->prepare('INSERT INTO client(pseudo_client,email_client,mdp_client,genre_client,pays_client,ville_client,postcode_client,rue_client,tel_client,role_client) VALUES (?,?,?,?,?,?,?,?,?,0)');
                      $reqinsert->execute(array($pseudo, $email, $passwordHash, $civilite, $pays, $ville, $postcode, $rue, $telephone));
                      header('location:../sign-in.php');
                    } else {
                      echo "<h2> CODE POSTAL PAS CHIFFRE </h2>" . $postcode;
                    }
                  } else {
                    echo "<h2> LONGUEUR TELEPHONE != 10 </h2>" . $telephoneLenght;
                  }
                } else {
                  echo "<h2> MAUVAIS TELEPHONE </h2>" . $telephone;
                }
              } else {
                echo "<h2> LES DEUX MOTS DE PASSES SONT DIFFERENTS </h2>" . $passwordConfirm . $password;
              }
            } else {
              echo "<h2> MAUVAIS MDP </h2>" . $passwordConfirm . $password;
            }
          } else {
            echo "<h2> EMAIL DEJA EXISTANT </h2>";
          }
        } else {
          echo "<h2> PB EMAIL </h2>";
        }
      } else {
        echo "<h2> PSEUDO TROP LONG </h2>" . $pseudoLenght;
      }
    } else {
      echo "<h2> PSEUDO EXISTE DEJA </h2>" . $pseudo;
    }
  }
} else {
  echo 'pas bon'; // A MODIFIER
}
?>
<a href="../sign-up.php">RETOUR</a>