<?php



session_start();


include_once "../../config.php";
include_once '../../model/reponse.php';
include_once '../../Controller/reponseC.php';

$error = "";
$pub  = null;
$comR = new ReponseC();
$db= config::getConnexion();


?>


<?php
$id_client=$_SESSION['id'];

if( isset($_GET['t'])  && !empty($_GET['t']) )
{
   $gett = (int) $_GET['t'];

  

      if($gett == 1){

      $check_like = $db->prepare('SELECT id_like FROM likes where id_publication = ? AND id_client= ?');
      $check_like->execute(array($_GET['id_publication'],$id_client));

      $dell = $db->prepare('DELETE FROM dislikes where id_publication = ? AND id_client= ?');
      $dell->execute(array($_GET['id_publication'],$id_client)); 


      if($check_like->rowCount()==1)
      {
        $dell = $db->prepare('DELETE FROM likes where id_publication = ? AND id_client= ?');
        $dell->execute(array($_GET['id_publication'],$id_client)); 
      }

      else
      {
       $comR->ajouterlike_client($_GET['id_publication'],$id_client);
      }

      }
      
      elseif($gett == 2){

        $check_like = $db->prepare('SELECT id_dislike FROM dislikes where id_publication = ? AND id_client= ?');
        $check_like->execute(array($_GET['id_publication'],$id_client));

        $dell = $db->prepare('DELETE FROM likes where id_publication = ? AND id_client= ?');
        $dell->execute(array($_GET['id_publication'],$id_client)); 
  
  
        if($check_like->rowCount()==1)
        {
          $dell = $db->prepare('DELETE FROM dislikes where id_publication = ? AND id_client= ?');
          $dell->execute(array($_GET['id_publication'],$id_client)); 
        }
  
        else
        {
        $comR->ajouterdislike_client($_GET['id_publication'],$id_client);
        }

      }
      header('Location:Affichage_publication.php');


   


}

?>
