<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/reponse.php';
include_once '../../Controller/reponseC.php';


$error = "";
$pub  = null;
$comC = new reponseC();
$db= config::getConnexion();

?>


<?php
if(isset ($_POST['submit']))
{
extract($_POST);


if (
isset($_POST["messages"]) 
) {
if (
!empty($_POST["messages"])  

) {

$comC->ModifierReponse($_GET['id_reponse'],$messages);
echo "Operation reussie";
}
else
$error = "Missing information";
}



}

$req_all_value = $db->prepare('SELECT *FROM commentaire WHERE id_commentaire=?');
$req_all_value->execute(array($_GET['id_commentaire']));
$reponses = $req_all_value->fetch(PDO::FETCH_OBJ);
?>     

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reponses</title>
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

<?php
			if (isset($_GET['id_reponse'])){
				$comment= $comC->recupererReponse($_GET['id_reponse']);
            }
				
		?>

<div class="center"><br><br><br>
      
       <section>
       <h2>Commentaires</h2><br>
 <form method="POST" action="">
      <input   name=messages value="<?php echo $comment['messages']; ?>" placeholder="Message" required="" class="form form-control" ><br><br>
      <input  type ="submit" name="submit" value="Modifier" required="" class ="btn btn-primary" ><br><br><br>
  </form>
         
     

       </section>
</body>


</html>