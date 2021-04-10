<?php
// session_start();
$menu = "2";
$idPizzaUrl = $_GET['id'];
include("traitement/pdo.php");

$req_pizza = $bdd->prepare('SELECT * FROM pizza WHERE id_pizza = ?');
$req_pizza->execute(array($idPizzaUrl));
$resultats_pizza = $req_pizza->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultats_pizza as $pizza) {
  $title = $pizza['nom_pizza'];
  include('header.php');

  $req_ingredient = $bdd->prepare('SELECT * FROM ingredient INNER JOIN pizza_ingredient ON ingredient.id_ingredient = pizza_ingredient.id_ingredient INNER JOIN pizza ON pizza_ingredient.id_pizza = pizza.id_pizza WHERE pizza.id_pizza = ?');
  $req_ingredient->execute(array($idPizzaUrl));
  $resultats_ingredient = $req_ingredient->fetchAll(PDO::FETCH_ASSOC);

  $resultat_panier = null;
  if (count($_SESSION) > 0 and isset($_SESSION['id'])) {
    // Permet de vérifier si l'on est connecté
    $req_panier = $bdd->prepare('SELECT * FROM panier WHERE id_pizza = ? AND id_client = ?');
    $req_panier->execute(array($idPizzaUrl, $_SESSION['id']));
    $resultat_panier = $req_panier->fetch(PDO::FETCH_ASSOC);
  }
?>

  <main class="product-background">
    <section class="background-info">
      <img src="<?= $pizza['image1'] ?>" alt="<?= $pizza['alt1'] ?>" class="pizza">
      <h1><?= $pizza['nom_pizza'] ?></h1>
      <div class="choice">
        <section class="pizza-size" id="app-pizza-size" aria-label="Choix des tailles de pizza">
          <button>S</button>
          <button class="active">M</button>
          <button>L</button>
        </section>

        <section class="price-component" aria-label="Choisir la quantité">
          <p class="price" id="app-price"><?= $pizza['prix_pizza'] ?><span> € </span></p>
          <div class="quantity">
            <button id="app-remove"><img src="assets/images/remove.svg" alt="Remove" class="remove"></button>
            <p id="app-quantity"><?php
                                  if ($resultat_panier) {
                                    echo $resultat_panier["nbr_pizza"];
                                  } else {
                                    echo 0;
                                  }
                                  ?></p>
            <button id="app-add"><img src="assets/images/add.svg" alt="Add" class="add"></button>
          </div>
        </section>
        <?php if (count($_SESSION) === 0) { ?>
          <!-- Si l'on n'est pas connecté, on demande à l'utilisateur de le faire pour pouvoir commander -->
          <section class="disconnected">Pensez à vous connecter pour ajouter des produits à votre panier</section>
        <?php } ?>
      </div>

      <div class="info">
        <section class="ingredients">
          <h2>Ingrédients</h2>

          <div class="items">
            <?php
            foreach ($resultats_ingredient as $ingredient) {
            ?>
              <div class="item">
                <img src="<?= $ingredient['img_ingredient'] ?>" alt="<?= $ingredient['alt'] ?>">
                <p><?= $ingredient['nom_ingredient'] ?></p>
              </div>
            <?php } ?>
          </div>
        </section>

        <section class="description">
          <h2>Description</h2>
          <p><?= $pizza['description_pizza'] ?></p>
        </section>
      </div>
    </section>
  </main>
<?php
};
?>

<script src="assets/scripts/pizza-size.js"></script>
<script src="assets/scripts/number-pizza.js"></script>
<script src="assets/scripts/ajax-product.js"></script>
</body>

</html>