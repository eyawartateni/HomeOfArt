<?PHP
include "../../controller/commandeC.php";
$commandeC=new commandeC();
if (isset($_GET["refcommande"])){
	$commandeC->supprimercommande($_GET["refcommande"]);
	header('Location: afficherCommande.php');
}

?>