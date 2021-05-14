<?php
session_start();
session_destroy();
echo 'vous etes déconnecter .<a href="./login.php">se connecter ?</a>';
?>