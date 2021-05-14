<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/publication.php';
include_once '../../Controller/publicationC.php';


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

      
      
    }

    .publication
    {
      display: flex;
      flex-wrap: wrap;
      align-content: space-around;
    }

    .card
    {
      margin-right: 60px
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

        <h1>Details :</h1><br>

<div class="publication">   

<div class="card mb-3" style="max-width: 100%;">
  <div class="row ">
    <div class="col-md-4">
    <img src="../front/include/images/<?php echo $_GET['image_name'] ?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $_GET['titre']  ?> </h5>
        <p class="card-text"><?php echo $_GET['description']  ?></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

        </div>
      </div>

</body>

</html>