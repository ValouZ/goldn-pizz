<?php

include_once('pdo.php');

$id = $_GET['id'];
var_dump($id);

// $reqDeletePizzaIngredient = $bdd->prepare('DELETE FROM pizza_ingredient WHERE id_pizza =?');
// $reqDeletePizzaIngredient->execute(array($id));

// On supprime de la table pizza la pizza ayant l'id voulu (PLZ NE PAS FAIRE ON AIME NOS PIZZA)
$reqDeletePizza = $bdd->prepare('DELETE FROM pizza WHERE id_pizza =?');
$reqDeletePizza->execute(array($id));

// header('location:../admin.php');
// exit();
