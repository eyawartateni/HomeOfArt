<?php 
include "../config.php";
require_once "../Model/Utilisateur.php";
class UtilisateurC
{
    function afficherUtilisateur()
    {
    $sql = "SELECT * FROM evenement" ;
    $db= config::getConnexion();
    try{
 $liste = $db->query($sql);
 return $liste;
    }catch (Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }
    }

function ajouterUtilisateur($user , $name_file)
{
    $sql= "INSERT INTO evenement(nom_event,type_event,date_event,nbre_participants,artiste,image_event) VALUES (  :nom_event , :type_event ,:date_event, :nbre_participants, :artiste, '$name_file')";
    $db= config::getConnexion();
    try
    {
$query=$db->prepare($sql);
$query->execute(
    [
        'nom_event'=> $user->getNom(),
    'type_event' =>$user->getType(),
    'date_event' => $user->getDate(),
    'nbre_participants' =>$user->getNbre(),
    
    'artiste' =>$user->getArtiste(),]
);
    }catch (Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }
}

function modifierUtilisateur($Utilisateur, $id_event){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE evenement SET 
                id_event = :id_event, 
                nom_event = :nom_event,
                type_event = :type_event,
                date_event = :date_event,
                nbre_participants = :nbre_participants,
                artiste= :artiste
            WHERE id_event = :id_event'
        );
        $query->execute([
            'id_event' => $Utilisateur->getId(),
            'nom_event' => $Utilisateur->getNom(),
            'type_event' => $Utilisateur->getType(),
            'date_event' => $Utilisateur->getDate(),
            'nbre_participants' => $Utilisateur->getNbre(),
            'artiste' => $Utilisateur->getArtiste(),
            'id_event' => $id_event
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
function recupererUtilisateur($id_event){
    $sql="SELECT * from evenement where id_event=$id_event";
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
function supprimerUtilisateur($id_event){
    $sql="DELETE FROM evenement WHERE id_event= :id_event";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id_event',$id_event);
    try{
        $req->execute();
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

}

?>