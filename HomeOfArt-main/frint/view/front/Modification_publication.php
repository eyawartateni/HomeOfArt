<?php

session_start();
include_once "../../config.php";
include_once '../../model/publication.php';
include_once '../../Controller/publicationC.php';

$pubC = new PublicationC();
$db= config::getConnexion();

?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">
    <script src="omar.js" > </script>
    <style type="text/css">
    
    body
    {
      width: 100%;
      height: 100vh;
      background :#eee;
     }
    
     .center
    {
      width: 60%;
      margin-right: auto;
      margin-left: auto;
      background:#e2e8f0;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }


    </style>


    <title>Publication</title>
</head>
<body>
    
<a href="Affichage_publication_personnel.php"  class="btn btn-primary">Retour à la page précédente</a>
<script src="omar.js" > </script>
<div class ="center" ><br><br><br>

    <?php

    $error = "";
    $pub  = null;
    $pubC = new PublicationC();
    $db= config::getConnexion();
    ?>
    
   
   
    
    <?php
                 $id_client_publication=$_SESSION['id'];     

                  if(isset ($_POST['submit']))
                  {
                      extract($_POST);
                      
                      
                  
                      $pubC->ModifierPublication_client($_GET['id_publication'],$titre,$description,$id_client_publication);
                  }


                       $req_all_value = $db->prepare('SELECT *FROM publication WHERE id_publication=?');
                       $req_all_value->execute(array($_GET['id_publication']));
                       $reponses = $req_all_value->fetch(PDO::FETCH_OBJ);
                  ?>


                  <form method ="POST" action="" enctype="multipart/form-data"><br><br>

                  <input  type="text" name="titre" id="titre" value="<?php echo $reponses->titre ?>"  required="" class= "form form-control"><br>
                  <textarea name="description" id="Description" class= "form form-control" required><?php echo $reponses->description ?></textarea><br>

                  <div class="d-grid gap-2 col-6 mx-auto">
               <input type ="submit" name="submit" value="Modifier" class ="btn btn-primary" onclick="return verifier();"><br><br>
               </div>
             

               
             
               <div class="d-grid gap-2 col-6 mx-auto">
               <input type="reset" value="Annuler" class ="btn btn-primary" >
               </div>
                         

                 <?php
              
                 

                  ?>


</div>

</body>
</html>