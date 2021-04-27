<?php

include_once "../config.php";
class panierC
{
    function ajouterpanier($panier)
    {   
           
        
        $sql= "insert into panier(id_client,nom_produit,img_produit,prix_produit,qte) values (:idclient,:nomproduit,:imgproduit,:prixproduit,:qte)";
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            
            $idclient=$panier->getidclient();
            $nomproduit=$panier->getnomproduit();
            $imgproduit=$panier->getimgproduit();
            $prixproduit=$panier->getprixproduit();
            $qte=$panier->getqte();
          
            $req->bindValue(':idclient',$idclient);
            $req->bindValue(':nomproduit',$nomproduit);
            $req->bindValue(':imgproduit',$imgproduit);
            $req->bindValue(':prixproduit',$prixproduit);
            $req->bindValue(':qte',$qte);
            

            $req->execute();

        }
        catch (Exception $e)
        {
            die('Erreur: Un panier avec ce idclient existe deja');

        }

    
     }
     function afficherpanier($idclient)
    {

        $sql="select * from panier where id_client='$idclient'";

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
    function supprimerpanier($refp,$id){
        $sql="DELETE FROM panier where id_panier= :refp and id_client='$id' ";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':refp',$refp);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
 function supprimertout($idclient){
        $sql="DELETE FROM panier where id_client= :idclient";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idclient',$idclient);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
function modifierpanier($refp,$quantite)
    {
        $sql="update panier set qte= '$quantite ' where id_panier='$refp'";
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
    function modifier($nomp)
    {
        $sql="update panier set qte= qte+1 where nom_produit='$nomp'";
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
 function calculerpanier($idclient){
        $sql="select count(*) as nb from panier where id_client='$idclient' ";
        $db = config::getConnexion();
        
        try{
             $nb=$db->query($sql);
             return $nb->fetch();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}