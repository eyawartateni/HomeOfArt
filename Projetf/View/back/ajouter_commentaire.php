<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/commentaire.php';
include_once '../../Controller/commentaireC.php';


$error = "";
$pub  = null;
$comC = new CommentaireC();
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

$comC->ajouterCommentaireC($pseudo,$message,$_GET['id_publication']);

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
<br>
       <section>
       <h2>Commentaires</h2><br>
 <form method="POST" action="">
      <input type="text" name=pseudo placeholder="Pseudo" required="" class="form form-control" ><br>
      <textarea  name=message placeholder="Message" required="" class="form form-control"></textarea><br>
      <input  type ="submit" name="submit" value="Poster" required="" class ="btn btn-primary" ><br><br><br>
  </form>
         
       </section>
</body>
</html>