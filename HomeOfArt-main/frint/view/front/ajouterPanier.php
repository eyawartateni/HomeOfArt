
<?php
session_start();
include_once "../../config.php";
include "../../model/panier.php";
include "../../controller/panierC.php";

$idclient=$_SESSION['id'];
if( isset($_POST["nom"]) and isset($_POST["prix"]) and isset($_POST["idclient"]) and isset($_POST["image"]) )
{
	$x=0;
	$panierC=new panierC();
	 $list=$panierC->afficherpanier($idclient);
	 foreach ($list as $row ) {
	 	if ($row['nom_produit']==$_POST["nom"]) {
	 		$x=1;
	 	}
	 }


if($x==0)
{
    $panier=new panier($idclient,$_POST["nom"],$_POST["image"],$_POST["prix"],$_POST["quantite"]);
    $panierC=new panierC();
 
    $panierC->ajouterpanier($panier);
}
else
{
 $panierC=new panierC();
 $panierC->modifier($_POST["nom"]);

}  
    header('Location: afficherPanier.php');
        
 }  

else
{
     header('Location: afficherPanier.php');
}
?>