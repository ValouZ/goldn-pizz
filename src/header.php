<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil - Goldn Pizz'</title>
  <link rel="shortcut icon" href="assets/favicon/pizza.svg" type="image/x-icon">
  <link rel="stylesheet" href="styles/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Oswald:wght@300;400;700&display=swap"
    rel="stylesheet">
</head>

<body>
  <?php
  if(isset($_SESSION['id'])&& isset($_SESSION['pseudo'])){
  ?>
  <header class="menu">
    <nav>
      <ul>
        <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
        <li><a href="basket.php">Panier</a></li><!-- temporaire pour navigation -->
        <li><a href="profile.php">Profil</a></li><!-- temporaire pour navigation -->
        <li><a href="sign-out.php">Déconnexion</a></li>
      </ul>
    </nav>
  </header>
  <?php
  }
  else
  {
  ?>
  <header class="menu">
    <nav>
      <ul>
        <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
        <li><a href="basket.php">Panier</a></li>
        <li><a href="sign-up.php">Inscription</a></li>
        <li><a href="sign-in.php">Connexion</a></li>
    </nav>
  </header>
  <?php
}


?>
  <h1 class="goldn-pizz"><a href="index.php">Goldn Pizz'</a></h1>