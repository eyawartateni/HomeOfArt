<?php
require_once "../../config.php";
include_once "../../model/commande.php";


class CommandeC
{
    function afficherCommande(){
			
        $sql="SELECT * FROM commande";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    function recupererPrix($idCommande){
        $sql="SELECT prix from commande where idCommande='$idCommande'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $commande=$query->fetch();
            return $commande;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
		

       

    
    
    
}


?>