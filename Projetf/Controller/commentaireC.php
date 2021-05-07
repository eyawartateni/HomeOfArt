<?php

/*include_once "../../View/config.php";*/
require_once "../../Model/commentaire.php";

class CommentaireC{


   
   function  ajouterCommentaireC($pseudo,$messages,$id_publication_commentaire){


     $sql = "INSERT INTO commentaire (pseudo,messages,date_commentaire,id_publication_commentaire) VALUES ('$pseudo','$messages',NOW(),'$id_publication_commentaire')";

     $db= config::getConnexion();

     try{
           $query =$db->prepare($sql);
           $query->execute();

        }

     catch(Exception $e)
     {
         die('Erreur: '.$e->getMessage());
     }

   }

  


///////////////////////////////////////

   function afficherCommentaire($id_publication_commentaire)
   {
      $sql="SELECT * FROM commentaire WHERE id_publication_commentaire= '$id_publication_commentaire'";
      $db= config::getConnexion();

      try{

        $liste = $db->query($sql);
        return $liste;


      }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
      }
   }
////////////////////////////////////////////

function afficherCommentaires()
{
   $sql="SELECT * FROM commentaire ";
   $db= config::getConnexion();

   try{

     $liste = $db->query($sql);
     return $liste;


   }catch(Exception $e){
       die('Erreur: '.$e->getMessage());
   }
}



///////////////////////////////////////
   function ModifierCommentaire($id_commentaire,$messages)
   {
        $sql = "UPDATE commentaire SET messages='$messages'  WHERE id_commentaire='$id_commentaire'";

        $db= config::getConnexion();

        $query=$db->prepare($sql);
        $query->execute();
	
   }

   
		function SupprimerCommentaire($id_commentaire)
      {

			$sql="DELETE FROM commentaire WHERE id_commentaire= '$id_commentaire'";

			$db = config::getConnexion();

			$req=$db->prepare($sql);
			
			try
         {
				$req->execute();
			}
			catch (Exception $e)
         {
				die('Erreur: '.$e->getMessage());
			}
		}

      function RechercherPublication($id_publication)
      {

		$db = config::getConnexion();

      $sql = "SELECT * FROM publication where id_publication='$id_publication'";
      $query=$db->prepare($sql);
      $query->execute();
      }

      function recupererCommentaire($id_commentaire){
			$sql="SELECT * FROM commentaire WHERE id_commentaire='$id_commentaire'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}



}


?>