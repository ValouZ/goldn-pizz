<?php
$title = "Panier";
$menu = "2";
$totalProducts = 0;
$deliveryFees = 2.50;
$serviceFees = 1.50;
$totalOfAllTheFuckingTotal;
include('header.php');
include('traitement/pdo.php');

$req_pizza = $bdd->prepare('SELECT * FROM panier INNER JOIN pizza ON panier.id_pizza = pizza.id_pizza WHERE panier.id_client = ?');
$req_pizza->execute(array($_SESSION['id']));
$resultats_pizza = $req_pizza->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="basket">
  <h2 class="page-title basket-title main-title">Mon panier</h2>

  <div class="basket-content">
    <section class="basket-products">

      <?php
      foreach ($resultats_pizza as $pizza) {
        $price = $pizza['prix_pizza'] * $pizza['nbr_pizza'];
        $totalProducts += $price;
      ?>
        <div class="basket-card">
          <img class='product' src="<?= $pizza['image1'] ?>" alt="<?= $pizza['alt1'] ?>">
          <div class="content">
            <h3 class="pizza-name" id="<?= $pizza['id_pizza'] ?>"><?= $pizza['nom_pizza'] ?></h3>
            <p class="size">Taille M</p>
            <p class="price" id="app-price"><?= $price ?> <span>€</span></p>
          </div>
          <div class="quantity">
            <button class="app-remove"><img src="assets/images/remove.svg" alt="Remove"></button>
            <p><?= $pizza['nbr_pizza'] ?></p>
            <button class="app-add"><img src="assets/images/add.svg" alt="Add"></button>
          </div>
        </div>
      <?php
      }
      $totalOfAllTheFuckingTotal = $totalProducts + $deliveryFees + $serviceFees;
      ?>
    </section>

    <div class="conclude">
      <section class="price-review">
        <div class="price-review__item product-review">
          <h4>Total des produits :</h4>
          <p class="price"><?= $totalProducts ?> <span>€</span></p>
        </div>
        <div class="price-review__item delivery-fees">
          <h4>Frais de livraisons :</h4>
          <p class="price"><?= $deliveryFees ?> <span>€</span></p>
        </div>
        <div class="price-review__item service-fees">
          <h4>Frais de services :</h4>
          <p class="price"><?= $serviceFees ?> <span>€</span></p>
        </div>
        <div class="price-review__item total">
          <h4>Total :</h4>
          <p class="price"><?= $totalOfAllTheFuckingTotal ?> <span>€</span></p>
        </div>
      </section>

      <label class="order order--basket" for="order">
        Commander
        <button class="order__button" id="order">
          <img src="assets/images/right-arrow.svg" alt="Commander">
        </button>
      </label>
    </div>
  </div>
</div>


<script src="scripts/ajax-basket.js"></script>
</body>

</html>