<?php
session_start();

include_once('functions.php');

access_denied();
// On détruit la session
session_destroy();
header('location:../index.php');
