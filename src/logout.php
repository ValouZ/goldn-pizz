<?php
session_start();

include('traitement/functions.php');

access_denied();

session_destroy();
header('location:index.php');
