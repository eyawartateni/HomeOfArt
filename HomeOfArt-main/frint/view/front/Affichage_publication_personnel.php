<?php
session_start();
ob_start();
require_once ('include/header.php');
include_once "../../config.php";
include_once '../../model/publication.php';
include_once '../../Controller/publicationC.php';

$pubC = new PublicationC();
$db= config::getConnexion();
?>

<!DOCTYPE html>
<html lang="en">


<head>
    
    <title>Publication</title>
    <meta charset="UTF-8">
  
    <style type="text/css">


     
    </style>
 

   

</head>
<body>
    

      <section class="section featured">
      <div class="title">
        <h1>Vos publications</h1>
         </div>

      <div class="product-center container" >
      <?php
            $id_client_publication=$_SESSION['id'];
            $req=$pubC->afficherPublication_client($id_client_publication);

            while($reponse=$req->fetch(PDO::FETCH_OBJ)){?>
        <div class="product" >
          <div class="product-header">
            <img src="./include/images/<?php echo $reponse->image_name?>" alt="">
            <ul class="icons">
            <a href="Modification_publication.php?id_publication=<?php echo $reponse->id_publication ?>   ">Modifier</a>
            <a href="?action=delete&id_publication=<?php echo $reponse->id_publication ?>">Supprimer</a>
            </ul>
          
          </div>
          
          <div class="product-footer" > 
            <h4 class="price"><?php echo $reponse->titre; ?></h4> <br>
               <a href="Espace_commentaire.php?id_publication=<?php echo $reponse->id_publication ?> "class="pss" >Comt</a>
               <a href="plus.php?titre=<?php echo $reponse->titre; ?>&description=<?php echo $reponse->description ?>&image_name=<?php echo $reponse->image_name  ?> &date_publication= <?php echo $reponse->date_publication ?>  "class="pss" >Plus</a>

             </div>
        </div>
        <?php  }
?>

<?php

if(isset($_GET['action'])){

if($_GET['action'] == 'delete' ){
     

 $pubC->SupprimerPublication_client($_GET['id_publication'],$id_client_publication);

 header('location:Affichage_publication_personnel.php');
     
}

?>
        

<?php
}



 ?>
    </div>

     
    </section>


</body>

</html>