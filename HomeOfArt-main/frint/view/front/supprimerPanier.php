<?PHP
session_start();
include "../../controller/panierC.php";
$panierC=new panierC();
$idclient=$_SESSION['id'];
if (isset($_GET["idpanier"])){
	$panierC->supprimerpanier($_GET["idpanier"],$idclient);
	header('Location: afficherPanier.php');
}

?>