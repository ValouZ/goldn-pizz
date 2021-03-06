<?php

//Inclusion de variables / functions / pdo

include_once("traitement/variables.php");
include_once("traitement/pdo.php");
include_once('traitement/functions.php');

$info = $header_info[1]; // Voir variables.php
include_once('header.php');

//function access_denier, se référer à functions.php
access_denied();

//Définition des erreurs
$result = "";
if (isset($_GET['error'])) {
  $error = $_GET['error'];
  $result = error_message($error);
}

// Si nous sommes connecté
if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
  // Récupérer l'id de l'utilisateur via sa session
  $getId = intval($_SESSION['id']);
  // Requète qui selectionne tout dans la table client ou id_client = à l'id de la session.
  $req = $bdd->prepare('SELECT * FROM client WHERE id_client = ?');
  //Affectation des parametres de la requete précédente et on execute la requete
  $req->execute(array($getId));
  // On créé un tableau avec toute les infos de l'utilisateur
  $clientInfo = $req->fetch();
?>

  <h2 class="page-title main-title">Salut <?= $clientInfo['pseudo_client']  //on affiche le pseudo de l'utilisateur ?></h2>
  <form class="update-form" action="traitement/update-profile.php" method="post">
    <div class="columns-desktop">
      <div class="left-desktop">

        <section class="update-input app-update update-input--profile" aria-label="Changer le pseudo">
          <input type="text" id='pseudo' name="pseudo" value="<?= $clientInfo['pseudo_client'] //affichage du pseudo du client ?>" disabled="true">
          <label for="pseudo">
            Pseudo
          </label>
          <button class="update-input__button">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="pen" d="M23.9327 0.842548L23.9026 0.815104C23.3272 0.289496 22.5813 0 21.8024 0C20.9291 0 20.0906 0.369681 19.5019 1.01417L8.36979 13.2015C8.26832 13.3126 8.19136 13.4437 8.14378 13.5863L6.83481 17.5104C6.68347 17.9641 6.75943 18.4658 7.03796 18.8525C7.31872 19.2422 7.77102 19.4749 8.24797 19.4749H8.24804C8.45434 19.4749 8.65599 19.4324 8.84724 19.3487L12.6372 17.6907C12.775 17.6305 12.8986 17.542 13 17.4309L24.1322 5.24361C25.2906 3.97548 25.2012 2.00132 23.9327 0.842548ZM9.34275 16.7855L10.1109 14.4829L10.1756 14.412L11.6314 15.7416L11.5666 15.8126L9.34275 16.7855ZM22.5449 3.79376L13.0813 14.1545L11.6255 12.8248L21.0891 2.46401C21.2742 2.26137 21.5275 2.14972 21.8024 2.14972C22.0436 2.14972 22.2745 2.23944 22.4532 2.40267L22.4832 2.43012C22.8762 2.78905 22.9039 3.40079 22.5449 3.79376Z" fill="black" />
              <path class="box" d="M21.7731 9.91657C21.1795 9.91657 20.6982 10.3978 20.6982 10.9914V20.1168C20.6982 21.624 19.4719 22.8503 17.9647 22.8503H4.93744C3.43013 22.8503 2.20392 21.624 2.20392 20.1168V7.19538C2.20392 5.68813 3.4302 4.46186 4.93744 4.46186H14.3666C14.9602 4.46186 15.4415 3.98061 15.4415 3.387C15.4415 2.79339 14.9602 2.31213 14.3666 2.31213H4.93744C2.24477 2.31213 0.0541992 4.50277 0.0541992 7.19538V20.1167C0.0541992 22.8093 2.24484 25 4.93744 25H17.9646C20.6572 25 22.8479 22.8093 22.8479 20.1167V10.9914C22.8479 10.3978 22.3667 9.91657 21.7731 9.91657Z" fill="black" />
            </svg>
          </button>
        </section>




        <section class="passwords">
          <section class="update-input app-update update-input--profile" id="app-old-password" aria-label="Changer le mot de passe">
            <input type="password" id='mdp' name="password" value="........" placeholder='Laisser vide si vous ne voulez pas le modifier' disabled="true">
            <label for="mdp">
              Mot de passe
            </label>
            <button class="update-input__button">
              <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="pen" d="M23.9327 0.842548L23.9026 0.815104C23.3272 0.289496 22.5813 0 21.8024 0C20.9291 0 20.0906 0.369681 19.5019 1.01417L8.36979 13.2015C8.26832 13.3126 8.19136 13.4437 8.14378 13.5863L6.83481 17.5104C6.68347 17.9641 6.75943 18.4658 7.03796 18.8525C7.31872 19.2422 7.77102 19.4749 8.24797 19.4749H8.24804C8.45434 19.4749 8.65599 19.4324 8.84724 19.3487L12.6372 17.6907C12.775 17.6305 12.8986 17.542 13 17.4309L24.1322 5.24361C25.2906 3.97548 25.2012 2.00132 23.9327 0.842548ZM9.34275 16.7855L10.1109 14.4829L10.1756 14.412L11.6314 15.7416L11.5666 15.8126L9.34275 16.7855ZM22.5449 3.79376L13.0813 14.1545L11.6255 12.8248L21.0891 2.46401C21.2742 2.26137 21.5275 2.14972 21.8024 2.14972C22.0436 2.14972 22.2745 2.23944 22.4532 2.40267L22.4832 2.43012C22.8762 2.78905 22.9039 3.40079 22.5449 3.79376Z" fill="black" />
                <path class="box" d="M21.7731 9.91657C21.1795 9.91657 20.6982 10.3978 20.6982 10.9914V20.1168C20.6982 21.624 19.4719 22.8503 17.9647 22.8503H4.93744C3.43013 22.8503 2.20392 21.624 2.20392 20.1168V7.19538C2.20392 5.68813 3.4302 4.46186 4.93744 4.46186H14.3666C14.9602 4.46186 15.4415 3.98061 15.4415 3.387C15.4415 2.79339 14.9602 2.31213 14.3666 2.31213H4.93744C2.24477 2.31213 0.0541992 4.50277 0.0541992 7.19538V20.1167C0.0541992 22.8093 2.24484 25 4.93744 25H17.9646C20.6572 25 22.8479 22.8093 22.8479 20.1167V10.9914C22.8479 10.3978 22.3667 9.91657 21.7731 9.91657Z" fill="black" />
              </svg>
            </button>
          </section>

          <section class="update-input update-input--profile hidden-password" aria-label="Nouveau mot de passe">
            <input type="password" id='new-mdp' name="new-password" placeholder='Laisser vide si vous ne voulez pas le modifier'>
            <label for="new-mdp">
              Nouveau mot de passe
            </label>
          </section>

          <section class="update-input update-input--profile hidden-password" aria-label="Confirmer mot de passe">
            <input type="password" id='confirm-mdp' name="confirm-password" placeholder='Laisser vide si vous ne voulez pas le modifier'>
            <label for="confirm-mdp">
              Confirmer mot de passe
            </label>
          </section>
        </section>




        <section class="update-input app-update update-input--profile" aria-label="Changer son mail">
          <input type="email" id='email' name="email" value="<?= $clientInfo['email_client'] //Email de l'utilisateur?>" disabled="true">
          <label for="email">
            Email
          </label>
          <button class="update-input__button">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="pen" d="M23.9327 0.842548L23.9026 0.815104C23.3272 0.289496 22.5813 0 21.8024 0C20.9291 0 20.0906 0.369681 19.5019 1.01417L8.36979 13.2015C8.26832 13.3126 8.19136 13.4437 8.14378 13.5863L6.83481 17.5104C6.68347 17.9641 6.75943 18.4658 7.03796 18.8525C7.31872 19.2422 7.77102 19.4749 8.24797 19.4749H8.24804C8.45434 19.4749 8.65599 19.4324 8.84724 19.3487L12.6372 17.6907C12.775 17.6305 12.8986 17.542 13 17.4309L24.1322 5.24361C25.2906 3.97548 25.2012 2.00132 23.9327 0.842548ZM9.34275 16.7855L10.1109 14.4829L10.1756 14.412L11.6314 15.7416L11.5666 15.8126L9.34275 16.7855ZM22.5449 3.79376L13.0813 14.1545L11.6255 12.8248L21.0891 2.46401C21.2742 2.26137 21.5275 2.14972 21.8024 2.14972C22.0436 2.14972 22.2745 2.23944 22.4532 2.40267L22.4832 2.43012C22.8762 2.78905 22.9039 3.40079 22.5449 3.79376Z" fill="black" />
              <path class="box" d="M21.7731 9.91657C21.1795 9.91657 20.6982 10.3978 20.6982 10.9914V20.1168C20.6982 21.624 19.4719 22.8503 17.9647 22.8503H4.93744C3.43013 22.8503 2.20392 21.624 2.20392 20.1168V7.19538C2.20392 5.68813 3.4302 4.46186 4.93744 4.46186H14.3666C14.9602 4.46186 15.4415 3.98061 15.4415 3.387C15.4415 2.79339 14.9602 2.31213 14.3666 2.31213H4.93744C2.24477 2.31213 0.0541992 4.50277 0.0541992 7.19538V20.1167C0.0541992 22.8093 2.24484 25 4.93744 25H17.9646C20.6572 25 22.8479 22.8093 22.8479 20.1167V10.9914C22.8479 10.3978 22.3667 9.91657 21.7731 9.91657Z" fill="black" />
            </svg>
          </button>
        </section>

        <section class="update-input app-update update-input--profile" aria-label="Changer de pays">
          <input type="text" id='country' name="country" value="<?= $clientInfo['pays_client'] // Pays de l'utilisateur ?>" disabled="true">
          <label for="country">
            Pays
          </label>
          <button class="update-input__button">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="pen" d="M23.9327 0.842548L23.9026 0.815104C23.3272 0.289496 22.5813 0 21.8024 0C20.9291 0 20.0906 0.369681 19.5019 1.01417L8.36979 13.2015C8.26832 13.3126 8.19136 13.4437 8.14378 13.5863L6.83481 17.5104C6.68347 17.9641 6.75943 18.4658 7.03796 18.8525C7.31872 19.2422 7.77102 19.4749 8.24797 19.4749H8.24804C8.45434 19.4749 8.65599 19.4324 8.84724 19.3487L12.6372 17.6907C12.775 17.6305 12.8986 17.542 13 17.4309L24.1322 5.24361C25.2906 3.97548 25.2012 2.00132 23.9327 0.842548ZM9.34275 16.7855L10.1109 14.4829L10.1756 14.412L11.6314 15.7416L11.5666 15.8126L9.34275 16.7855ZM22.5449 3.79376L13.0813 14.1545L11.6255 12.8248L21.0891 2.46401C21.2742 2.26137 21.5275 2.14972 21.8024 2.14972C22.0436 2.14972 22.2745 2.23944 22.4532 2.40267L22.4832 2.43012C22.8762 2.78905 22.9039 3.40079 22.5449 3.79376Z" fill="black" />
              <path class="box" d="M21.7731 9.91657C21.1795 9.91657 20.6982 10.3978 20.6982 10.9914V20.1168C20.6982 21.624 19.4719 22.8503 17.9647 22.8503H4.93744C3.43013 22.8503 2.20392 21.624 2.20392 20.1168V7.19538C2.20392 5.68813 3.4302 4.46186 4.93744 4.46186H14.3666C14.9602 4.46186 15.4415 3.98061 15.4415 3.387C15.4415 2.79339 14.9602 2.31213 14.3666 2.31213H4.93744C2.24477 2.31213 0.0541992 4.50277 0.0541992 7.19538V20.1167C0.0541992 22.8093 2.24484 25 4.93744 25H17.9646C20.6572 25 22.8479 22.8093 22.8479 20.1167V10.9914C22.8479 10.3978 22.3667 9.91657 21.7731 9.91657Z" fill="black" />
            </svg>
          </button>
        </section>
      </div>

      <div class="right-desktop">
        <section class="update-input app-update update-input--profile" aria-label="Changer de ville">
          <input type="text" id='city' name="city" value="<?= $clientInfo['ville_client'] //Ville du client ?>" disabled="true">
          <label for="city">
            Ville
          </label>
          <button class="update-input__button">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="pen" d="M23.9327 0.842548L23.9026 0.815104C23.3272 0.289496 22.5813 0 21.8024 0C20.9291 0 20.0906 0.369681 19.5019 1.01417L8.36979 13.2015C8.26832 13.3126 8.19136 13.4437 8.14378 13.5863L6.83481 17.5104C6.68347 17.9641 6.75943 18.4658 7.03796 18.8525C7.31872 19.2422 7.77102 19.4749 8.24797 19.4749H8.24804C8.45434 19.4749 8.65599 19.4324 8.84724 19.3487L12.6372 17.6907C12.775 17.6305 12.8986 17.542 13 17.4309L24.1322 5.24361C25.2906 3.97548 25.2012 2.00132 23.9327 0.842548ZM9.34275 16.7855L10.1109 14.4829L10.1756 14.412L11.6314 15.7416L11.5666 15.8126L9.34275 16.7855ZM22.5449 3.79376L13.0813 14.1545L11.6255 12.8248L21.0891 2.46401C21.2742 2.26137 21.5275 2.14972 21.8024 2.14972C22.0436 2.14972 22.2745 2.23944 22.4532 2.40267L22.4832 2.43012C22.8762 2.78905 22.9039 3.40079 22.5449 3.79376Z" fill="black" />
              <path class="box" d="M21.7731 9.91657C21.1795 9.91657 20.6982 10.3978 20.6982 10.9914V20.1168C20.6982 21.624 19.4719 22.8503 17.9647 22.8503H4.93744C3.43013 22.8503 2.20392 21.624 2.20392 20.1168V7.19538C2.20392 5.68813 3.4302 4.46186 4.93744 4.46186H14.3666C14.9602 4.46186 15.4415 3.98061 15.4415 3.387C15.4415 2.79339 14.9602 2.31213 14.3666 2.31213H4.93744C2.24477 2.31213 0.0541992 4.50277 0.0541992 7.19538V20.1167C0.0541992 22.8093 2.24484 25 4.93744 25H17.9646C20.6572 25 22.8479 22.8093 22.8479 20.1167V10.9914C22.8479 10.3978 22.3667 9.91657 21.7731 9.91657Z" fill="black" />
            </svg>
          </button>
        </section>

        <section class="update-input app-update update-input--profile" aria-label="Changer de code postal">
          <input type="text" id='postcode' name="postcode" value="<?= $clientInfo['postcode_client'] //postcode du client?>" disabled="true">
          <label for="postcode">
            Code postal
          </label>
          <button class="update-input__button">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="pen" d="M23.9327 0.842548L23.9026 0.815104C23.3272 0.289496 22.5813 0 21.8024 0C20.9291 0 20.0906 0.369681 19.5019 1.01417L8.36979 13.2015C8.26832 13.3126 8.19136 13.4437 8.14378 13.5863L6.83481 17.5104C6.68347 17.9641 6.75943 18.4658 7.03796 18.8525C7.31872 19.2422 7.77102 19.4749 8.24797 19.4749H8.24804C8.45434 19.4749 8.65599 19.4324 8.84724 19.3487L12.6372 17.6907C12.775 17.6305 12.8986 17.542 13 17.4309L24.1322 5.24361C25.2906 3.97548 25.2012 2.00132 23.9327 0.842548ZM9.34275 16.7855L10.1109 14.4829L10.1756 14.412L11.6314 15.7416L11.5666 15.8126L9.34275 16.7855ZM22.5449 3.79376L13.0813 14.1545L11.6255 12.8248L21.0891 2.46401C21.2742 2.26137 21.5275 2.14972 21.8024 2.14972C22.0436 2.14972 22.2745 2.23944 22.4532 2.40267L22.4832 2.43012C22.8762 2.78905 22.9039 3.40079 22.5449 3.79376Z" fill="black" />
              <path class="box" d="M21.7731 9.91657C21.1795 9.91657 20.6982 10.3978 20.6982 10.9914V20.1168C20.6982 21.624 19.4719 22.8503 17.9647 22.8503H4.93744C3.43013 22.8503 2.20392 21.624 2.20392 20.1168V7.19538C2.20392 5.68813 3.4302 4.46186 4.93744 4.46186H14.3666C14.9602 4.46186 15.4415 3.98061 15.4415 3.387C15.4415 2.79339 14.9602 2.31213 14.3666 2.31213H4.93744C2.24477 2.31213 0.0541992 4.50277 0.0541992 7.19538V20.1167C0.0541992 22.8093 2.24484 25 4.93744 25H17.9646C20.6572 25 22.8479 22.8093 22.8479 20.1167V10.9914C22.8479 10.3978 22.3667 9.91657 21.7731 9.91657Z" fill="black" />
            </svg>
          </button>
        </section>

        <section class="update-input app-update update-input--profile" aria-label="Changer de rue">
          <input type="text" id='street' name="street" value="<?= $clientInfo['rue_client'] // rue du client?>" disabled="true">
          <label for="street">
            Rue
          </label>
          <button class="update-input__button">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="pen" d="M23.9327 0.842548L23.9026 0.815104C23.3272 0.289496 22.5813 0 21.8024 0C20.9291 0 20.0906 0.369681 19.5019 1.01417L8.36979 13.2015C8.26832 13.3126 8.19136 13.4437 8.14378 13.5863L6.83481 17.5104C6.68347 17.9641 6.75943 18.4658 7.03796 18.8525C7.31872 19.2422 7.77102 19.4749 8.24797 19.4749H8.24804C8.45434 19.4749 8.65599 19.4324 8.84724 19.3487L12.6372 17.6907C12.775 17.6305 12.8986 17.542 13 17.4309L24.1322 5.24361C25.2906 3.97548 25.2012 2.00132 23.9327 0.842548ZM9.34275 16.7855L10.1109 14.4829L10.1756 14.412L11.6314 15.7416L11.5666 15.8126L9.34275 16.7855ZM22.5449 3.79376L13.0813 14.1545L11.6255 12.8248L21.0891 2.46401C21.2742 2.26137 21.5275 2.14972 21.8024 2.14972C22.0436 2.14972 22.2745 2.23944 22.4532 2.40267L22.4832 2.43012C22.8762 2.78905 22.9039 3.40079 22.5449 3.79376Z" fill="black" />
              <path class="box" d="M21.7731 9.91657C21.1795 9.91657 20.6982 10.3978 20.6982 10.9914V20.1168C20.6982 21.624 19.4719 22.8503 17.9647 22.8503H4.93744C3.43013 22.8503 2.20392 21.624 2.20392 20.1168V7.19538C2.20392 5.68813 3.4302 4.46186 4.93744 4.46186H14.3666C14.9602 4.46186 15.4415 3.98061 15.4415 3.387C15.4415 2.79339 14.9602 2.31213 14.3666 2.31213H4.93744C2.24477 2.31213 0.0541992 4.50277 0.0541992 7.19538V20.1167C0.0541992 22.8093 2.24484 25 4.93744 25H17.9646C20.6572 25 22.8479 22.8093 22.8479 20.1167V10.9914C22.8479 10.3978 22.3667 9.91657 21.7731 9.91657Z" fill="black" />
            </svg>
          </button>
        </section>

        <section class="update-input app-update update-input--profile" aria-label="Changer de numéro de téléphone">
          <input type="tel" placeholder="Numéro de téléphone" pattern="[0-9]{10}" name="phone" value="<?= $clientInfo['tel_client'] // téléphone du client ?>" disabled="true">
          <label for="street">
            Numéro de téléphone
          </label>
          <button class="update-input__button">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="pen" d="M23.9327 0.842548L23.9026 0.815104C23.3272 0.289496 22.5813 0 21.8024 0C20.9291 0 20.0906 0.369681 19.5019 1.01417L8.36979 13.2015C8.26832 13.3126 8.19136 13.4437 8.14378 13.5863L6.83481 17.5104C6.68347 17.9641 6.75943 18.4658 7.03796 18.8525C7.31872 19.2422 7.77102 19.4749 8.24797 19.4749H8.24804C8.45434 19.4749 8.65599 19.4324 8.84724 19.3487L12.6372 17.6907C12.775 17.6305 12.8986 17.542 13 17.4309L24.1322 5.24361C25.2906 3.97548 25.2012 2.00132 23.9327 0.842548ZM9.34275 16.7855L10.1109 14.4829L10.1756 14.412L11.6314 15.7416L11.5666 15.8126L9.34275 16.7855ZM22.5449 3.79376L13.0813 14.1545L11.6255 12.8248L21.0891 2.46401C21.2742 2.26137 21.5275 2.14972 21.8024 2.14972C22.0436 2.14972 22.2745 2.23944 22.4532 2.40267L22.4832 2.43012C22.8762 2.78905 22.9039 3.40079 22.5449 3.79376Z" fill="black" />
              <path class="box" d="M21.7731 9.91657C21.1795 9.91657 20.6982 10.3978 20.6982 10.9914V20.1168C20.6982 21.624 19.4719 22.8503 17.9647 22.8503H4.93744C3.43013 22.8503 2.20392 21.624 2.20392 20.1168V7.19538C2.20392 5.68813 3.4302 4.46186 4.93744 4.46186H14.3666C14.9602 4.46186 15.4415 3.98061 15.4415 3.387C15.4415 2.79339 14.9602 2.31213 14.3666 2.31213H4.93744C2.24477 2.31213 0.0541992 4.50277 0.0541992 7.19538V20.1167C0.0541992 22.8093 2.24484 25 4.93744 25H17.9646C20.6572 25 22.8479 22.8093 22.8479 20.1167V10.9914C22.8479 10.3978 22.3667 9.91657 21.7731 9.91657Z" fill="black" />
            </svg>
          </button>
        </section>
      </div>
    </div>

    <?php

    // Affichage du message d'érreur si $result !== ""

    if ($result !== '') {
      //Affichage du message $result dans le cas ou il est = à 0
      display_message_url($result, 0);
    }
    ?>

    <label id="app-validate" class="order order--profile hide" for="validate">
      Valider
      <button class="order__button" id="validate" name="validate">
        <img src="assets/images/right-arrow.svg" alt="Valider">
      </button>
    </label>
  </form>


  <script src="assets/scripts/update.js"></script>
  </body>

  </html>

<?php

}

?>