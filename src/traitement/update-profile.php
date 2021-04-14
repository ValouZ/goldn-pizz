<?php
session_start();
include_once('variables.php');
include_once('pdo.php');

if (isset($_POST['validate'])) {
  $id_client = $_SESSION['id'];
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $oldPassword = htmlspecialchars($_POST['password']); // Ancien mot de passe rentré par l'utilisateur
  $newPassword = htmlspecialchars($_POST['new-password']); // Nouveau mot de passe
  $confirmPassword = htmlspecialchars($_POST['confirm-password']); // Confirmation mot de passe
  $changePassword = 0; // Ne pas modifier le mot de passe en base
  $email = htmlspecialchars($_POST['email']);
  $country = htmlspecialchars($_POST['country']);
  $city = htmlspecialchars($_POST['city']);
  $postcode = htmlspecialchars($_POST['postcode']);
  $street = htmlspecialchars($_POST['street']);
  $phone = htmlspecialchars($_POST['phone']);

  // On vérife que tous les champs de mot de passes soient bien remplis
  if (!empty($oldPassword) and !empty($newPassword) && !empty($confirmPassword)) {

    // Selections du mdp_client de la table client avec l'id client voulu
    $reqpswd = $bdd->prepare("SELECT mdp_client FROM client WHERE id_client = ?");
    $reqpswd->execute(array($id_client));
    $realPassword = $reqpswd->fetch(PDO::FETCH_ASSOC); // Tableau contenant le mot de passe stocké en base

    if (password_verify($oldPassword, $realPassword['mdp_client'])) {
      // L'ancien mot de passe est correct
      if (preg_match($regxr, $newPassword) == 1) {
        // Nouveau mot de passe valide
        if ($newPassword === $confirmPassword) {
          // Nouveaux mots de passes concordent
          $changePassword = 1; // Modifier le mot de passe en base
          $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        } else {
          header('location:../profile.php?error=2'); // mots de passe différents
          exit();
        }
      } else {
        header('location:../profile.php?error=3'); // erreur regxr
        exit();
      }
    } else {
      header('location:../profile.php?error=10'); // L'ancien mot de passe est incorrect
      exit();
    }
  }

  // On vérife que tous les champs soient (sauf mdp) bien remplis
  if (!empty($pseudo) and !empty($email) and !empty($country) and !empty($city) and !empty($postcode) and !empty($street) and !empty($phone)) {
    $pseudoLenght = strlen($pseudo);

    // On sélectionne dans la table client toutes les lignes avec le pseudo client voulu et un id qui ne correspond pas à notre profil
    $reqPseudo = $bdd->prepare("SELECT * FROM client WHERE pseudo_client = ? AND id_client != ?");
    $reqPseudo->execute(array($pseudo, $id_client));
    $pseudoExist = $reqPseudo->rowCount(); // On compte le nombre de ligne
    if ($pseudoExist == 0) {
      // Si il n'existe pas de résultat, c'est que le nouveau pseudo est unique
      if ($pseudoLenght >= 3 && $pseudoLenght < 18) {
        // Si le pseudo est entre 3 et 18 caractères
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

          // On sélectionne dans la table client toutes les lignes avec l'email voulu et un id qui ne correspond pas à notre profil
          $reqemail = $bdd->prepare("SELECT * FROM client WHERE email_client = ? AND id_client != ?");
          $reqemail->execute(array($email, $id_client));
          $mailexist = $reqemail->rowCount();
          if ($mailexist == 0) {
            // Si il n'existe pas de résultat, c'est que le nouvel email est unique
            if (filter_var(intval($phone), FILTER_VALIDATE_INT)) {
              $phoneLenght = strlen($phone);
              if ($phoneLenght == 10) {
                if (filter_var(intval($postcode), FILTER_VALIDATE_INT)) {
                  if ($changePassword === 1) {
                    // Si l'on doit modifier le mot de passe, on change toutes les valeurs de la table client correspondant à notre id
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
                    header('location:../profile.php?updatedPASSWORD'); // Inscription réussi avec modif de mot de passe
                    exit();
                  } else {
                    // Si l'on ne doit pas modifier le mot de passe, on change toutes les valeurs (sauf mdp) de la table client correspondant à notre id
                    $reqinsert = $bdd->prepare('UPDATE client 
                                                SET pseudo_client = ?, 
                                                email_client = ?, 
                                                -- genre_client = ?, 
                                                pays_client = ?, 
                                                ville_client = ?, 
                                                postcode_client = ?, 
                                                rue_client = ?, 
                                                tel_client = ? 
                                                WHERE id_client = ?');
                    $reqinsert->execute(array($pseudo, $email/*, $sex*/, $country, $city, $postcode, $street, $phone, $id_client));
                    header('location:../profile.php?updated'); // Inscription réussi sans modif de mot de passe
                    exit();
                  }
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
