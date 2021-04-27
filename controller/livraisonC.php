<?php
include "../config.php";
include_once "../model/livraison.php";
include_once "../model/livreur.php";

class LivraisonC
{function ajouterLivraison($Livraison){
    $sql="INSERT INTO livraison (idlivraison,datelivraison,idLiv,idcmd,etat,prix,adresse) 
    VALUES (:idlivraison,:datelivraison,:idLiv,:idcmd,:etat,:prix,:adresse)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'idlivraison' => $Livraison->getidlivraison(),
            'datelivraison' => $Livraison->getdate(),
            'idLiv' => $Livraison->getliv(),
            'idcmd' => $Livraison->getcmd(),
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

    
    function modifierLivraison($idlivraison,$datelivraison,$idLiv,$idcmd,$prix,$adresse,$etat)
   {
        $sql = "UPDATE livraison SET datelivraison='$datelivraison',idLiv='$idLiv',idcmd='$idcmd',prix='$prix',adresse='$adresse',etat='$etat'  WHERE idlivraison='$idlivraison'";

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

    function recherche($search1,$search2)
    {
        $sql = "SELECT * FROM livraison where  adresse like '%$search1%' and etat like '%$search2%'  ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function rechercheLivraison($search_value)
    {
        $sql = "SELECT * FROM livraison where  idlivraison like '$search_value' or dateLivraison like '%$search_value%' or etat like '%$search_value%' or adresse like '%$search_value%'  ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function AffecterLivreurLivraison($idLivreur, $idlivraison)
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql = "UPDATE livraison set idLiv='$idLivreur' WHERE idlivraison=:idlivraison";
        $db = Config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    
}


?>