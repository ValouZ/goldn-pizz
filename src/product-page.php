<?php 

$menu = "2";
include("traitement/pdo.php");


$req_pizza = $bdd->query('SELECT * FROM pizza WHERE id_pizza = '.$_GET['id']);

$req_ingredient = $bdd->query('SELECT * FROM ingredient INNER JOIN pizza_ingredient ON ingredient.id_ingredient = pizza_ingredient.id_ingredient INNER JOIN pizza ON pizza_ingredient.id_pizza = pizza.id_pizza WHERE pizza.id_pizza ='.$_GET['id']);


$resultats_pizza = $req_pizza->fetchAll(PDO::FETCH_ASSOC);

//faire un prepare = url rewriting
$resultats_ingredient = $req_ingredient->fetchAll(PDO::FETCH_ASSOC);



?>




<?php
foreach ($resultats_pizza as $pizza) {
  $title = $pizza['nom_pizza'];

  include('header.php');
?>

  <section class="background-info">
    <img src="<?= $pizza['image1']?>" alt="<?= $pizza['alt1']?>" class="pizza">
    <h1><?= $pizza['nom_pizza']?></h1>
    <div class="choice">
      <section class="pizza-size" id="app-pizza-size" aria-label="Choix des tailles de pizza">
        <button>S</button>
        <button class="active">M</button>
        <button>L</button>
      </section>

      <section class="price-component" aria-label="Choisir la quantité">
        <p class="price" id="app-price"><?= $pizza['prix_pizza']?><span>€</span></p>
        <div class="quantity">
          <button id="app-remove"><img src="assets/images/remove.svg" alt="Remove" class="remove"></button>
          <p id="app-quantity">0</p>
          <button id="app-add"><img src="assets/images/add.svg" alt="Add" class="add"></button>
        </div>
      </section>
    </div>
    
    <div class="info">
      <section class="ingredients">
        <h2>Ingrédients</h2>
        
        <div class="items">
        <?php
          foreach($resultats_ingredient as $ingredient ){
        ?>
          <div class="item">
            <img src="<?=$ingredient['img_ingredient']?>" alt="<?=$ingredient['alt']?>">
            <p><?=$ingredient['nom_ingredient']?></p>
          </div>
          <?php }?>
        </div>
      </section>

      <section class="description">
        <h2>Description</h2>
        <p><?= $pizza['description_pizza'] ?></p>
      </section>
    </div>
  </section>
  <?php
  };
  ?>

  <script src="scripts/pizza-size.js"></script>
  <script src="scripts/number-pizza.js"></script>
</body>

</html>