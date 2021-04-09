<?php
$title = "Accueil";
$menu = "2";
include("traitement/pdo.php");
include('header.php');

$req = $bdd->query('SELECT * FROM pizza');
$resultats = $req->fetchAll(PDO::FETCH_ASSOC);
?>

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
    <a class="card" href="product-page.php?id=<?= $pizza['id_pizza']?>">
      <img src="<?= $pizza['image1'] ?>" alt="<?= $pizza['alt1'] ?>">
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
</body>

</html>