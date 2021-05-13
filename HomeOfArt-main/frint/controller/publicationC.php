<?php

include_once "../../config.php";
require_once "../../Model/publication.php";

class PublicationC{


   
   function  ajouterPublicationC($titre,$Description,$name_file){


     $sql = "INSERT INTO publication (titre,description,image_name) VALUES ('$titre','$Description','$name_file')";

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

   function ModifierPublication($id_publication,$titre,$description)
   {
        $sql = "UPDATE publication SET titre='$titre'  ,description='$description' WHERE id_publication='$id_publication'";

        $db= config::getConnexion();

        $query=$db->prepare($sql);
        $query->execute();
	
   }

   
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

      function RechercherPublication($id_publication)
      {

		$db = config::getConnexion();

      $sql = "SELECT * FROM publication where id_publication='$id_publication'";
      $query=$db->prepare($sql);
      $query->execute();
      }




}


?>