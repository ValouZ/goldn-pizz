<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?= $title ?> - Goldn Pizz'</title>
  <link rel="shortcut icon" href="assets/favicon/pizza.svg" type="image/x-icon">
  <link rel="stylesheet" href="assets/styles/main.css">
</head>

<body>
  <?php
  if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {


    if ($menu == "1") {
  ?>
      <header class="menu">
        <nav>
          <ul>
            <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
            <li><a href="sign-out.php">Deconnexion</a></li>
          </ul>
        </nav>
      </header>
    <?php
    } elseif ($menu == "2") {
      // Menu général en mode client
    ?>
      <header class="menu">
        <nav>
          <ul>
            <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
            <li><a href="basket.php">Panier</a></li>
            <li><a href="profile.php">Profil</a></li>
            <li><a href="sign-out.php">Deconnexion</a></li>
          </ul>
        </nav>
      </header>
    <?php
    }
  } else {
    if ($menu == "1") {
      // Menu page de connexion et inscription
    ?>
      <header class="menu">
        <nav>
          <ul>
            <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
          </ul>
        </nav>
      </header>
    <?php
    } elseif ($menu == "2") {
      // Menu général en mode visiteur
    ?>
      <header class="menu">
        <nav>
          <ul>
            <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
            <li><a href="sign-in.php">Connexion</a></li>
            <li><a href="sign-up.php">Inscription</a></li>
          </ul>
        </nav>
      </header>
  <?php
    }
  }
  ?>
  <h1 class="goldn-pizz"><a href="index.php">Goldn Pizz'</a></h1>