<?php
require_once "../../config.php";
include_once "../../model/livraison.php";
include_once "../../controller/livraisonC.php";
include_once "../../model/livraison.php";


class LivraisonC
{function ajouterLivraison($Livraison)
 {
    $sql="INSERT INTO livraison (datelivraison,idLivreur,idCommande,etat,adresse,prix) 
    VALUES (:datelivraison,:idLivreur,:idCommande,:etat,:adresse,:prix)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            
            'datelivraison' => $Livraison->getdate(),
            'idLivreur' => $Livraison->getliv(),
            'idCommande' => $Livraison->getcmd(),
            'etat' => $Livraison->getetat(),
            'prix' => $Livraison->getprix(),
            'adresse' => $Livraison->getadresse()
            
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }			
 }
    function afficherLivraison(){
			
        $sql="SELECT * FROM livraison";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    function afficherparsecteur(){
			
        $sql="SELECT * FROM livraison where livreur.adresse=livraison.adresse";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    function supprimerLivraison($idlivraison){
        $sql="DELETE FROM livraison WHERE idlivraison= :idlivraison";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idlivraison',$idlivraison);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    
    function modifierLivraison($idlivraison,$datelivraison,$idLivreur,$idCommande,$prix,$adresse,$etat)
   {
        $sql = "UPDATE livraison SET datelivraison='$datelivraison',idLivreur='$idLivreur',idCommande='$idCommande',prix='$prix',adresse='$adresse',etat='$etat'  WHERE idlivraison='$idlivraison'";

        $db= config::getConnexion();

        $query=$db->prepare($sql);
        $query->execute();
	
   }
   function modifierEtat($idLivreur)
   {
       $etat= "oui";
        $sql = "UPDATE livraison SET etat='$etat'  WHERE idLivreur='$idLivreur'";

        $db= config::getConnexion();

        $query=$db->prepare($sql);
        $query->execute();
	
   }
    function recupererLivraison($idlivraison){
        $sql="SELECT * from livraison where idlivraison='$idlivraison'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $livraison=$query->fetch();
            return $livraison;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recherche($search1,$search2,$search3)
    {
        $sql = "SELECT * FROM livraison where  adresse like '%$search1%' and etat like '%$search2%' and prix like '%$search3%' ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function rechercheLivraisonLivreur($search)
    {
        $sql ="SELECT * FROM livraison where idLivreur='$search'";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function AffecterLivreurLivraison($idLivreur)
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql = "UPDATE livraison set idLivreur='$idLivreur' ";
        $db = Config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function RechercherLiv($idLivreur)
    {

     

    $sql = "SELECT * FROM livraison where  idLivreur='$idLivreur'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }	
    }
    
}


?>