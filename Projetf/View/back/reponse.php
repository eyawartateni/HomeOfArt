<?php
require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/reponse.php';
include_once '../../Controller/reponseC.php';


$error = "";
$pub  = null;
$comC = new ReponseC();
$db= config::getConnexion();


?>


<?php

if(isset ($_POST['submit']))
{
extract($_POST);


if (
isset($_POST["pseudo"]) && 
isset($_POST["message"]) 
) {
if (
!empty($_POST["pseudo"]) && 
!empty($_POST["message"])  

) {

$comC->ajouterReponseC($pseudo,$message,$_GET['id_commentaire']);

echo "Operation reussie";
}
else
$error = "Missing information";
}



}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Commentaires</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
     section
     {
           width: 80%;
           margin-left:auto;
           margin-right:auto;
     } 

     span
     {
       font-size: 13px;
       color : #777;

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

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<br>


<div class="center"><br><br>
<section>

<br>
<h2>Reponses</h2><br>
 <form method="POST" action="">
      <input type="text" name=pseudo placeholder="Pseudo" required="" class="form form-control" ><br><br>
      <textarea  name=message placeholder="Message" required="" class="form form-control"></textarea><br><br>
      <input  type ="submit" name="submit" value="Poster" required="" class ="btn btn-primary" ><br><br><br>
  </form>

  <h3>Reponses postés</h3><br>

<p> 
       <?php
          
         $req=$comC->afficherReponse($_GET['id_commentaire']);
         while($reponseee=$req->fetch(PDO::FETCH_OBJ)){
             ?>
<p> 
     <span> Poster par <?php echo $reponseee->pseudo ; ?> le <?php echo $reponseee->date_reponse; ?> </span><br>
     <?php echo $reponseee->messages; ?> 

         
</p>
<?php 
}
       ?>


  </section>

</body>
</html>