<?PHP
	include "../../controller/categorieC.php";

	$prodc=new categorieC();
	
	if (isset($_POST["nom_cat"])){
		$prodc->SupprimerCategorie($_POST["nom_cat"]);
		header('Location:afficherCategorie.php');
	}
?>