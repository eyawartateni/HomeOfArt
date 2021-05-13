<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/reponse.php';
include_once '../../Controller/reponseC.php';



$error = "";
$pub  = null;
$comC = new ReponseC();
$db= config::getConnexion();

$req=$comC->afficherReponses();

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
      width: 70%;
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
    
   
    
    
        <br>
        <hr>
    
        <table class="table table-success table-striped" width=100% collaspacing="0">

        <thead>
            <tr >
                
              
                <th scope="col">id_reponse</th>
                <th scope="col">id_commentaire_reponse</th>
                <th scope="col">messages</th>
                <th scope="col">date_reponse</th>
                <th scope="col">id_client_reponse </th>
     
                <th scope="col">Supprimer</th>
                <th scope="col">Modifier</th>
                
               
                
            </tr>
</thead>

            <?PHP
                foreach($req as $comment){
            ?>
               

                    <tr class="table table-success table-striped">

                                        <td><?php echo $comment['id_reponse']; ?></td>
                                        <td><?php echo $comment['id_commentaire_reponse']; ?></td>
                                        <td><?php echo $comment['messages']; ?></td>
                                        <td><?php echo $comment['date_reponse']; ?></td>
                                        <td><?php echo $comment['id_client_reponse']; ?></td>
                                            
                                
                                            
                    
                   
                    <td>
                        <form method="POST" action="supprimerReponse.php">
                        
                        <input type="submit" class="btn btn-info btn-sm" name="supprimer" value="supprimer">
                        <input type="hidden" value=<?PHP echo $comment['id_reponse']; ?> name="id_reponse">
                        </form>
                    </td>
                    <td>
                    <form method="POST" action="modifierReponse.php">
                         <a class="btn btn-info " style="color:black" href="modifierReponse.php?id_reponse= <?PHP echo $comment['id_reponse'];?>"> Modifier </a> 
                    
                
                        </form>
                        
                    </td>
                </tr>
            <?PHP
                }
            ?>
        </table>
            </div>   
    </body>
</html>