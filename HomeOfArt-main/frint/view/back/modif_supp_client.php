<?php


require_once ('index.html');
    include_once "../../controller/UtilisateurC.php";
    include_once "../../model/Utilisateur.php";
    include_once "../../config.php";
?>




<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">
    
    <style type="text/css">
    
    body
    {
      width: 100%;
      height: 100vh;
      background :#FFFAF0;
     }
    
    .center
    {
      width: 50%;
      margin-right: auto;
      margin-left: auto;
      background:#FFFAF0;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }

    </style>
</head>
<body>
    


<div class ="center" ><br><br><br>

    <?php

    $error = "";
    $pub  = null;
    
    $db= config::getConnexion();
    ?>
    
   
   
    
            <?php

                 $req_all_publication = $db->prepare('SELECT *FROM utilisateur');
                 $req_all_publication->execute();
                 
                 ?> <table class="table table-secondary table-secondary" style= "width: 100%">
                 
                 <thead>
    <tr>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">email</th>
      <th scope="col">login</th>
      <th scope="col">password</th>
      <th scope="col">role</th>
      <th scope="col"></th>
      <th scope="col">Suppression</th>
      
    </tr>
  </thead>
                 
                 
                 
                  <?php

                    

                 while ($reponse = $req_all_publication->fetch(PDO::FETCH_OBJ)) {
                      ?>
                      
                          <tr> <td><?php echo $reponse->nom ?></td>
                           <td><?php echo $reponse->prenom ?></td>
                           <td><?php echo $reponse->email ?></td>
                           <td><?php echo $reponse->login ?></td>
                           <td><?php echo $reponse->password ?></td>
                           <td><?php echo $reponse->role ?></td>
                          <td> <a href="?action=update&id_publication=<?php echo $reponse->id ?>"> Update to admin </a> </td>
                          <td> <a href="?action=delete&id_publication=<?php echo $reponse->id ?>"> Supprimer </a> </td> </tr>

                    <?php
                   
                 }
                 ?> </table> <?php
                 $userC= new utilisateurC();
                 $admin="admin";
                 if(isset($_GET['action'])){

                 if($_GET['action'] == 'delete' ){
                      

                  $userC->SupprimerUtilisateur($_GET['id_publication']);

                 
                      
                 }
                 if($_GET['action'] == 'update' ){
                      

                  $userC->updateadmin($admin,$_GET['id_publication']);

                      
                 }

                 ?>
                         

                 <?php
                 }
            
                 

                  ?>


</div>

</body>
</html>