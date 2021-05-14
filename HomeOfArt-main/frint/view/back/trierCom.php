<?php
require_once ('index.html');
include_once '../../Model/commande.php';
include_once '../../Controller/commandeC.php';


$error = "";
$pub  = null;
$comC = new CommandeC();
$db= config::getConnexion();


?>

<html>
    <head>
    <div class="card mb-4">
       <div class="card-header">
                 <i id="liste" class="fas fa-table mr-1"></i>
               commandes
            </div>
    
    <style type="text/css">
.center
    {
      width: 60%;
      margin-right: auto;
      margin-left: auto;
      background:#FFFFFF;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }
    .publication
    {
      display: flex;
      flex-wrap: wrap;
      align-content: space-around; 
      
  
    }

    .card
    {
      margin-right: 20px
      
    }

    body
    {
      width: 100%;
      height: 100vh;
      background :#FFFFFF;
    }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
                <main>
                <div class="center">
                    <div class="container-fluid">
                        <h1 id="tab" class="mt-4" >Commandes</h1>
                        </div>

<div  >
    
<!-- Je choisis mon critère de tri -->
<form method="get" action="trierCom.php">
                            <p>
                                <label for="tri"><h4> Trier  :</h4> </label><br>
    
                                    <select name="tri" id="tri" >
                                       <option value="refcommande" selected>refcommande</option>
                                       <option value="prixtotal">prixtotal</option>
                                       
                                    </select>
                              </p>
                              <br>
                              <div class="d-grid gap-2 mx-auto">
                                 <input type="submit" value="Trier" class ="btn btn-secondary" /> 
                                </div>  
                             </form>
        <br>
        <hr>

    
        <table  class="table  table-bordered" style= "width: 100%">
            <tr>
                
                 <th>refcommande</th>
                 <th>prixtotal</th>
                 <th>idclient</th>
                
                 <th>detail</th>
                
                
            </tr>


            <?php
            
            
            $tri = isset($_GET['tri']) ? $_GET['tri'] : 'refcommande';
            try
    {
        // On se connecte à MySQL
        $reponse = $db->query('SELECT refcommande,prixtotal,idclient,detail FROM commande ORDER BY '.$tri.'') or die(print_r($bdd->errorInfo()));  
          
                while($donnees = $reponse->fetch())
                {
                    echo  '<tr><td>'.$donnees['refcommande'],
                          '</td><td>'. $donnees['prixtotal'],
                          '</td><td>'. $donnees['idclient'],
                     
                          '</td><td>'. $donnees['detail'],
                        
                                                 
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
           
            </div>
        </div>
        
    </body>
</html>