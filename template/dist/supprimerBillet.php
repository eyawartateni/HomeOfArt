<?PHP
	include "../controller/BilletC.php";

	$billetC=new BilletC();
	
	if (isset($_POST["id_billet"])){
		$billetC->supprimerBillet($_POST["id_billet"]);
		header('Location:billetterie.php');
	}

?>

