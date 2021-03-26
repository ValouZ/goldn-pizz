<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Se connecter - Goldn Pizz'</title>
  <link rel="shortcut icon" href="assets/favicon/pizza.svg" type="image/x-icon">
  <link rel="stylesheet" href="styles/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Oswald:wght@300;400;700&display=swap"
    rel="stylesheet">
</head>

<body>
  <header class="menu">
    <nav>
      <ul>
        <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
      </ul>
    </nav>
  </header>

  <h1 class="goldn-pizz"><a href="index.php">Goldn Pizz'</a></h1>

  <h2 class="page-title main-title">Content de te revoir</h2>

  <form class="form" method="post" action="traitement/connexion-traitement.php">
    <section class="form__content" aria-label="Formulaire de connexion">
      <div class="sign-in-form">
        <input type="text" placeholder="Pseudo" name="pseudo" required>
        <input type="password" placeholder="Mot de passe" name="password" required>
      </div>
      <div class="show-checkbox">
        <input type="checkbox" id="show-pswd">
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
</body>

</html>