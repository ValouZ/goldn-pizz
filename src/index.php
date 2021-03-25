<?php 
include("traitement/pdo.php");

$req = $bdd->query('SELECT * FROM pizza');

$resultats = $req->fetchAll(PDO::FETCH_ASSOC);
// foreach ($resultats as $pizza) {
//     echo $pizza['nom_pizza'] . '<br>';
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - Goldn Pizz'</title>
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
        <li><a href="basket.php">Panier</a></li><!-- temporaire pour navigation -->
        <li><a href="sign-up.php">Inscription</a></li>
        <li><a href="sign-in.php">Connexion</a></li>
        <li><a href="profile.php">Profil</a></li><!-- temporaire pour navigation -->
      </ul>
    </nav>
  </header>
  <h1 class="goldn-pizz"><a href="index.php">Goldn Pizz'</a></h1>

  <section class="searchbar" aria-label="Barre de recherche">
    <label for="search">
      <img src="assets/images/rechercher.svg" alt="Rechercher">
    </label>
    <input type="text" id='search' placeholder="Rechercher">
  </section>



  <section class="cards">
    <?php
    foreach ($resultats as $pizza) {  
    ?>
    <a class="card" href="product-page.php?id='<?= $pizza['id_pizza']?>'">
      <img src="<?=$pizza['image1']?>" alt="<?=$pizza['alt1']?>">
      <div class="content">
        <h2 class="pizza-name"><?=$pizza['nom_pizza']?></h2>
        <p class="description"><?=$pizza['description_pizza']?></p>
        <p class="price"><?=$pizza['prix_pizza']?><span>€</span></p>
      </div>
    </a>
    <?php
  }
  ?>

  </section>
</body>

</html>