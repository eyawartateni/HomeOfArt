<?PHP
ob_start();
    require_once ('index.html');
    include_once  '../../model/livraison.php';
	include_once "../../controller/livraisonC.php";

	$livraisonC=new LivraisonC();
	
	if (isset($_POST["idlivraison"])){
		$livraisonC->supprimerLivraison($_POST["idlivraison"]);
		header('Location:afficherLivraison.php');
	}

?>