<?php

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
        <h1>Les publications</h1>
         </div>

      <div class="product-center container" style="height: 100%;">
      <?php






            $req=$pubC->afficherPublication();
            while($reponse=$req->fetch(PDO::FETCH_OBJ)){?>

        <div class="product" >
          <div class="product-header">
            <img src="./include/images/<?php echo $reponse->image_name?>" alt="">
            <ul class="icons">
            <?php
             $likes = $db->prepare('SELECT id_like FROM likes where id_publication = ?');
             $likes->execute(array($reponse->id_publication));
             $likes=$likes->rowCount();

             $dislikes = $db->prepare('SELECT id_dislike FROM dislikes where id_publication = ?');
             $dislikes->execute(array($reponse->id_publication));
             $dislikes=$dislikes->rowCount();

            

            ?>
            
            <span><a  href="action.php?t=1&id_publication=<?php echo $reponse->id_publication ?>"><i class="fas fa-thumbs-up"></i></a><?= $likes?></span>
            
            <br>

            <span><a href="action.php?t=2&id_publication=<?php echo $reponse->id_publication ?>"><i class="fas fa-thumbs-down"></i></a><?= $dislikes?></span>
            <br>
            </ul>
           
          </div>
         
          
          <div class="product-footer "  > 
            <h4 class="price"><?php echo $reponse->titre; ?></h4> <br>
            
            <li><a href="plus.php?titre=<?php echo $reponse->titre; ?>&id_publication=<?php echo $reponse->id_publication?>&description=<?php echo $reponse->description ?>&image_name=<?php echo $reponse->image_name  ?> &date_publication= <?php echo $reponse->date_publication ?>  "class="pss" >Plus</a></li>

            <br>
            <li><a href="Espace_commentaire.php?id_publication=<?php echo $reponse->id_publication ?> "class="pss" >Commentaire</a></li>

            
             </div>
        </div>
        
        
        <?php  }
?>


                        

                      


    </div>

     
    </section>


</body>

</html>