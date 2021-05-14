<?php
session_start();
include_once "../../config.php";
include_once '../../model/publication.php';
include_once '../../Controller/publicationC.php';

$error = "";
$pub  = null;
$pubC = new PublicationC();
$db= config::getConnexion();

?>

<!DOCTYPE html>

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
      width: 60%;
      margin-right: auto;
      margin-left: auto;
      background:#e2e8f0;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }

    </style>

<a href="ProfilUser.php"  class="">Retour</a>

    <title>Publication administrateur</title>
</head>

<body>
    
<div class ="center"><br><br><br>
<h1>Publication :</h1><br><br><br>
<script src="script.js" > </script>

    <?php

                if(isset ($_POST['submit'])){

                    extract($_POST);

                    //print_r($_FILES['fichier']);

                    $content_dir = './include/images/';

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

                    $id_client_publication=$_SESSION['id'];

if (
    isset($_POST["titre"]) && 
    isset($_POST["Description"]) 
) {
    if (
        !empty($_POST["titre"]) && 
        !empty($_POST["Description"])  
        
    ) {
        $pubC->ajouterPublicationC($titre,$Description,$name_file,$id_client_publication);

        echo "Operation reussie";
    }
    else
        $error = "Missing information";
}



                }

                if(isset ($_POST['submits'])){

                    extract($_POST);
                    $id_client_publication=$_SESSION['id'];

if (
    isset($_POST["titre"]) && 
    isset($_POST["Description"]) 
) {
    if (
        !empty($_POST["titre"]) && 
        !empty($_POST["Description"])  
        
    ) {
        
        $vide="";
        $pubC->ajouterPublicationC($titre,$Description,$vide,$id_client_publication);

        echo "Operation reussie";
    }
    else
        $error = "Missing information";
}



                }              
                
                ?>

             


             
            <form   method ="POST" action="" enctype="multipart/form-data"><br><br>

           
                <input  type="text" name="titre" id="titre"  placeholder="Entrer le titre de la publication" required="" class= "form form-control"><br>
            
                <textarea name="Description" id="Description"  placeholder="Entrer le status" class= "form form-control"></textarea><br>
 
                

                <input class="form-control" type="file" name="fichier"><br><br>

               <div class="d-grid gap-2 col-6 mx-auto">
               <input type ="submit" name="submit" value="Partager avec image"  class ="btn btn-primary" onclick="verifier();"><br><br>
               </div>
             

               <div class="d-grid gap-2 col-6 mx-auto">
               <input type ="submit" name="submits" value="Partager sans image"  class ="btn btn-primary" onclick=" return verifier();"><br><br>
               </div>
             
               <div class="d-grid gap-2 col-6 mx-auto">
               <input type="reset" value="Annuler" class ="btn btn-primary" >
               </div>

            </form>

            



            <?php
            

          
    ?>

</div>



</body>

</html>