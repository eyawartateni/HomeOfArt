<?php
session_start();


include_once "../../config.php";
include_once '../../model/reponse.php';
include_once '../../Controller/reponseC.php';

$error = "";
$pub  = null;
$comR = new ReponseC();
$db= config::getConnexion();


?>


<?php

if(isset ($_POST['submit']))
{
extract($_POST);


if (
isset($_POST["message"]) 
) {
if (
!empty($_POST["message"])  

) {

$comR->ajouterReponseC_client($messager,$reponse->id_commentaire,$id_client_reponse);

echo "Operation reussie";
}
else
$error = "Missing information";
}



}

$id_client_reponse=$_SESSION['id'];


$reponse4 = $db->query("SELECT  login
FROM utilisateur u 
INNER JOIN reponse r
ON (r.id_client_reponse = u.id)
WHERE r.id_client_reponse='$id_client_reponse'") or die(print_r($db->errorInfo()));                           

$donnees4 = $reponse4->fetch();



?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
     section
     {
           width: 60%;
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
      width: 60%;
      margin-right: auto;
      margin-left: auto;
      background:#e2e8f0;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }

     </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<br><br><br>

<div class="center"><br><br>


<section>
<h2>Reponses</h2><br>

<form method="POST" action="">
      <textarea  name=message placeholder="Message" required="" class="form form-control"></textarea><br>
      
      <div class="d-grid gap-2">
      <input  type ="submit" name="submit" value="Poster" required="" class ="btn btn-primary" ><br><br><br>
      </div>
  </form>

  <h3>Reponses postés</h3><br>

<p> 
       <?php
          
         $req=$comR->afficherReponse($_GET['id_commentaire']);
         while($reponseee=$req->fetch(PDO::FETCH_OBJ)){
             ?>
<p> 
     <span> Poster par <?php echo $donnees4['login'] ; ?> le <?php echo $reponseee->date_reponse; ?> </span><br>
     <?php echo $reponseee->messages; ?>

         
</p>



<?php 
}
       ?>





  </section>

</body>
</html>