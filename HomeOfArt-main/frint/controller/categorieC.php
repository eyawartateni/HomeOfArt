<?php
include_once "../../config.php";
require_once "../../Model/categorie.php";


class categorieC{

 function  ajouterCategorie($nom_cat , $stat_cat)
 {
     $sql= "INSERT INTO categorie(nom_cat,stat_cat) VALUES( '$nom_cat','$stat_cat')";
     $db= config::getConnexion();
     try
     {
    $query=$db->prepare($sql);
    $query->execute();
     }catch (Exception $e)
     {
        die('Erreur:'.$e->getMessage());
     }
 }


  function afficherCategorie()
  {
     $sql="SELECT * FROM categorie";
     $db= config::getConnexion();

     try{

       $liste = $db->query($sql);
       return $liste;


     }catch(Exception $e){
         die('Erreur: '.$e->getMessage());
     }
  }

  function ModifierCategorie($nom_cat,$stat_cat)
  {
       $sql = "UPDATE categorie SET nom_cat='$nom_cat' ,stat_cat='$stat_cat'  WHERE nom_cat='$nom_cat'";

       $db= config::getConnexion();

       $query=$db->prepare($sql);
       $query->execute();
   
  }

       function SupprimerCategorie($nom_cat)
     {
           $sql="DELETE FROM categorie WHERE nom_cat= '$nom_cat'";

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

     function RechercherProduit($nom_cat)
     {

       $db = config::getConnexion();

     $sql = "SELECT * FROM categorie where nom_cat='$nom_cat'";
     $query=$db->prepare($sql);
     $query->execute();
     }





function recuperercategorie($nom_cat){
    $sql="SELECT * from categorie where nom_cat='$nom_cat'";
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