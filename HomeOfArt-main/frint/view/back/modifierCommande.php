<?php

include "../../controller/commandeC.php";

$refcommande=$_POST["refcommande"];

$etat=$_POST["etat"];

$crimC=new CommandeC();
$crimC->modifiercommande($refcommande,$etat);
header("location:afficherCommande.php");

?>