<?php

// Fonction affichant un message avec une classe spécifique
// $result -> le message à afficher
// $state -> etat du message (success ou error)
function display_message_url($result, $state)
{
  if ($state === 1) {
    $class = 'success';
  } else {
    $class = 'error';
  }
?>
  <section class="<?= $class ?>">
    <?php
    echo $result;
    ?>
  </section>
<?php
}

// Fonction renvoyant un message d'erreur selon l'id en paramètre
// $error -> id du message d'erreur
// RETURN -> Message d'erreur
function error_message($error)
{
  $result = '';
  switch ($error) {
    case 0:
      $result = "Le code postal n'est pas bon";
      break;
    case 1:
      $result = "Mauvais numéro de téléphone";
      break;
    case 2:
      $result = "Les mots de passes ne concordent pas";
      break;
    case 3:
      $result = "Le mot de passe doit contenir une majuscule, une minuscule, un chiffre, et un caractère spécial parmis [$, %, ?, !] et faire entre 10 et 20 caractères";
      break;
    case 4:
      $result = "L'email existe déjà dans notre base de données";
      break;
    case 5:
      $result = "L'email n'est pas valide";
      break;
    case 6:
      $result = "Le pseudo doit faire entre 3 et 18 caractères";
      break;
    case 7:
      $result = "Ce pseudo n'est pas disponible";
      break;
    case 8:
      $result = "Certains champs sont vides";
      break;
    case 9:
      $result = "N'essaye pas de t'inscrire comme ça voyons";
      break;
    case 10:
      $result = "L'ancien mot de passe est incorrect";
      break;
  }

  return $result;
}

// Fonction empechant d'accéder à certaine page (en passant par l'url) si l'on est pas connecté
function access_denied()
{
  if (isset($_SESSION) && count($_SESSION) === 0) {
    header('Location:index.php?QuestCeQueTuFouBordelDeMerde');
    exit();
  }
}

// Fonction qui redirige vers la page d'accueil client si l'on essaye d'accéder à des pages interdites
function is_not_admin()
{
  if ($_SESSION['role'] != 1) {
    header('Location:index.php?TuTePrendsPourQui');
    exit();
  }
}

// Fonction qui redirige vers la page d'accueil admin si l'on essaye d'accéder à des pages interdites
function is_admin()
{
  if ($_SESSION['role'] == 1) {
    header('Location:admin.php?ResteAdminCommeTuEs');
    exit();
  }
}

// Fonction retournant un lien spécifique selon le role de l'utilisateur
function role_link()
{
  $link = '';
  if (count($_SESSION) > 0) {
    // Si la session est active et que l'on est pas admin, on met le lien vers index.php, sinon admin.php
    $link = $_SESSION['role'] != 1 ? 'index.php' : 'admin.php';
  } else {
    // Sinon on met le lien vers index.php
    $link = 'index.php';
  }
  return $link;
}
