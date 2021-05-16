<?php
require_once ('include/header.php');
session_start();
session_destroy();
echo 'vous etes déconnecter .<a href="./loginLivreur.php">se connecter ?</a>';
?>