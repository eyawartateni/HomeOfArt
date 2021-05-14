<?PHP
	include "../../controller/produitC.php";

	$prodc=new produitC();
	
	if (isset($_POST["idproduit"])){
		$prodc->SupprimerProduit($_POST["idproduit"]);
		header('Location:afficherProduit.php');
	}
?>