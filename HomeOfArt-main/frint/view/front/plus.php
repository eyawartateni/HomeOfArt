<?php

require_once ('include/header.php');
include_once "../../config.php";
include_once '../../model/publication.php';
include_once '../../Controller/publicationC.php';
$db= config::getConnexion();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Publication</title>
    <meta charset="UTF-8">
  

    </style>


   

</head>
<body>
    


      <section class="section product-detail">
    <div class="details container-md">
      <div class="left">
        <div class="main">
          <img src="./include/images/<?php echo $_GET['image_name']  ?>" alt="">
        </div>
      </div>
      <div class="right">
        <!-- <span>Home/T-shirt</span> -->
        <?php
             $likes = $db->prepare('SELECT id_like FROM likes where id_publication = ?');
             $likes->execute(array($_GET['id_publication']));
             $likes=$likes->rowCount();

             $dislikes = $db->prepare('SELECT id_dislike FROM dislikes where id_publication = ?');
             $dislikes->execute(array($_GET['id_publication']));
             $dislikes=$dislikes->rowCount();

            

            ?>
        <h1>Titre:<?php echo $_GET['titre']  ?> </h1>
        <div class="price">Description: <?php echo $_GET['description']  ?>  </div>
        
        
        
        <form class="form">

        <h3>Publication Details</h3>
        <p> <?php echo $_GET['date_publication'] ?> </p>
        <br>
        <br>
        <p class="fas fa-thumbs-up"> : <?php echo   $likes ?> </p>
        <br>
        <br>
        <p class="fas fa-thumbs-down"> : <?php echo $dislikes ?> </p>
          
      </div>
    </div>
  </section>

</body>

</html>