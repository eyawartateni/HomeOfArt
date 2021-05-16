<?php

require_once ('index.html');
include_once  '../../model/livraison.php';
include_once '../../controller/livraisonC.php';


$livraisonC=new LivraisonC();
	$listelivraison=$livraisonC->afficherLivraison();

	

?>
<html>
	<head>
	<title> liste livraison </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		
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
	<div class="center">
	<br>
	<br>
	
	<form  action="rechercherLivraison.php"  method="POST">
	<input type="submit" class="btn btn-warning " href="rechercherLivraison.php" style="color:black" value="Serach" name="submit">
	</form>
	    <br>
		<hr>
	
		<table  class="table table-hover" border=0 align = 'center'>
			<tr class="table-danger">
                
				<th>Id</th>
                <td>
				<th>Date</th>
                </td>
                <td>
				<th>Livreur</th>
                <td>
				<th>Commande</th>
                <td>
                <th>Etat</th>
                
				<th>Prix</th>
                
                <th>Adresse</th>
				
			</tr>

			<?PHP
				foreach($listelivraison as $livraison){
			?>
				<tr class="table-danger">
					<td><?PHP echo $livraison['idlivraison']; ?></td>
                    <td>
					<td><?PHP echo $livraison['datelivraison']; ?></td>
                    <td>
					<td><?PHP echo $livraison['idLivreur']; ?></td>
                    <td>
                    <td><?PHP echo $livraison['idCommande']; ?></td>
                    <td>
					<td><?PHP echo $livraison['etat']; ?></td>
					<td><?PHP echo $livraison['prix']; ?></td>
                    <td><?PHP echo $livraison['adresse']; ?></td>
					
					<td>
						<form method="POST" action="supprimerLivraison.php">
						
						<input type="submit" class="btn btn-info " style="color:black" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $livraison['idlivraison']; ?> name="idlivraison">
						</form>
					</td>
					<td>
                    <form method="POST" action="modifierLivraison.php">
					     <a class="btn btn-info " style="color:black" href="modifierLivraison.php?idlivraison= <?PHP echo $livraison['idlivraison'];?>"> Modifier </a> 
					
						
					
						</form>
                        
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
</div>
