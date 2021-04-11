<?php

include_once('pdo.php');

$id = $_GET['id'];

$reqDelete = $bdd->prepare('DELETE FROM client WHERE id_client =?');
$reqDelete->execute(array($id));

header('location:../admin.php');





?>