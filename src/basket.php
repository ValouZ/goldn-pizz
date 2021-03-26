<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panier - Goldn Pizz'</title>
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

  <div class="basket">
    <h2 class="page-title basket-title main-title">Mon panier</h2>

    <div class="basket-content">
      <section class="basket-products">
        <div class="basket-card">
          <img class='product' src="assets/images/pizza-placeholder.jpg" alt="Placeholder">
          <div class="content">
            <h3 class="pizza-name">Goldn Marg'</h3>
            <p class="size">Taille M</p>
            <p class="price">13.80 <span>€</span></p>
          </div>
          <div class="quantity">
            <button><img src="assets/images/remove.svg" alt="Remove"></button>
            <p>1</p>
            <button><img src="assets/images/add.svg" alt="Add"></button>
          </div>
        </div>
        <div class="basket-card">
          <img class='product' src="assets/images/pizza-placeholder.jpg" alt="Placeholder">
          <div class="content">
            <h3 class="pizza-name">Goldn Marg'</h3>
            <p class="size">Taille M</p>
            <p class="price">27.60 <span>€</span></p>
          </div>
          <div class="quantity">
            <button><img src="assets/images/remove.svg" alt="Remove"></button>
            <p>2</p>
            <button><img src="assets/images/add.svg" alt="Add"></button>
          </div>
        </div>
        <div class="basket-card">
          <img class='product' src="assets/images/pizza-placeholder.jpg" alt="Placeholder">
          <div class="content">
            <h3 class="pizza-name">Goldn Marg'</h3>
            <p class="size">Taille S</p>
            <p class="price">12.00 <span>€</span></p>
          </div>
          <div class="quantity">
            <button><img src="assets/images/remove.svg" alt="Remove"></button>
            <p>1</p>
            <button><img src="assets/images/add.svg" alt="Add"></button>
          </div>
        </div>
        <div class="basket-card">
          <img class='product' src="assets/images/pizza-placeholder.jpg" alt="Placeholder">
          <div class="content">
            <h3 class="pizza-name">Goldn Marg'</h3>
            <p class="size">Taille L</p>
            <p class="price">14.90 <span>€</span></p>
          </div>
          <div class="quantity">
            <button><img src="assets/images/remove.svg" alt="Remove"></button>
            <p>1</p>
            <button><img src="assets/images/add.svg" alt="Add"></button>
          </div>
        </div>
      </section>

      <div class="conclude">
        <section class="price-review">
          <div class="price-review__item product-review">
            <h4>Total des produits :</h4>
            <p class="price">54.90 <span>€</span></p>
          </div>
          <div class="price-review__item delivery-fees">
            <h4>Frais de livraisons :</h4>
            <p class="price">2.50 <span>€</span></p>
          </div>
          <div class="price-review__item service-fees">
            <h4>Frais de services :</h4>
            <p class="price">1.50 <span>€</span></p>
          </div>
          <div class="price-review__item total">
            <h4>Total :</h4>
            <p class="price">58.90 <span>€</span></p>
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



</body>

</html>