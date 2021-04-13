<?php

session_start();
//Inclusion de pdo
include('pdo.php');

// Si le bouton valider est cliqué
if (isset($_POST['validate'])) {
  
  
  $nomPizza = htmlspecialchars($_POST['nom-pizza']);
  $prixPizza = htmlspecialchars($_POST['prix-pizza']);
  $idPizza = htmlspecialchars($_POST['id-pizza']);
  $descriPizza = htmlspecialchars($_POST['descri-pizza']);

   // On vérife que tous les champs soient bien remplis
  if (!empty($_POST['nom-pizza']) AND !empty($_POST['prix-pizza']) AND !empty($_POST['descri-pizza'])) {
    // Vérification que le prix de la pizza soit bien en float
    if (filter_var($prixPizza, FILTER_VALIDATE_FLOAT)) {
      // Requête permettant de mettre a jour la table pizza ou l'id pizza est celle que l'on a selectionné
      $req = $bdd->prepare('UPDATE pizza SET nom_pizza = ?, prix_pizza = ?, description_pizza = ? WHERE id_pizza = ?');
      // On execute la requête
      $req->execute(array($nomPizza, $prixPizza,$descriPizza, $idPizza));
      // Redirection vers la page admin
      header('location:../admin.php');
      exit();
    }
  }
} else {
  // Redirection vers la page admin en affichant une erreur
  header('location:../admin.php?error=0');
}
