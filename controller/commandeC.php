<?php

include_once "../config.php";
class commandeC
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
     function affichercommande($idclient)
    {

        $sql="select * from commande where idclient = $idclient order by refcommande desc";

        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
       function affichercommande1()
    {

        $sql="select * from commande ";

        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function affichercommandesearch($search)
    {

        $sql="select * from commande where idclient='$search'";

        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
     function affichercommandetri($tri)
    {

        $sql="select * from commande order by $tri desc";

        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimercommande($refcommande){
        $sql="DELETE FROM commande where refcommande= :refcommande";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':refcommande',$refcommande);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
function modifiercommande($refcommande,$etat)
    {
        $sql="update commande set  etat='$etat' where refcommande='$refcommande'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifiercommande1($refcommande,$etat)
    {
        $sql="update dbpatisserie.commande set  etat='$etat' where refcommande='$refcommande'";
        $db = config1::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function calculercommande(){
        $sql="select count(*) as nb from commande ";
        $db = config1::getConnexion();
        
        try{
             $nb=$db->query($sql);
             return $nb->fetch();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function calculercommande1($idclient){
        $sql="select count(*) as nb from commande where idclient='$idclient' ";
        $db = config1::getConnexion();
        
        try{
             $nb=$db->query($sql);
             return $nb->fetch();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
     function affichercommanded($mois)
    {

        $sql="select * from commande where MONTH(date)='$mois' order by date ";

        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }


}