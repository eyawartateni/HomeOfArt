<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/commentaire.php';
include_once '../../Controller/commentaireC.php';


$error = "";
$pub  = null;
$comC = new CommentaireC();
$db= config::getConnexion();

$req=$comC->afficherCommentaires();

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
    
   

    
        <br>
        <hr>

      

        <table class="table table-success table-striped" style= "width: 100%">
            <tr >
                
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

            <?PHP
                foreach($req as $comment){
            ?>
                <tr class="table table-success table-striped" id="table">
                    <td><?PHP echo $comment['id_commentaire']; ?></td>
                    <td>
                    <td><?PHP echo $comment['pseudo']; ?></td>
                    <td>
                    <td><?PHP echo $comment['messages']; ?></td>
                    <td>
                    <td><?PHP echo $comment['date_commentaire']; ?></td>
                    <td>
                    <td><?PHP echo $comment['id_publication_commentaire']; ?></td>
                    
                   
                    <td>
                        <form method="POST" action="supprimerCommentaire.php">
                        
                        <input type="submit" class="btn btn-info btn-sm" name="supprimer" value="supprimer">
                        <input type="hidden" value=<?PHP echo $comment['id_commentaire']; ?> name="id_commentaire">
                        </form>
                    </td>
                    <td>
                         <a class="btn btn-info " style="color:black" href="modifierCommentaire.php?id_commentaire=<?PHP echo $comment['id_commentaire']; ?>"> Modifier </a> 
                    

                        
                    </td>
                </tr>
            <?PHP
                }
            ?>
        </table>
      

<?php
        if( isset($_POST['submit'])) 
        { 
            $liste=$comC->trierCommentaires();
            
    ?>
    
        <table  id="table" >
            <tr >
                
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

            <?PHP
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
                    
                   
                    <td>
                        <form method="POST" action="supprimerCommentaire.php">
                        
                        <input type="submit" class="btn btn-info btn-sm" name="supprimer" value="supprimer">
                        <input type="hidden" value=<?PHP echo $comment['id_commentaire']; ?> name="id_commentaire">
                        </form>
                    </td>
                    <td>
                         <a class="btn btn-info " style="color:black" href="modifierCommentaire.php?id_commentaire=<?PHP echo $comment['id_commentaire']; ?>"> Modifier </a> 
                    

                        
                    </td>
                </tr>
            <?PHP
                }
            ?>
        </table>
        <?php
        }
        ?>





            </div>   
    </body>
</html>