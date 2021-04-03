<?php
session_start();
include('pdo.php');

if (isset($_POST['validate'])) {
  $id_client = $_SESSION['id'];
  // $sex = htmlspecialchars($_POST['civilite']);
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);
  $email = htmlspecialchars($_POST['email']);
  $country = htmlspecialchars($_POST['country']);
  $city = htmlspecialchars($_POST['city']);
  $postcode = htmlspecialchars($_POST['postcode']);
  $street = htmlspecialchars($_POST['street']);
  $phone = htmlspecialchars($_POST['phone']);


  if (!empty($pseudo) and !empty($password) and !empty($email) and !empty($country) and !empty($city) and !empty($postcode) and !empty($street) and !empty($phone)) {
    $pseudoLenght = strlen($pseudo);
    $reqPseudo = $bdd->prepare("SELECT * FROM client WHERE pseudo_client  = ? AND id_client != ?");
    $reqPseudo->execute(array($pseudo, $id_client));
    $pseudoExist = $reqPseudo->rowCount();
    if ($pseudoExist == 0) {
      if ($pseudoLenght >= 3 && $pseudoLenght < 18) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $reqemail = $bdd->prepare("SELECT * FROM client WHERE email_client = ? AND id_client != ?");
          $reqemail->execute(array($email, $id_client));
          $mailexist = $reqemail->rowCount();
          if ($mailexist == 0) {
            if (preg_match('~^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[$%?!]).{10,20}$~u', $password) == 1) {
              // if ($passwordConfirm === $password) {
              if (filter_var(intval($phone), FILTER_VALIDATE_INT)) {
                $phoneLenght = strlen($phone);
                if ($phoneLenght == 10) {
                  if (filter_var(intval($postcode), FILTER_VALIDATE_INT)) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $reqinsert = $bdd->prepare('UPDATE client 
                            SET pseudo_client = ?, 
                            email_client = ?, 
                            mdp_client = ?, 
                            -- genre_client = ?, 
                            pays_client = ?, 
                            ville_client = ?, 
                            postcode_client = ?, 
                            rue_client = ?, 
                            tel_client = ? 
                            WHERE id_client = ?');
                    $reqinsert->execute(array($pseudo, $email, $passwordHash/*, $sex*/, $country, $city, $postcode, $street, $phone, $id_client));
                    header('location:../profile.php?updated'); // Inscription réussi
                    exit();
                  } else {
                    header('location:../profile.php?error=0'); // erreur code postal
                    exit();
                  }
                } else {
                  header('location:../profile.php?error=1'); // erreur téléphone
                  exit();
                }
              } else {
                header('location:../profile.php?error=1'); // erreur téléphone
                exit();
              }
              // } else {
              //   header('location:../profile.php?error=2'); // mots de passe différents
              //   exit();
              // }
            } else {
              header('location:../profile.php?error=3'); // erreur regxr
              exit();
            }
          } else {
            header('location:../profile.php?error=4'); // email existe déjà 
            exit();
          }
        } else {
          header('location:../profile.php?error=5'); // erreur email
          exit();
        }
      } else {
        header('location:../profile.php?error=6'); // pseudo trop long
        exit();
      }
    } else {
      header('location:../profile.php?error=7'); // pseudo existe deja
      exit();
    }
  } else {
    header('location:../profile.php?error=8'); // Champ(s) vide
    exit();
  }
} else {
  header('location:../profile.php?error=9'); // tentative de modif sans passer par la page profile
  exit();
}














$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$reqinsert = $bdd->prepare('UPDATE client 
                            SET pseudo_client = ?, 
                            email_client = ?, 
                            mdp_client = ?, 
                            genre_client = ?, 
                            pays_client = ?, 
                            ville_client = ?, 
                            postcode_client = ?, 
                            rue_client = ?, 
                            tel_client = ? 
                            WHERE id_client = ?');
$reqinsert->execute(array($pseudo, $email, $passwordHash, $sex, $country, $city, $postcode, $street, $phone, $id_client));

header('location:../profile.php');
