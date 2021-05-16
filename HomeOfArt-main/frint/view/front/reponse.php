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



$id_client_reponse=$_SESSION['id'];
$login_client_reponse=$_SESSION['login'];
$login_client_image=$_SESSION['image_client'];

if(isset ($_POST['submit']))
{
extract($_POST);


if (
isset($_POST["message"]) 
) {
if (
!empty($_POST["message"])  

) {

$comR->ajouterReponseC_client($message,$_GET['id_commentaire'],$id_client_reponse);

}
else
$error = "Missing information";
}



}







?>


<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">     <style type="text/css">
     section
     {
           width: 60%;
           margin-left:auto;
           margin-right:auto;
     } 

     .br
     {
      width: 45%;
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


    body
    {
      width: 100%;
      height: 100vh;
      background :#F0F8FF;
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


  <h3>Reponses postés :</h3><br>

<p> 
       <?php
          
         $req=$comR->afficherReponse($_GET['id_commentaire']);
         while($reponseee=$req->fetch(PDO::FETCH_OBJ)){

          $reponse4 = $db->query("SELECT  login 
FROM utilisateur u 
INNER JOIN reponse r
ON (r.id_client_reponse = u.id)
WHERE r.id_client_reponse= '$reponseee->id_client_reponse'") or die(print_r($db->errorInfo()));                           

$donnees4 = $reponse4->fetch();

$reponse5 = $db->query("SELECT  image_client
FROM utilisateur u 
INNER JOIN reponse r
ON (r.id_client_reponse = u.id)
WHERE r.id_client_reponse= '$reponseee->id_client_reponse'") or die(print_r($db->errorInfo()));                           

$donnees5 = $reponse5->fetch();

             ?>
<p> 
     
     <span> <img style="width:50px;height:50px;border-radius:500px" src="./include/images/<?php echo $donnees5['image_client'] ?>"><br> Poster par <?php echo $donnees4['login']  ?> le <?php echo $reponseee->date_reponse; ?> </span><br>
     <?php echo $reponseee->messages; ?>

         
</p>



<?php 
}
       ?>





  </section>

  <div class="br"><br><br>
  <h2>Repondre :</h2><br>

<form method="POST" action="">
      <textarea  name=message placeholder="Message" required="" class="form form-control"></textarea><br>
      
      <div class="d-grid gap-2">
      <input  type ="submit" name="submit" value="Poster" required="" class ="btn btn-primary" ><br><br><br>
      </div>
  </form>
  </div>

</body>
</html>