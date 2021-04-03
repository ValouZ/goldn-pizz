<?php
$option = [
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
  $bdd = new PDO('mysql:host=localhost;dbname=goldnpizz;','root','', $option);
}catch(PDOException $e){
  echo 'Echeec lors de la connexion' . $e->getMessage(); 
}
?>