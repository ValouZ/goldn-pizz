<?php
$title = "Se connecter";
$menu = "1";
include('header.php');
include('traitement/functions.php');

$result = "";
if (isset($_GET['error'])) {
  $error = $_GET['error'];

  switch ($error) {
    case 0:
      $result = "Erreur d'identifiant ou de mot de passe";
      break;
    case 1:
      $result = "Les champs du formulaire sont vides";
      break;
    case 2:
      $result = "N'essaye pas de te connecter comme ça voyons";
      break;
  }
} else if (isset($_GET['created'])) {
  $created = $_GET['created'];
  $result = "Compte créé - Vous pouvez maintenant vous connecter";
}
?>

<h2 class="page-title main-title">Content de te revoir</h2>



<form class="form" method="post" action="traitement/connexion-traitement.php">

  <?php
  if ($result !== '' && isset($created)) {
    display_message_url($result, 1);
  }
  ?>

  <section class="form__content" aria-label="Formulaire de connexion">
    <div class="sign-in-form">
      <input type="text" placeholder="Pseudo" name="pseudo" required>
      <input id="app-password" type="password" placeholder="Mot de passe" name="password" required>
    </div>
    <div class="show-checkbox">
      <input id="app-check" type="checkbox" id="show-pswd">
      <label for="show-pswd">Afficher le mot de passe</label>
    </div>
  </section>

  <?php
  if ($result !== '' && isset($error)) {
    display_message_url($result, 0);
  }
  ?>

  <label class="order connect" for="connexion">
    Connexion
    <button class="order__button" id="connexion" name="formconnexion">
      <img src="assets/images/right-arrow.svg" alt="Commander">
    </button>
  </label>
</form>

<section class="other-option" aria-label="Redirections">
  <a href="sign-up.php">S'inscrire</a>
  <a href="#">Mot de passe oublié</a>
</section>

<script src="scripts/show-password.js"></script>
</body>

</html>