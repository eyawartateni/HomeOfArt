<?PHP
include_once "../../config.php";

include_once '../../Controller/commentaireC.php';

	$utilisateurC=new CommentaireC();
	
	if (isset($_POST["id_commentaire"])){
		$utilisateurC->SupprimerCommentaire($_POST["id_commentaire"]);
		header('Location:ajout_commentaire.php');
	}

?>