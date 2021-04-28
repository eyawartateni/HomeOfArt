<?php
require_once ('index.html');
    include_once "../../Controller/Cutilisateur.php";
    include_once "../../Model/utilisateur.php";
    include_once "../../config.php";

    $userC= new utilisateurC();
$db= config::getConnexion();


?>



<!DOCTYPE html>
<html lang="en">


<head>
    
    <title>les clients</title>
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
    <h1>clients</h1><br><br><br>
   </div>
   
  





<div class="publication">   

<?php


$req=$userC->afficherutilisateurC();

while($reponse=$req->fetch(PDO::FETCH_OBJ)){
  if($reponse->role!="admin"){?>

<div class="card text-dark bg-light mb-3" style="width: 15rem;">


<div class="card-body" >
<h4 class="card-title"> <?php echo $reponse->nom; ?> <?php echo $reponse->prenom; ?></h4>
<br>
<p class="card-text"><?php echo $reponse->email; ?> </p>
<p class="card-text"><?php echo $reponse->login; ?> </p>
<p class="card-text"><?php echo $reponse->role; ?> </p>

</div>
</div>


<?php }  
}
?>

        </div>
      </div>

</body>

</html>