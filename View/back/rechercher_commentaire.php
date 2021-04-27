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

  

<
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Commentaires</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">
    
    <style type="text/css">
    
    body
    {
      width: 100%;
      height: 100vh;
      background :#eee;
     }
    
    .center
    {
      width: 65%;
      margin-right: auto;
      margin-left: auto;
      background:#D3D3D3;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }

    </style>
</head>
<body>
    


<div class ="center" ><br><br><br>
    
<form  action="rechercher_commentaire.php" method="POST">

<label for="titre"> <h6> Veuillez saisir l'identifiant de commentaire cherché :</h6> </label>
<br>
    <input type="text" name="id_commentaire"  maxlength="50" placeholder="Entrer l'identifiant" required="" class= "form form-control">
    <br>
    <br>
    <br>
    <div class="d-grid gap-2 col-6 mx-auto">
    <input type="submit" value="Rechercher" name="submit" class ="btn btn-primary">
    </div>    
</form>
    
        <br>
        <hr>

        <?php
        if(isset($_POST['id_commentaire']) && isset($_POST['submit'])) 
        { 
            $liste=$comC->RechercherCommentaire($_POST['id_commentaire']);
            if ($liste !== false) {
    ?>
        <table class="table table-success table-striped" style= "width: 100%">
            <tr>
                
                <th>id_commentaire</th>
                <td>
                <th>pseudo</th>
                </td>
                <td>
                <th>messages</th>
                <td>
                <th>date_commentaire</th>
                <td>
                <th>id_publication</th>
                
               
                
            </tr>


            <?php
            
                 foreach($liste as $comment){
            ?>

                <tr class="table table-success table-striped">

                    <td><?PHP echo $comment['id_commentaire']; ?></td>
                    <td>
                    <td><?PHP echo $comment['pseudo']; ?></td>
                    <td>
                    <td><?PHP echo $comment['messages']; ?></td>
                    <td>
                    <td><?PHP echo $comment['date_commentaire']; ?></td>
                    <td>
                    <td><?PHP echo $comment['id_publication_commentaire']; ?></td>
         
                </tr>

            <?php
                }
            ?>

        </table>

       
          <?php
        }
        
        ?>
         <?php
        }
        ?>
            </div>   
    </body>
</html>