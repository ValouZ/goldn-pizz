<?php
//Inclusion de variables / pdo
include_once("traitement/variables.php");
include_once("traitement/pdo.php");

$info = $header_info[0]; // Voir variables.php
include_once('header.php');

// requête pour avoir toutes les informations de la table pizza
$req = $bdd->prepare('SELECT * FROM pizza');
// On éxécute la requête
$req->execute();
// On met le résultat de la requête dans un tableau
$resultats = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="searchbar" aria-label="Barre de recherche">
  <label for="search">
    <img src="assets/images/rechercher.svg" alt="Rechercher">
  </label>
  <input type="text" id='app-search-bar' placeholder="Rechercher">
</section>



<section class="cards">
  <?php
  // Parcours le tableau $resultats pour nous permettre d'afficher toutes les pizzas
  foreach ($resultats as $pizza) {
  ?>
    <a class="card" href="product-page.php?id=<?= $pizza['id_pizza']?>">
      <img src="<?= $pizza['image1'] ?>" alt="<?= $pizza['alt'] ?>">
      <div class="content">
        <h2 class="pizza-name"><?= $pizza['nom_pizza'] ?></h2>
        <p class="description"><?= $pizza['description_pizza'] ?></p>
        <p class="price"><?= $pizza['prix_pizza'] ?><span> € </span></p>
      </div>
    </a>
  <?php
  }
  ?>
</section>

<script src="assets/scripts/searchbar.js"></script>
</body>

</html>