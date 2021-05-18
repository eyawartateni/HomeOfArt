<?PHP
	include "../../controller/EvenementC.php";
	include_once "../../config.php";

	$utilisateurC=new UtilisateurC();
	
	if (isset($_POST["id_event"])){
		$utilisateurC->supprimerUtilisateur($_POST["id_event"]);
		header('Location:evenement.php');
	}

?>

