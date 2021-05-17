<?php

require_once ('index.html');
include_once "../../config.php";
include "../../model/Evenement.php";
include_once  '../../controller/EvenementC.php';


$error = "";
$pub  = null;
$comC = new UtilisateurC();
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
      background :#FFFFFF;
     }
    
    .center
    {
      width: 55%;
      margin-right: auto;
      margin-left: auto;
      background:#FFFAF0;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }

    </style>
</head>
<body>
    


<div class ="center" ><br><br><br>
    
<!-- Je choisis mon critère de tri -->
<form method="get" action="tri_event.php">
                            <p>
                                <label for="tri"><h5> Afficher les Evenements selon :</h5> </label><br>
    
                                    <select name="tri" id="tri" class= "form form-control">
                                       <option value="date_event" selected>Date</option>
                                       <option value="id_event">Id</option>
                                       <option value="nbre_participants">Nombre</option>
                                    </select>
                              </p>
                              <br><br><br>
                              <div class="d-grid gap-2 col-6 mx-auto">
                                 <input type="submit" value="Trier" class ="btn btn-primary" /> 
                                </div>  
                             </form>
        <br>
        <br>

    
        <table class="table table-bordered table-secondary" style= "width: 100%">
            <tr class="table-secondary">
                
                                                <th>Id event</th>
                                                <th>Nom event</th>
                                                <th>Type event</th>
                                                <th>Date event</th>
                                                <th>Nbre participants</th>
                                                <th>Artiste</th>
               
                
            </tr>


            <?php
            
            
            $tri = isset($_GET['tri']) ? $_GET['tri'] : 'id_event';
            try
    {
        // On se connecte à MySQL
        $reponse = $db->query('SELECT * FROM evenement ORDER BY '.$tri.'') or die(print_r($bdd->errorInfo()));  
          
                while($donnees = $reponse->fetch())
                {
                    echo  '<tr><td>'.$donnees['id_event'],
                          '</td><td>'. $donnees['nom_event'],
                          '</td><td>'. $donnees['type_event'],
                          '</td><td>'. $donnees['date_event'],
                          '</td><td>'. $donnees['nbre_participants'],
                          '</td><td>'. $donnees['artiste'],                        
                        
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