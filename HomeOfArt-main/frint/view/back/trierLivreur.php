<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../model/livreur.php';
include_once '../../controller/livreurC.php';


$error = "";
$livreur  = null;
$livreurC = new LivreurC();
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
    
    
</head>
<body>
    


<div class ="center" ><br><br><br>
    
<!-- Je choisis mon critère de tri -->
<form method="get" action="trierLivreur.php">
                            <p>
                                <br>
    
                                    <select name="tri" id="tri" class="form-control" >
                                       <option value="idLivreur" selected>idLivreur</option>
                                       <option value="adresse">adresse</option>
                                       <option value="salaire">salaire</option>
                                    </select>
                              </p>
                              <br><br><br>
                              <div class="d-grid gap-2 col-6 mx-auto">
                                 <input type="submit" value="Trier" class ="btn btn-danger" /> 
                                </div>  
                             </form>
        <br>
        <hr>

        
        <table class="table table-hover" style= "width: 100%">
        <tr class="table-danger">
                
                 <th>idLivreur</th>
                 <th>nomLivreur</th>
                 <th>prenomLivreur</th>
                 <th>adresse</th>
                 <th>email</th>
                 <th>tel</th>
                 <th>salaire</th>
               
                
            </tr>


            <?php
            
            
            $tri = isset($_GET['tri']) ? $_GET['tri'] : 'idLivreur';
            try
    {
        // On se connecte à MySQL
        $reponse = $db->query('SELECT * FROM livreur ORDER BY '.$tri.'') or die(print_r($bdd->errorInfo()));  
          
                while($donnees = $reponse->fetch())
                {
                    echo  '<tr><td>'.$donnees['idLivreur'],
                          '</td><td>'. $donnees['nomLivreur'],
                          '</td><td>'. $donnees['prenomLivreur'],
                          '</td><td>'. $donnees['adresse'],
                          '</td><td>'. $donnees['email'],
                          '</td><td>'. $donnees['tel'],
                          '</td><td>'. $donnees['salaire'],
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
