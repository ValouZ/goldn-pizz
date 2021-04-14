<?php
session_start();
//Inclusion de functions / pdo
include_once('traitement/pdo.php');
include_once('traitement/functions.php');

// $count_pizza sert à compter le nombre d'article dans le panier, il se trouve dans la nav
$count_pizza = 0;

// Si nous sommes connecté alors :
if (count($_SESSION) > 0 and isset($_SESSION['id'])) {
  // On stock l'id du client
  $idClient = $_SESSION['id'];
  // Requete pour tout récupérer du panier pour le client connecté
  $req_pizza = $bdd->prepare('SELECT * FROM panier WHERE id_client = ?');
  // On execute la requete
  $req_pizza->execute(array($idClient));
  // On stock les données dans un tableau 
  $pizzas = $req_pizza->fetchAll(PDO::FETCH_ASSOC);
  // Permet de parcourir le tableau $pizzas
  foreach ($pizzas as $item) {
    // On augmente le compteur de pizzas
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
</head>

<body>
  <header class="menu">
    <nav>
      <ul class="list-items">
        <?php
        // Si l'utilisateur est connecté en admin on affiche cette nav
        if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
          if ($info[1] == 1) {
        ?>
            <li class="home"><a href="admin.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
            <li><a href="traitement/logout.php"><img src="assets/images/logout.svg" alt="Déconnexion"></a></li>
      </ul>
    <?php
          } elseif ($info[1] == 2) { // Menu général en mode client connecté
    ?>
      <li class="home"><a href="index.php"><img src="assets/images/home.svg" alt="Accueil"></a></li>
      <li>
        <a href="basket.php">
          <img src="assets/images/basket.svg" alt="Panier">
          <span class="basket-counter"><?= $count_pizza ?></span>
        </a>
      </li>
      <li><a href="profile.php"><img src="assets/images/user.svg" alt="Profil"></a></li>
      <li><a href="traitement/logout.php"><img src="assets/images/logout.svg" alt="Déconnexion"></a></li>
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
  <h1 class="goldn-pizz"><a href="<?= role_link() ?>">Goldn Pizz'</a></h1>

  <?php
  // Si on est pas sur la page admin.php et qu'on est connecté comme admin, on redirige sur admin.php
  if (count($_SESSION) > 0 and $info[0] != 'Admin') {
    is_admin();
  }
  ?>