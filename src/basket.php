<?php
$title = "Panier";
$menu = "2";
include('header.php');
?>
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