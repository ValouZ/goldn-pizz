<?php
include_once("traitement/variables.php");

$info = $header_info[5]; // Voir variables.php
include_once('header.php');

$deliveryTime = rand(12, 50);
?>

<section class="validated-basket">
  <h2>Merci pour votre commande</h2>
  <p>Temps de livraison estimé : entre <?= $deliveryTime ?> et <?= $deliveryTime + 10 ?> minutes. </p>
  <p>Nous (ne) vous avons (pas) envoyé un email de confirmation de votre commande.</p>
</section>

<section class="other-option">
  <a class="back-to-index" href="index.php">Retourner à l'accueil</a>
</section>