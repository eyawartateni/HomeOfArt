<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/publication.php';
include_once '../../Controller/publicationC.php';

?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">
    <script src="script.js" > </script>
    <style type="text/css">
    
    body
    {
      width: 100%;
      height: 100vh;
      background :#FFFFFF;
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


    <title>Publication administrateur</title>
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
                      


                  if(isset ($_POST['submits']))

                  {   extract($_POST);
                      $pubC->ModifierPublication($_GET['id_publication'],$titre,$description);
                  }


                       $req_all_value = $db->prepare('SELECT *FROM publication WHERE id_publication=?');
                       $req_all_value->execute(array($_GET['id_publication']));
                       $reponses = $req_all_value->fetch(PDO::FETCH_OBJ);
                  ?>


                  <form method ="POST" action="" enctype="multipart/form-data"><br><br>

                  <input  type="text" name="titre" id="titre" value="<?php echo $reponses->titre ?>"  required="" class= "form form-control"><br>
                  <textarea name="description" id="Description" class= "form form-control" required><?php echo $reponses->description ?></textarea><br>

            
             

               <div class="d-grid gap-2 col-6 mx-auto">
               <input type ="submit" name="submits" value="Modifier"  class ="btn btn-primary" onclick="verifier();"><br><br>
               </div>
             
               <div class="d-grid gap-2 col-6 mx-auto">
               <input type="reset" value="Annuler" class ="btn btn-primary" >
               </div>
                         

                 <?php
              
                 

                  ?>


</div>

</body>
</html>