<?php

/*include_once "../../View/config.php";*/
require_once "../../Model/reponse.php";

class ReponseC{


   function  ajouterReponseC($pseudo,$messages,$id_commentaire_reponse){


      $sql = "INSERT INTO reponse (pseudo,messages,date_reponse,id_commentaire_reponse) VALUES ('$pseudo','$messages',NOW(),'$id_commentaire_reponse')";
 
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

    function  ajouterReponseC_client($messages,$id_commentaire_reponse,$id_client_reponse){


        $sql = "INSERT INTO reponse (messages,date_reponse,id_commentaire_reponse,id_client_reponse) VALUES ('$messages',NOW(),'$id_commentaire_reponse','$id_client_reponse')";
   
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






    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function afficherReponse($id_commentaire_reponse)
   {
      $sql="SELECT * FROM reponse WHERE id_commentaire_reponse= '$id_commentaire_reponse'";
      $db= config::getConnexion();

      try{

        $liste = $db->query($sql);
        return $liste;


      }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
      }
   }

   
function afficherReponses()
{
   $sql="SELECT * FROM reponse ";
   $db= config::getConnexion();

   try{

     $liste = $db->query($sql);
     return $liste;


   }catch(Exception $e){
       die('Erreur: '.$e->getMessage());
   }
}


function SupprimerReponse($id_reponse)
{

      $sql="DELETE FROM reponse WHERE id_reponse= '$id_reponse'";

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

  function ModifierReponse($id_reponse,$messages)
  {
       $sql = "UPDATE reponse SET messages='$messages'  WHERE id_reponse='$id_reponse'";

       $db= config::getConnexion();

       $query=$db->prepare($sql);
       $query->execute();
   
  }

  function recupererReponse($id_reponse){
    $sql="SELECT * FROM reponse WHERE id_reponse='$id_reponse'";
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



    
function  ajouterlike_client($id_publication,$id_client){


    $sql = "INSERT INTO likes (id_publication,id_client) VALUES ('$id_publication','$id_client')";

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

  function  ajouterdislike_client($id_publication,$id_client){


    $sql = "INSERT INTO dislikes (id_publication,id_client) VALUES ('$id_publication','$id_client')";

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
  /////////////////////////////////////////////////////////////////////////////////







}


?>