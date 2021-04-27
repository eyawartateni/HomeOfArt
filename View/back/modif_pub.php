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
                      

                  if(isset ($_POST['submit']))
                  {
                      extract($_POST);
                      
                      
                    $content_dir = 'image/';

                    $tmp_file = $_FILES['fichier']['tmp_name'];

                    if (!is_uploaded_file($tmp_file)){

                        exit('fichier introuvable');
                    }

                    $type_file = $_FILES['fichier']['type'];

                    if (!strstr($type_file,'jpeg') && !strstr($type_file,'png') ){

                        exit("Ce fichier n'est pas une image");
                    }

                    $name_file= time().'.jpeg';

                    if(!move_uploaded_file($tmp_file,$content_dir.$name_file)){

                        exit('impossible de copier le fichier');
                    }
                       
                      $pubC->ModifierPublication($_GET['id_publication'],$titre,$description,$name_file);

                  }

                  if(isset ($_POST['submits']))

                  {   extract($_POST);
                      $vide="";
                      $pubC->ModifierPublication($_GET['id_publication'],$titre,$description, $vide);
                  }


                       $req_all_value = $db->prepare('SELECT *FROM publication WHERE id_publication=?');
                       $req_all_value->execute(array($_GET['id_publication']));
                       $reponses = $req_all_value->fetch(PDO::FETCH_OBJ);
                  ?>


                  <form method ="POST" action="" enctype="multipart/form-data"><br><br>

                  <input  type="text" name="titre" id="titre" value="<?php echo $reponses->titre ?>"  required="" class= "form form-control"><br>
                  <textarea name="description" id="Description" class= "form form-control" required><?php echo $reponses->description ?></textarea><br>
                  <input class="form-control" type="file" name="fichier"><br><br>

                  <div class="d-grid gap-2 col-6 mx-auto">
               <input type ="submit" name="submit" value="Modifier avec image"  class ="btn btn-primary" onclick="verifier();"><br><br>
               </div>
             

               <div class="d-grid gap-2 col-6 mx-auto">
               <input type ="submit" name="submits" value="Modifier sans image"  class ="btn btn-primary" onclick="verifier();"><br><br>
               </div>
             
               <div class="d-grid gap-2 col-6 mx-auto">
               <input type="reset" value="Annuler" class ="btn btn-primary" >
               </div>
                         

                 <?php
              
                 

                  ?>


</div>

</body>
</html>