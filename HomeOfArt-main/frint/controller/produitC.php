<?php
include_once "../../config.php";
require_once "../../model/produit.php";



class produitC{

  function  ajouterProduit($user , $name_file)
  {
      $sql= "INSERT INTO produit(libelle,descriptionP,categorie,prix,quantite,imageP) VALUES (  :libelle  , :descriptionP,  :categorie  ,:prix,:quantite,'$name_file')";
      $db= config::getConnexion();
      try
      {
  $query=$db->prepare($sql);
  $query->execute(
      [
      'libelle'=> $user->getLibelle(),
      'categorie' =>$user->getCategorie(),
      'prix' => $user->getPrix(),
      'quantite' =>$user->getQuantite(),
      'descriptionP' =>$user->getDescription(),
      ]
  );
      }catch (Exception $e)
      {
          die('Erreur:'.$e->getMessage());
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

 
  function ModifierProduit($idproduit,$libelle,$prix,$quantite,$descriptionP)
  {
       $sql = "UPDATE produit SET libelle='$libelle' ,prix='$prix',quantite='$quantite',descriptionP='$descriptionP'  WHERE idproduit='$idproduit'";

       $db= config::getConnexion();

       $query=$db->prepare($sql);
       $query->execute();
   
  }
  function SupprimerProduit($idproduit)
  {
        $sql="DELETE FROM produit WHERE idproduit= '$idproduit'";

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
     

function recupererproduit($idproduit){
  $sql="SELECT * from produit where idproduit='$idproduit'";
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