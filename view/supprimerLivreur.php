<?PHP
    require_once ('index.php');
    include_once  '../model/livreur.php';
	include_once "../controller/livreurC.php";

	$livreurC=new LivreurC();
	
	if (isset($_POST["idLivreur"])){
		$livreurC->supprimerLivreur($_POST["idLivreur"]);
		header('Location:afficherLivreur.php');
	}

?>
