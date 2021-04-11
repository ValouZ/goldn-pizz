<?php
session_start();
include_once('pdo.php');

extract($_POST);
$idClient = $_SESSION['id'];
var_dump($idPizza);

$reqPizzaExist = $bdd->prepare("SELECT * FROM panier WHERE id_client = ? AND id_pizza = ?");
$reqPizzaExist->execute(array($idClient, $idPizza)); // $idPizza
$pizzaExist = $reqPizzaExist->rowCount();

if ($pizzaExist == 0) {
  echo 'creation';
  // Ajouter une pizza dans la table si elle n'existe pas encore
  $reqPanier = $bdd->prepare('INSERT INTO panier (id_client, id_pizza, prix_pizza, nbr_pizza) VALUES (?, ?, ?, 1)');
  $reqPanier->execute(array($idClient, $idPizza, $prixPizza));
} else {
  
  // Modifier le nombre de pizza avec un id spécifique
  $result = $reqPizzaExist->fetch(PDO::FETCH_ASSOC);
  $nbr_pizza = $result['nbr_pizza'] + $operation; // On ajoute ou enleve 1 pizza

  if ($nbr_pizza === 0) {
    echo 'suppression';
    // Si le nombre de pizza est 0, on supprime la ligne de la base
    $reqPanier = $bdd->prepare('DELETE FROM panier WHERE id_client = ? AND id_pizza = ?');
    $reqPanier->execute(array($idClient, $idPizza));
  } else {
    echo 'mise a jour';
    // Sinon, on met à jour
    $reqPanier = $bdd->prepare('UPDATE panier SET nbr_pizza = ? WHERE id_client = ? AND id_pizza = ?');
    $reqPanier->execute(array($nbr_pizza, $idClient, $idPizza));
  }
}
