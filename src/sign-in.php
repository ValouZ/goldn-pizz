<?php
$title = "Se connecter";
$menu = "1";

include('header.php');
?>



  <h2 class="page-title main-title">Content de te revoir</h2>

  <form class="form" method="post" action="traitement/connexion-traitement.php">
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