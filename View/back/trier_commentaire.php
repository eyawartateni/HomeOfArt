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
    
<!-- Je choisis mon critère de tri -->
<form method="get" action="trier_commentaire.php">
                            <p>
                                <label for="tri"><h4> Trier  :</h4> </label><br>
    
                                    <select name="tri" id="tri" >
                                       <option value="id_commentaire" selected>id_commentaire</option>
                                       <option value="pseudo">pseudo</option>
                                       <option value="messages">messages</option>
                                    </select>
                              </p>
                              <br><br><br>
                              <div class="d-grid gap-2 col-6 mx-auto">
                                 <input type="submit" value="Trier" class ="btn btn-primary" /> 
                                </div>  
                             </form>
        <br>
        <hr>

    
        <table class="table table-success table-striped" style= "width: 100%">
            <tr>
                
                 <th>id_commentaire</th>
                <th>pseudo</th>
                <th>messages</th>
                <th>date_commentaire</th>
               
                
            </tr>


            <?php
            
            
            $tri = isset($_GET['tri']) ? $_GET['tri'] : 'id_commentaire';
            try
    {
        // On se connecte à MySQL
        $reponse = $db->query('SELECT id_commentaire,pseudo,messages,date_commentaire FROM commentaire ORDER BY '.$tri.'') or die(print_r($bdd->errorInfo()));  
          
                while($donnees = $reponse->fetch())
                {
                    echo  '<tr><td>'.$donnees['id_commentaire'],
                          '</td><td>'.$donnees['pseudo'],
                          '</td><td>'. $donnees['messages'],
                          '</td><td>'. $donnees['date_commentaire'],
                        
                          '</td></tr>';
                    }
             
            $reponse->closeCursor();
            }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    ?>
            
          
    
        

        </table>

       
       
            </div>   
    </body>
</html>