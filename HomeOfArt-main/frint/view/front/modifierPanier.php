<?php
include "../../controller/panierC.php";


$refp=$_POST["idpanier"];
$quantite=$_POST["quantite"];


$panierC=new panierC();
$panierC->modifierpanier($refp,$quantite);
header("location:afficherPanier.php");