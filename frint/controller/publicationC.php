<?php

include_once "../config.php";
require_once "../Model/publication.php";

class PublicationC{


   
   function  ajouterPublicationC($titre,$Description,$name_file,$id_client_publication){


     $sql = "INSERT INTO publication (titre,description,image_name,id_client_publication,date_publication) VALUES ('$titre','$Description','$name_file','$id_client_publication',NOW())";

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


   //////////////////////////////////////// fonction afficher//////////////////////////////////////
   function afficherPublication()
   {
      $sql="SELECT * FROM publication";
      $db= config::getConnexion();

      try{

        $liste = $db->query($sql);
        return $liste;


      }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
      }
   }

   function afficherPublication_client($id_client_publication)
   {
      $sql="SELECT * FROM publication WHERE id_client_publication= '$id_client_publication'";
      $db= config::getConnexion();

      try{

        $liste = $db->query($sql);
        return $liste;


      }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
      }
   }
   ////////////////////////////////////////////////// fonction modifier/////////////////////////

   function ModifierPublication($id_publication,$titre,$description,$name_file)
   {
        $sql = "UPDATE publication SET titre='$titre'  ,description='$description',image_name='$name_file'  WHERE id_publication='$id_publication'";

        $db= config::getConnexion();

        $query=$db->prepare($sql);
        $query->execute();
	
   }

   function ModifierPublication_client($id_publication,$titre,$description,$name_file,$id_client_publication)
   {
        $sql = "UPDATE publication SET titre='$titre',description='$description',image_name='$name_file'  WHERE id_publication='$id_publication' AND id_client_publication='$id_client_publication'";

        $db= config::getConnexion();

        $query=$db->prepare($sql);
        $query->execute();
	
   }

   /////////////////////////////////// fonction supprimer ////////////////////////
		function SupprimerPublication($id_publication)
      {

			$sql="DELETE FROM publication WHERE id_publication= '$id_publication'";

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
      
      function SupprimerPublication_client($id_publication,$id_client_publication)
      {

			$sql="DELETE FROM publication WHERE id_publication= '$id_publication' AND  id_client_publication= '$id_client_publication' ";

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
      ///////////////////////////////////////////////////////////////////////
      function RechercherPublication($id_publication)
      {

		$db = config::getConnexion();

      $sql = "SELECT * FROM publication where id_publication='$id_publication'";
      $query=$db->prepare($sql);
      $query->execute();
      }




}


?>