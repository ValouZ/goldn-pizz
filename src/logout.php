<?php
session_start();

include_once('traitement/functions.php');

access_denied();

session_destroy();
header('location:index.php');
