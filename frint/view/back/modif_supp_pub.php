<?php
ob_start();
require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/publication.php';
include_once '../../Controller/publicationC.php';
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
      background :#eee;
     }
    
    .center
    {
      width: 50%;
      margin-right: auto;
      margin-left: auto;
      background:#D3D3D3;
      
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
    $pubC = new PublicationC();
    $db= config::getConnexion();
    ?>
    
   
   
    
            <?php

                 $req_all_publication = $db->prepare('SELECT *FROM publication');
                 $req_all_publication->execute();
                 
                 ?> <table class="table table-success table-striped" style= "width: 100%">
                 
                 <thead>
    <tr>
      <th scope="col">Identifiant du publication</th>
      <th scope="col">Modification</th>
      <th scope="col">Suppression</th>
      
    </tr>
  </thead>
                 
                 
                 
                  <?php

                    

                 while ($reponse = $req_all_publication->fetch(PDO::FETCH_OBJ)) {
                      ?>
                      
                          <tr> <td><?php echo $reponse->id_publication ?></td>
                          <td> <a href="modif_pub.php?id_publication=<?php echo $reponse->id_publication ?>"> Modifier </a> </td>
                          <td> <a href="?action=delete&id_publication=<?php echo $reponse->id_publication ?>"> Supprimer </a> </td> </tr>

                    <?php
                   
                 }
                 ?> </table> <?php

                 if(isset($_GET['action'])){

                 if($_GET['action'] == 'delete' ){
                      

                  $pubC->SupprimerPublication($_GET['id_publication']);

                  header('location:modif_supp_pub.php');
                      
                 }

                 ?>
                         

                 <?php
                 }
            
                 

                  ?>


</div>

</body>
</html>