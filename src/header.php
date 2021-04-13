<?php
session_start();
include_once('traitement/pdo.php');

$count_pizza = 0;
if (count($_SESSION) > 0 and isset($_SESSION['id'])) {
  $req_pizza = $bdd->prepare('SELECT * FROM panier WHERE id_client = ?');
  $req_pizza->execute(array($_SESSION['id']));
  $pizzas = $req_pizza->fetchAll(PDO::FETCH_ASSOC);
  foreach ($pizzas as $item) {
    $count_pizza += $item['nbr_pizza'];
  }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?= $info[0] ?> - Goldn Pizz'</title>
  <link rel="shortcut icon" href="assets/favicon/pizza.svg" type="image/x-icon">
  <link rel="stylesheet" href="assets/styles/main.css">
  <script src="assets/scripts/basket-icon.js" defer></script>
</head>

<body>
  <header class="menu">
    <nav>
      <ul class="list-items">
        <?php
        if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
          if ($info[1] == 1) {
        ?>
            <li class="home"><a href="admin.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
            <li><a href="logout.php">Deconnexion</a></li>
      </ul>
    <?php
          } elseif ($info[1] == 2) { // Menu général en mode client
    ?>
      <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
      <li>
        <a href="basket.php">
          <img src="assets/images/basket.svg" alt="Panier">
          <span class="basket-counter"><?= $count_pizza ?></span>
        </a>
      </li>
      <li><a href="profile.php"><img src="assets/images/user.svg" alt="Profil"></a></li>
      <li><a href="logout.php"><img src="assets/images/logout.svg" alt="Déconnexion"></a></li>
    <?php
          }
        } else {
          if ($info[1] == 1) { // Menu page de connexion et inscription
    ?>
      <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
    <?php
          } elseif ($info[1] == 2) { // Menu général en mode visiteur
    ?>
      <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
      <li><a href="sign-in.php">Connexion</a></li>
      <li><a href="sign-up.php">Inscription</a></li>
  <?php
          }
        }
  ?>
  </ul>
    </nav>
  </header>
  <h1 class="goldn-pizz"><a href="index.php">Goldn Pizz'</a></h1>