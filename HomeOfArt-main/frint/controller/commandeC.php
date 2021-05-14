<?php
include_once "../../config.php";
include_once "../../model/commande.php";


class CommandeC
{
    function ajoutercommande($commande)
    {
        $sql= "insert into commande( idclient, prixtotal,etat,detail, date) values (:idclient,:prixtotal,:etat,:detail,:date)";
      
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            
           
            $prixtotal=$commande->getprixtotal();
            $idclient=$commande->getidclient();
            $etat=$commande->getetat();
            $detail=$commande->getdetail();
            $date=$commande->getdate();

          
          
            $req->bindValue(':prixtotal',$prixtotal);
            $req->bindValue(':idclient',$idclient);
             $req->bindValue(':etat',$etat);
              $req->bindValue(':detail',$detail);
            $req->bindValue(':date',$date);

            $req->execute();

        }
        catch (Exception $e)
        {
            die('Erreur: Un commande avec ce refcommande existe deja');

        }
    }
    function afficherCommande(){
            
        $sql="SELECT * FROM Commande";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function supprimerCommande($refcommande){
        $sql="DELETE FROM Commande WHERE refcommande= :refcommande";
        $db = config::getConnexion();
                $query=$db->prepare($sql);
                $query->bindValue(':refcommande',$refcommande);
        try{
                    $query->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function rechercheCommande($search_value)
    {
        $sql = "SELECT * FROM commande where   refcommande like '$search_value'  ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierCommande($refcommande,$idClt,$idProduit,$adresse,$prixtot, $idPanier)
    {
         $sql = "UPDATE Commande SET idClt='$idClt',idProduit='$idProduit',adresse='$adresse' ,prixtot='$prixtot',  idPanier='$idPanier' WHERE refcommande='$refcommande'";
 
         $db= config::getConnexion();
 
         $query=$db->prepare($sql);
         $query->execute();
     
    }
   /* function modifierCommande($Commande,$refcommande){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Commande SET 
                    idClt = :idClt, 
                    idProduit = :idProduit,
                    adresse = :adresse,
                    prixtot = :prixtot,
                    date, idPanier = :date, idPanier
                WHERE refcommande = :refcommande'
            );
            $query->execute([
                'idClt' => $Commande->getIdClient(),
                'idProduit' => $Commande->getnomProd(),
                'adresse' => $Commande-> getIdProduit(),
                'prixtot' => $Commande->getQuantite(),
                'date, idPanier' => $Commande->getPrix(),
                'refcommande' => $refcommande
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
		
    }*/
    


function recupererCommande($refcommande){
    $sql="SELECT * from Commande where refcommande=$refcommande";
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


function recupererCommande1($refcommande){
    $sql="SELECT * from Commande where refcommande=$refcommande";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();
        
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}


}

function trierCom($tri)
{
   $sql="SELECT refcommande,idclient,prixtotal,etat,detail,date, FROM commande ORDER BY '.$tri.' ";
   $db= config::getConnexion();

   try{

     $liste = $db->query($sql);
     return $liste;


   }catch(Exception $e){
       die('Erreur: '.$e->getMessage());
   }
}

function RechercherCom($refcommande)
{


$sql="SELECT * FROM commande where refcommande='$refcommande' ";
$db=Config::getConnexion();
try{
$liste = $db->query($sql);
return $liste;
} 
catch (PDOException $e) {
   $e->getMessage();
}
}
}
?>