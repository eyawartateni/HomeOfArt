<?PHP
	include "../controller/UtilisateurC.php";

	$utilisateurC=new UtilisateurC();
	
	if (isset($_POST["id_event"])){
		$utilisateurC->supprimerUtilisateur($_POST["id_event"]);
		header('Location:tables.php');
	}

?>

