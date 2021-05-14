<?php
require_once "../../config.php";
include_once "../../model/livreur.php";

class LivreurC
{
    function ajouterLivreur($Livreur){
        $sql="INSERT INTO livreur (nomLivreur,prenomLivreur,adresse,email,salaire,tel) 
        VALUES (:nomLivreur,:prenomLivreur,:adresse,:email,:salaire,:tel)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                
                'nomLivreur' => $Livreur->getNom(),
                'prenomLivreur' => $Livreur->getPrenom(),
                'adresse' => $Livreur->getAdresse(),
                'email' => $Livreur->getEmail(),
                'salaire' => $Livreur->getSalaire(),
                'tel' => $Livreur->getTel()
                
                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
    function afficherLivreur(){
			
        $sql="SELECT * FROM livreur";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    function supprimerLivreur($idLivreur){
        $sql="DELETE FROM livreur WHERE idLivreur= :idLivreur";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idLivreur',$idLivreur);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    /*function modifierlivreur($livreur, $idLivreur){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE livreur SET 
                    
                    nomLivreur = :nomLivreur, 
                    prenomLivreur = :prenomLivreur,
                    adresse = :adresse,
                    email = :email,
                    sexe = :sexe,
                    tel = :tel
                WHERE idLivreur = :idLivreur'
            );
            $query->execute([
                'idLivreur' => $livreur->getid(),
                'nom' => $livreur->getNom(),
                'prenom' => $livreur->getPrenom(),
                'nom' => $livreur->getAdresse(),
                'email' => $livreur->getEmail(),
                'login' => $livreur->getsexe(),
                'password' => $livreur->getTel(),
                'idLivreur' => $idLivreur
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }*/
    function modifierlivreur($idLivreur,$nomLivreur,$prenomLivreur,$adresse,$email,$salaire,$tel)
   {
        $sql = "UPDATE livreur SET nomLivreur='$nomLivreur',prenomLivreur='$prenomLivreur',adresse='$adresse',email='$email',salaire='$salaire',tel='$tel'  WHERE idLivreur='$idLivreur'";

        $db= config::getConnexion();

        $query=$db->prepare($sql);
        $query->execute();
	
   }
    function recupererLivreur($idLivreur){
        $sql="SELECT * from livreur where idLivreur=$idLivreur";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $livreur=$query->fetch();
            return $livreur;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
     
       }

       


    }


    function rechercheLivreur($search)
    {
        $sql = "SELECT * FROM livraison where  idLivreur like '$search' ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function trier($par)
    {
        $sql = "SELECT * FROM livreur order by $par ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }






    
}


?>