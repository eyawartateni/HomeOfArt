<?php

require_once ('index.html');
    include_once "../../Controller/Cutilisateur.php";
    include_once "../../Model/utilisateur.php";
    include_once "../../config.php";

    $userC= new utilisateurC();
$db= config::getConnexion();



$error="";
$user=null;
$userC= new utilisateurC();
$db= config::getConnexion();

?>
<?php
$admin="admin";


    if(      isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['email']) &&
    isset($_POST['login']) &&
    isset($_POST['pass'])
)
{
if( !empty($_POST['nom']) &&
   !empty($_POST['prenom']) &&
   !empty($_POST['email']) &&
   !empty($_POST['login']) &&
   !empty($_POST['pass'])
 )
   {
       $user =new Utilisateur(
           $_POST['nom'],
           $_POST['prenom'],
           $_POST['email'],
           $_POST['login'],
           $_POST['pass']
       );
       $userC->ajouterUtilisateur($user);
       $liste=$userC->Rechercherid($_POST['email'],$_POST['pass']);
       $userC->updateadmin($admin,$liste['id']);
      
   }
   else {
       $error="Missing information !";
   }
}


?>

<<!DOCTYPE html>
<html lang="en">


<head>
    
    <title>ajout admin</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">
  
    <style type="text/css">

.center
    {
      width: 60%;
      margin-right: auto;
      margin-left: auto;
      background:#D3D3D3;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }

    .publication
    {
      display: flex;
      flex-wrap: wrap;
      align-content: space-around; 
      
  
    }

    .card
    {
      margin-right: 20px
      
    }

    body
    {
      width: 100%;
      height: 100vh;
      background :#eee;
    }

    </style>


   

</head>
<body>
    
    <div class="center"><br><br><br>
      <div class="py-3 text-center">
    <h1>admin</h1><br><br><br>
   </div>
   
  





   <form action="" method="POST">
                                        
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                                    <input class="form-control py-4" name="nom" id="nom" type="text" placeholder="Enter first name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                                    <input class="form-control py-4" name="prenom" id="prenom" type="text" placeholder="Enter last name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" name="email" id="email" type="text" aria-describedby="emailHelp" placeholder="Enter email address" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">login</label>
                                            <input class="form-control py-4" name="login" id="login" type="text"  placeholder="Enter your login" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" name="pass" id="pass" type="password" placeholder="Enter password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0"><button type="submit" name="olla" class="btn btn-primary btn-block" >Create Account</button></div>
</form>

</body>


</html>
