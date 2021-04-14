<?php

// Récupération de l'id de la pizza dans l'url grace a la méthode GET
$idPizzaUrl = $_GET['id'];
//Inclusion de  pdo
include("traitement/pdo.php");

// Requete pour avoir toute les informations des pizza ou id_pizza = à l'id qu'on récupère plus haut
$req_pizza = $bdd->prepare('SELECT * FROM pizza WHERE id_pizza = ?');
$req_pizza->execute(array($idPizzaUrl));
// On fait un fetch all pour récupérer toute les pizzas de notre base
$resultats_pizza = $req_pizza->fetchAll(PDO::FETCH_ASSOC);

// Foreach permet de parcourir le tableau $resultats_pizza
foreach ($resultats_pizza as $pizza) {
  // On n'utilise pas la variable du fichier variables.php car on génère un nom différent pour chaque pizza
  $info = [$pizza['nom_pizza'], 2];
  include_once('header.php');

  // Requete pour sélectionner tout les ingrédients. Nous faisons un inner join pour faire la relation entre ingrédient et ingrédient_pizza pour récupérer les ingrédients qui correspondent à l'id pizza.
  $req_ingredient = $bdd->prepare('SELECT * FROM ingredient INNER JOIN pizza_ingredient ON ingredient.id_ingredient = pizza_ingredient.id_ingredient INNER JOIN pizza ON pizza_ingredient.id_pizza = pizza.id_pizza WHERE pizza.id_pizza = ?');
  $req_ingredient->execute(array($idPizzaUrl));
  //Récupérer tout les ingrédients dans un tableau
  $resultats_ingredient = $req_ingredient->fetchAll(PDO::FETCH_ASSOC);

  $resultat_panier = null;
  // Permet de vérifier si l'on est connecté
  if (count($_SESSION) > 0 and isset($_SESSION['id'])) {
    // Requete pour récupérer les informations du panier ou il y a l'id_pizza de la pizza choisi et l'id du client connecté
    $req_panier = $bdd->prepare('SELECT * FROM panier WHERE id_pizza = ? AND id_client = ?');
    $req_panier->execute(array($idPizzaUrl, $_SESSION['id']));
    //Récupérer toutes les informations du panier ou il y a l'id_pizza = a la pizza choisi + l'id du client connecté  dans un tableau
    $resultat_panier = $req_panier->fetch(PDO::FETCH_ASSOC);
  }
?>

  <main class="product-background">
    <section class="background-info">
      <a href="index.php" class="back-to-index"><img src="assets/images/arrow.svg" alt="Retour en arrière"></a>
      <div class="images">
        <!-- Affichage des images et des alts de la pizza choisi -->
        <img src="<?= $pizza['image1'] ?>" alt="<?= $pizza['alt'] ?>" class="pizza">
        <img src="<?= $pizza['image2'] ?>" alt="<?= $pizza['alt'] ?>" class="pizza">
        <img src="<?= $pizza['image3'] ?>" alt="<?= $pizza['alt'] ?>" class="pizza">
      </div>
      <!-- affichage du nom de la pizza choisi -->
      <h1><?= $pizza['nom_pizza'] ?></h1>
      <div class="choice">
        <section class="pizza-size" id="app-pizza-size" aria-label="Choix des tailles de pizza">
          <button>S</button>
          <button class="active">M</button>
          <button>L</button>
        </section>

        <section class="price-component" aria-label="Choisir la quantité">
          <!-- Affichage du prix de la pizza choisi -->
          <p class="price" id="app-price"><?= $pizza['prix_pizza'] ?><span> € </span></p>
          <div class="quantity">
            <button id="app-remove"><img src="assets/images/remove.svg" alt="Remove" class="remove"></button>
            <p id="app-quantity"><?php
                                  // si le panier est rempli alors on affiche le nombre de pizza ajouté sinon on affiche 0
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
            // Parcours le tableau $resultats_ingredient pour afficher les ingrédients qui correspondent à la pizza choisi
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
  // fin du foreach
};
?>
<?php if (count($_SESSION) > 0) { ?>
  <!-- Si on est connecté -->
  <script src="assets/scripts/number-pizza.js"></script>
<?php } ?>
<script src="assets/scripts/pizza-size.js"></script>
<script src="assets/scripts/ajax-product.js"></script>
<script src="assets/scripts/swap-image.js"></script>
</body>

</html>