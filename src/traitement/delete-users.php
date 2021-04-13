<?php

include_once('pdo.php');

$id = $_GET['id'];

// On supprime de la table client le client ayant l'id voulu
$reqDelete = $bdd->prepare('DELETE FROM client WHERE id_client =?');
$reqDelete->execute(array($id));

header('location:../admin.php');
exit();
