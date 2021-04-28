<?php 
include "../config.php";
require_once "../Model/Billet.php";
class BilletC
{
    function afficherBillet()
    {
    $sql = "SELECT * FROM billetterie" ;
    $db= config::getConnexion();
    try{
 $listeb = $db->query($sql);
 return $listeb;
    }catch (Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }
    }

function ajouterBillet($userb )
{
    $sql= "INSERT INTO billetterie(id_evenement,nbre,prix) VALUES (  :id_evenement , :nbre ,:prix)";
    $db= config::getConnexion();
    try
    {
$query=$db->prepare($sql);
$query->execute(
    [
        'id_evenement'=> $userb->getId(),
    'prix' => $userb->getPrix(),
    'nbre' =>$userb->getNbre(),
    ]
);
    }catch (Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }
}

function modifierBillet($Billet, $id_billet){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE billetterie SET 
                id_billet = :id_billet, 
                id_evenement = :id_evenement,
                prix = :prix,
                nbre = :nbre
               
            WHERE id_billet = :id_billet'
        );
        $query->execute([
            
            'id_evenement' => $Billet->getId(),
            'nbre' => $Billet->getNbre(),
            'prix' => $Billet->getPrix(),
            'id_billet' => $id_billet
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function recupererUtilisateur1($id_event){
    $sql="SELECT * from evenement where id_event=$id_event";
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
function recupererBillet($id_billet){
    $sql="SELECT * from billetterie where id_billet=$id_billet";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $userb=$query->fetch();
        return $userb;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
function supprimerBillet($id_billet){
    $sql="DELETE FROM billetterie WHERE id_billet= :id_billet";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id_billet',$id_billet);
    try{
        $req->execute();
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

}

?>