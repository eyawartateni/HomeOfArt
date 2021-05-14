<?php

require_once ('index.html');

include_once  '../../model/commande.php';
include_once '../../controller/commandeC.php';


$commandeC=new CommandeC();
    $listeCommande=$commandeC->afficherCommande();

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
                      
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> chercher Commande </title>
        
   
    </head>
    <body>
    
   
                          
        
        <hr>
        <form  action="rechercherCom.php" method="POST">

        <div class="mb-3">
   
    <input type="text" class="form-control" id="refcommande"  name="refcommande" placeholder="Search for refcommande"  aria-describedby="basic-addon2">
    <br>
    <br>
       <input type="submit" class="btn btn-secondary " style="color:black" value="rechercher" name="submit">
     
         
        
    </div>      
</form>
        <?php
        if(isset($_POST['refcommande'])  && isset($_POST['submit'])) 
        { 
            $liste=$commandeC->rechercheCommande($_POST['refcommande']);
            if ($liste !== false) {
    ?>
    
        <table  class="table  table-bordered" border=0 align = 'center'>
            <tr  class="table  table-bordered">
                
                <th>refcommande</th>
                <td>
                <th>prixtot</th>
                </td>
                <td>
                <th>idclient</th>
                <td>
                <th>detail</th>
           
              
                              
               
                
            </tr>

            <?PHP
                foreach($liste as $Commande){
            ?>
                <tr class="table  table-bordered">
                    <td><?PHP echo $Commande['refcommande']; ?></td>
                    <td>
                    <td><?PHP echo $Commande['prixtotal']; ?></td>
                    <td>
                    <td><?PHP echo $Commande['idclient']; ?></td>
                    <td>                  
                    <td><?PHP echo $Commande['detail']; ?></td>
               
                    
                    
                    
                </tr>
                <?php
                  }
                 ?>
        </table>

        <?php
                  }
                 ?>
            <?PHP
                }
            ?>
             
            </div>
        </div>
      
    </body>
    <body>

    </body>
</html>

