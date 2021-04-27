<?php
require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/publication.php';
include_once '../../Controller/publicationC.php';


$pubC = new PublicationC();
$db= config::getConnexion();


?>



<!DOCTYPE html>
<html lang="en">


<head>
    
    <title>Publication</title>
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
    <h1>Publication</h1><br><br><br>
   </div>
   
  





<div class="publication">   

<?php


$req=$pubC->afficherPublication();

while($reponse=$req->fetch(PDO::FETCH_OBJ)){?>

<div class="card text-dark bg-light mb-3" style="width: 15rem;">

<img src="image/<?php echo $reponse->image_name ?>" class="card-img-top" alt="...">
<div class="card-body" >
<h5 class="card-title"> <?php echo $reponse->titre; ?> </h5>
<p class="card-text"><?php echo $reponse->description; ?> </p>
<a href="plus.php?titre=<?php echo $reponse->titre; ?>&description=<?php echo $reponse->description ?>&image_name=<?php echo $reponse->image_name  ?>  " class="btn btn-primary">Plus</a>
<a href="espacecommentaire.php?id_publication=<?php echo $reponse->id_publication ?>" class="btn btn-primary">Commentaire</a>
</div>
</div>


<?php  }
?>

        </div>
      </div>

</body>

</html>