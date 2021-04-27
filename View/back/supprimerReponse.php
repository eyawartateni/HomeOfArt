<?PHP
include_once "../../config.php";

include_once '../../Controller/reponseC.php';

	$utilisateurC=new ReponseC();
	
	if (isset($_POST["id_reponse"])){
		$utilisateurC->SupprimerReponse($_POST["id_reponse"]);
		header('Location:affichage_reponse.php');
	}

?>