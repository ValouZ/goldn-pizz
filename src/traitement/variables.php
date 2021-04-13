<?php
$regxr = '~^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[$%?!]).{10,20}$~u';

// Tableau contenant les Titre des pages et le type de menu à afficher
$header_info = [
  ["Accueil", 2],
  ["Profil", 2],
  ["Se connecter", 1],
  ["S'inscrire", 1],
  ['Panier', 2],
  ['Validé', 2],
  ['Admin', 1]
];
