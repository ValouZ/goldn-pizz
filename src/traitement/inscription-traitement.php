<?php
include_once('variables.php');
include_once('pdo.php');

if (isset($_POST['forminscription'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $sex = htmlspecialchars($_POST['civilite']);
  $password = htmlspecialchars($_POST['password']);
  $passwordConfirm = htmlspecialchars($_POST['password-confirm']);
  $email = htmlspecialchars($_POST['email']);
  $country = htmlspecialchars($_POST['pays']);
  $postcode = htmlspecialchars($_POST['postcode']);
  $city = htmlspecialchars($_POST['ville']);
  $street = htmlspecialchars($_POST['rue']);
  $phone = htmlspecialchars($_POST['telephone']);

  // On vérife que tous les champs soient bien remplis
  if (!empty($_POST['pseudo']) and !empty($_POST['civilite']) and !empty($_POST['password']) and !empty($_POST['password-confirm']) and !empty($_POST['email']) and !empty($_POST['pays']) and !empty($_POST['postcode']) and !empty($_POST['ville']) and !empty($_POST['rue']) and !empty($_POST['telephone'])) {
    $pseudoLenght = strlen($pseudo);

    // On sélectionne dans la table client toutes les lignes avec le pseudo voulu
    $reqPseudo = $bdd->prepare("SELECT * FROM client WHERE pseudo_client  = ?");
    $reqPseudo->execute(array($pseudo));
    $pseudoExist = $reqPseudo->rowCount(); // On compte les lignes retournées
    if ($pseudoExist == 0) {
      // Si le pseudo n'existe pas

      if ($pseudoLenght >= 3 && $pseudoLenght < 18) {
        // Si le pseudo est entre 3 et 18 caractères
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

          // On sélectionne dans la table client toutes les lignes avec l'email voulu
          $reqemail = $bdd->prepare("SELECT * FROM client WHERE email_client = ?");
          $reqemail->execute(array($email));
          $mailexist = $reqemail->rowCount(); // On compte les lignes retournées
          if ($mailexist == 0) {
            // Si le mail n'existe pas

            if (preg_match($regxr, $password) == 1) {
              // Si le mot de passe suit nos recommandations

              if ($passwordConfirm === $password) {
                // Si les mdp concordent

                if (filter_var(intval($phone), FILTER_VALIDATE_INT)) {
                  $phoneLenght = strlen($phone);
                  if ($phoneLenght == 10) {
                    if (filter_var(intval($postcode), FILTER_VALIDATE_INT)) {

                      // On hash le mdp
                      $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                      // On insère dans la table client les informations suivantes afin de créer un nouveau client
                      $reqinsert = $bdd->prepare('INSERT INTO client(pseudo_client,email_client,mdp_client,genre_client,pays_client,ville_client,postcode_client,rue_client,tel_client,role_client) VALUES (?,?,?,?,?,?,?,?,?,0)');
                      $reqinsert->execute(array($pseudo, $email, $passwordHash, $sex, $country, $city, $postcode, $street, $phone));
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
