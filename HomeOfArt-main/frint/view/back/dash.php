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
      background:#FFFAF0;
      
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
      background :#FFFFFF;
    }
    

    </style>


   

</head>
<body>
<div class=""><br><br><br>
      <div class="py-3 text-center">
    <h1>Home of art</h1><br>
<img class="rounded mx-auto d-block" src="images/logo.jpg" alt="logo" width="100%" height="100%">
      
      </div>

</body>

</html>