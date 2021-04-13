<?php
session_start();
include_once('pdo.php');

extract($_POST);
$idClient = $_SESSION['id'];

// Récupère toutes les lignes ayant l'id_client et l'id_pizza choisi
$reqPizzaExist = $bdd->prepare("SELECT * FROM panier WHERE id_client = ? AND id_pizza = ?");
$reqPizzaExist->execute(array($idClient, $idPizza));
$pizzaExist = $reqPizzaExist->rowCount(); // On compte le nombre de ligne (retourne 0 ou 1)

if ($pizzaExist == 0) {
  // Il n'y a pas de résultat à la requete
  // Ajouter une nouvelle pizza dans la table
  $reqPanier = $bdd->prepare('INSERT INTO panier (id_client, id_pizza, prix_pizza, nbr_pizza) VALUES (?, ?, ?, 1)');
  $reqPanier->execute(array($idClient, $idPizza, $prixPizza));
} else {
  // Il existe cette pizza dans la table
  // Modifier nbr_pizza dans la ligne spécifique à cette pizza
  $result = $reqPizzaExist->fetch(PDO::FETCH_ASSOC);
  $nbr_pizza = $result['nbr_pizza'] + $operation; // On ajoute ou enleve 1 pizza ($operation = -1 ou 1)

  if ($nbr_pizza === 0) {
    // Si le nombre de pizza est 0, on supprime la ligne de la base
    $reqPanier = $bdd->prepare('DELETE FROM panier WHERE id_client = ? AND id_pizza = ?');
    $reqPanier->execute(array($idClient, $idPizza));
  } else {
    // Sinon, on met à jour le nombre de pizza
    $reqPanier = $bdd->prepare('UPDATE panier SET nbr_pizza = ? WHERE id_client = ? AND id_pizza = ?');
    $reqPanier->execute(array($nbr_pizza, $idClient, $idPizza));
  }
}
