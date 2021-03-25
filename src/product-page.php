<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Goldn Marg' - Goldn Pizz'</title>
  <link rel="shortcut icon" href="assets/favicon/pizza.svg" type="image/x-icon">
  <link rel="stylesheet" href="styles/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Oswald:wght@300;400;700&display=swap"
    rel="stylesheet">
</head>

<body class="product-background">
  <header class="menu">
    <nav>
      <ul>
        <li class="home"><a href="index.html"><img src="assets/images/home.svg" alt="Accueil"></a></li>
        <li><a href="basket.html">Panier</a></li><!-- temporaire pour navigation -->
        <li><a href="sign-up.html">Inscription</a></li>
        <li><a href="sign-in.html">Connexion</a></li>
        <li><a href="profile.html">Profil</a></li><!-- temporaire pour navigation -->
      </ul>
    </nav>
  </header>
  <h1 class="goldn-pizz only-desktop"><a href="index.html">Goldn Pizz'</a></h1>

  <section class="background-info">
    <img src="assets/images/pizza-placeholder.jpg" alt="Placeholder" class="pizza">
    <h1>Goldn Marg'</h1>
    <div class="choice">
      <section class="pizza-size" id="app-pizza-size" aria-label="Choix des tailles de pizza">
        <button>S</button>
        <button class="active">M</button>
        <button>L</button>
      </section>

      <section class="price-component" aria-label="Choisir la quantité">
        <p class="price" id="app-price">13.80 <span>€</span></p>
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
          <div class="item">
            <img src="assets/images/pizza-placeholder.jpg" alt="placeholder">
            <p>Sauce tomate</p>
          </div>
          <div class="item">
            <img src="assets/images/pizza-placeholder.jpg" alt="placeholder">
            <p>Jambon</p>
          </div>
          <div class="item">
            <img src="assets/images/pizza-placeholder.jpg" alt="placeholder">
            <p>Mozzarrella</p>
          </div>
          <div class="item">
            <img src="assets/images/pizza-placeholder.jpg" alt="placeholder">
            <p>Mozzarrella</p>
          </div>
          <div class="item">
            <img src="assets/images/pizza-placeholder.jpg" alt="placeholder">
            <p>Mozzarrella</p>
          </div>
        </div>
      </section>

      <section class="description">
        <h2>Description</h2>
        <p>At the time this article was written, the Wii News Channel had not yet been launched, but a placeholder icon
          is
          shown on the Wii main menu.
          At the time this article was written, the Wii News Channel had not yet been launched, but a placeholder icon
          is
          shown on the Wii main menu.</p>
      </section>
    </div>
  </section>

  <script src="scripts/pizza-size.js"></script>
  <script src="scripts/number-pizza.js"></script>
</body>

</html>