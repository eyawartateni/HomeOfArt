<?php

session_start();

include_once "../../config.php";
include_once '../../model/commentaire.php';
include_once '../../Controller/commentaireC.php';



$error = "";
$pub  = null;
$comC = new CommentaireC();
$db= config::getConnexion();


?>



<?php

$id_client_commentaire=$_SESSION['id'];
$login_client_commentaire=$_SESSION['login'];




////////////////////////////////////



//////////////////////////////////

 //echo $donnees3['login'];



if(isset ($_POST['submit']))
{
extract($_POST);


if (

isset($_POST["message"]) 
) {
if (

!empty($_POST["message"])  

) {

$comC->ajouterCommentaireC_client($message,$_GET['id_publication'],$id_client_commentaire);

}
else
$error = "Missing information";
}



}





$reponse3 = $db->query("SELECT  login
FROM utilisateur u 
INNER JOIN commentaire c
ON (c.id_client_commentaire = u.id)
WHERE c.id_client_commentaire='$id_client_commentaire'") or die(print_r($db->errorInfo()));                           

$donnees3 = $reponse3->fetch();



?> 




<!DOCTYPE html>
<html lang="en">
<head>

    <title>Commentaires</title>
    
    <a href="Affichage_publication.php"  class="btn btn-primary">Retour à la page précédente</a>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">    <style type="text/css">
     section
     {
           width: 70%;
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

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<script src="script_omar.js" > </script>

<br>


<div class="center"><br><br>
      
       <section>
       

 
         
  <h3>Commentaires postés :</h3><br>

  <p> 
         <?php
            
           $req=$comC->afficherCommentaire($_GET['id_publication']);
           while($reponse=$req->fetch(PDO::FETCH_OBJ)){

            $reponse3 = $db->query("SELECT  login
FROM utilisateur u 
INNER JOIN commentaire c
ON (c.id_client_commentaire = u.id)
WHERE c.id_client_commentaire='$reponse->id_client_commentaire'") or die(print_r($db->errorInfo()));                           

$donnees3 = $reponse3->fetch();

$reponse4 = $db->query("SELECT  image_client
FROM utilisateur u 
INNER JOIN commentaire c
ON (c.id_client_commentaire = u.id)
WHERE c.id_client_commentaire='$reponse->id_client_commentaire'") or die(print_r($db->errorInfo()));                           

$donnees4 = $reponse4->fetch();

               ?>

       <span> <img style="width:50px;height:50px;border-radius:500px" src="./include/images/<?php echo $donnees4['image_client'] ?>"><br> Poster par <?php echo $donnees3['login']  ?>  le <?php echo $reponse->date_commentaire; ?> : </span><br><br>
       <?php echo $reponse->messages; ?><br><a href="reponse.php?id_commentaire=<?php echo $reponse->id_commentaire; ?>">Repondre</a>
       
        
       <br>

</p>


      



<?php 
}
         ?>



     

       </section>


       <div class="br"><br><br>
       <h2>Commenter :</h2><br>
 <form method="POST" action="">
      <textarea  name="message" placeholder="Message" id="message" required="" class="form form-control"></textarea><br>
      
      <div class="d-grid gap-2">
      <input  type ="submit" name="submit" value="Poster" required="" class ="btn btn-primary" onclick="return verifier();" ><br><br><br>
      </div>
  </form>
  </div>

</body>
</html>