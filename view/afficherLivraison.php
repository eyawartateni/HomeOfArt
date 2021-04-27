<?php

require_once ('index.php');
include_once  '../model/livraison.php';
include_once '../controller/livraisonC.php';


$livraisonC=new LivraisonC();
	$listelivraison=$livraisonC->afficherLivraison();

?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title> Afficher Liste livraison </title>
		
   
    </head>
    <body>
	
	<img src="images/img3.png" alt="image" >
	
	
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
					<td><?PHP echo $livraison['idLiv']; ?></td>
                    <td>
                    <td><?PHP echo $livraison['idcmd']; ?></td>
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
                    
					     <a class="btn btn-info " style="color:black" href="modifierLivraison.php?idlivraison= <?PHP echo $livraison['idlivraison'];?>"> Modifier </a> 
					
						
                        
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
