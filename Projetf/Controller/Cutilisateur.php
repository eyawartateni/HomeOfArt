<?php
include_once "../../config.php";
require_once "../../Model/utilisateur.php";


class utilisateurC
{
  function ajouterUtilisateur($user)
  {
      $sql ="INSERT INTO utilisateur(nom, prenom, email, login, password) VALUES (:nom,:prenom,:email,:login,:password)";
      $db= config::getConnexion();
      try{
          $query =$db ->prepare($sql);
          $query->execute([
              'nom' => $user->getNom(),
              'prenom' => $user->getPrenom(),
              'email' => $user->getEmail(),
              'login' => $user->getLogin(),
              'password' => $user->getPassword() 
          ]);
      }catch(Exception $e)
      {
          die('Erreur: '.$e->getMessage());
      }
  }



  function afficherutilisateurC()
  {
      $sql ="SELECT * FROM utilisateur";
      $db= config::getConnexion();
      try{
          $liste =$db ->query($sql);
          return $liste;
      }catch(Exception $e)
      {
          die('Erreur: '.$e->getMessage());
      }
      
  }


  function ModifierUtilisateur($user,$role,$id)
  {
       $sql = "UPDATE utilisateur SET nom=:nom ,prenom=:prenom ,email=:email ,login=:login ,password=:password ,role=:role WHERE id=:id";

       $db= config::getConnexion();
      try{
          $query =$db ->prepare($sql);
          $query->execute([
              'nom' => $user->getNom(),
              'prenom' => $user->getPrenom(),
              'email' => $user->getEmail(),
              'login' => $user->getLogin(),
              'password' => $user->getPassword(),
              'role' =>$role,
              'id' =>$id 
          ]);
      }catch(Exception $e)
      {
          die('Erreur: '.$e->getMessage());
      }
  }
  function updateadmin($role,$id)
  {
       $sql = "UPDATE utilisateur SET role=:role WHERE id=:id";

       $db= config::getConnexion();
      try{
          $query =$db ->prepare($sql);
          $query->execute([
              'role' =>$role,
              'id' =>$id 
          ]);
      }catch(Exception $e)
      {
          die('Erreur: '.$e->getMessage());
      }
  }

  
       function SupprimerUtilisateur($id)
     {
           $sql="DELETE FROM utilisateur WHERE id='$id'";

           $db = config::getConnexion();
           
           try
        {
            $req=$db->prepare($sql);
               $req->execute();
           }
           catch (Exception $e)
        {
               die('Erreur: '.$e->getMessage());
           }
       }

     function RechercherUtilisateur($id)
     {

       $db = config::getConnexion();

     $sql = "SELECT * FROM utilisateur where id='$id'";
     $query=$db->prepare($sql);
     $query->execute();
     }
     function Rechercherid($email,$password)
     {

       $db = config::getConnexion();

     $sql = "SELECT * FROM utilisateur where email='$email'and password='$password'";
     try{
     $query=$db->prepare($sql);
     $query->execute();
     $count=$query->rowCount();
         if($count==0)
         {
             $message="pseudo ou le mot de passe est incorrect";
         }
         else
         {
            $liste=$query->fetch();
            return $liste;
         }
     }
        catch (Exception $e)
        {
               die('Erreur: '.$e->getMessage());
           }
           
     
     }

     function connexionUser($email,$password)
     {
         $sql="SELECT * from utilisateur where email='".$email."'and password='".$password."'";
         $db = config::getConnexion();
         try{
         $query =$db ->prepare($sql);
         $query->execute();
         $count=$query->rowCount();
         if($count==0)
         {
             $message="pseudo ou le mot de passe est incorrect";
         }
         else
         {
             $x=$query->fetch();
             $message=$x['role'];
         }
        }
        catch (Exception $e)
        {
               die('Erreur: '.$e->getMessage());
           }
           return $message;
     }
     function user($id)
     {
        $sql ="SELECT * FROM utilisateur where id='$id'";
        $db= config::getConnexion();
        try{
            $query=$db->prepare($sql);
         $query->execute();
         $count=$query->rowCount();
         if($count==0)
         {
             $message="pseudo ou le mot de passe est incorrect";
         }
         else
         {
            $liste=$query->fetch();
            return $liste;
         }
        }catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
     }
}
 ?>