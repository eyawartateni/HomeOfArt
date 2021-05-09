<?php
include_once "../../config.php";
require_once "../../model/produit.php";


class Cproduit{
function  ajouterProduit($libelle,$categorie,$prix,$quantite,$name_file){


    $sql = "INSERT INTO produit (libelle,categorie,prix,quantite,imageP) VALUES ('libelle','categorie','prix','quantite','name_file')";

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



  function afficherProduit()
  {
     $sql="SELECT * FROM produit";
     $db= config::getConnexion();

     try{

       $liste = $db->query($sql);
       return $liste;


     }catch(Exception $e){
         die('Erreur: '.$e->getMessage());
     }
  }

  function ModifierProduit($libelle,$prix,$quantite,$name_file,$idproduit)
  {
       $sql = "UPDATE produit SET libelle='$libelle' ,prix='$prix',quantite='$quantite',imageP='$name_file'  WHERE idproduit='$idproduit'";

       $db= config::getConnexion();

       $query=$db->prepare($sql);
       $query->execute();
   
  }

       function SupprimerProduit($idproduit)
     {
           $sql="DELETE FROM produit WHERE id_produit= '$idproduit'";

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

     function RechercherProduit($idproduit)
     {

       $db = config::getConnexion();

     $sql = "SELECT * FROM produit where idproduit='$idproduit'";
     $query=$db->prepare($sql);
     $query->execute();
     }

     function RechercherProduitcat($nom_cat)
     {
       $db = config::getConnexion();
     $sql = "SELECT * FROM produit where categorie='$nom_cat'";
     $query=$db->prepare($sql);
     $query->execute();
     return($query);
     
     }
}
 ?>