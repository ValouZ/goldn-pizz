<?php
include('variables.php');
include('pdo.php');

if (isset($_POST['forminscription'])) {
    
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
      if ($pseudoLenght >= 3 && $pseudoLenght < 18) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $reqemail = $bdd->prepare("SELECT * FROM client WHERE email_client = ?");
          $reqemail->execute(array($email));
          $mailexist = $reqemail->rowCount();
          if ($mailexist == 0) {
            if (preg_match($regxr, $password) == 1) {
              if ($passwordConfirm === $password) {
                if (filter_var(intval($telephone), FILTER_VALIDATE_INT)) {
                  $telephoneLenght = strlen($telephone);
                  if ($telephoneLenght == 10) {
                    if (filter_var(intval($postcode), FILTER_VALIDATE_INT)) {
                      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                      $reqinsert = $bdd->prepare('INSERT INTO client(pseudo_client,email_client,mdp_client,genre_client,pays_client,ville_client,postcode_client,rue_client,tel_client,role_client) VALUES (?,?,?,?,?,?,?,?,?,0)');
                      $reqinsert->execute(array($pseudo, $email, $passwordHash, $civilite, $pays, $ville, $postcode, $rue, $telephone));
                      header('location:../sign-in.php?created'); // Inscription réussi
                      exit();
                    } else {
                      header('location:../sign-up.php?error=0'); // erreur code postal
                      exit();
                    }
                  } else {
                    header('location:../sign-up.php?error=1'); // erreur téléphone
                    exit();
                  }
                } else {
                  header('location:../sign-up.php?error=1'); // erreur téléphone
                  exit();
                }
              } else {
                header('location:../sign-up.php?error=2'); // mots de passe différents
                exit();
              }
            } else {
              header('location:../sign-up.php?error=3'); // erreur regxr
              exit();
            }
          } else {
            header('location:../sign-up.php?error=4'); // email existe déjà 
            exit();
          }
        } else {
          header('location:../sign-up.php?error=5'); // erreur email
          exit();
        }
      } else {
        header('location:../sign-up.php?error=6'); // pseudo trop long
        exit();
      }
    } else {
      header('location:../sign-up.php?error=7'); // pseudo existe deja
      exit();
    }
  } else {
    header('location:../sign-up.php?error=8'); // Champ(s) vide
    exit();
  }
} else {
  header('location:../sign-up.php?error=9'); // tentative d'inscription sans passer par la page sign-up
  exit();
}

echo 'il y a un problème';
