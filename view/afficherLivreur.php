<?php

require_once ('index.php');
include_once  '../model/livreur.php';
include_once '../controller/livreurC.php';


$livreurC=new LivreurC();
	$listelivreur=$livreurC->afficherLivreur();

?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title> Afficher Liste livreur </title>
		
   
    </head>
    <body>
	
	<img src="images/img3.png" alt="image" >
	
	
	    <br>
		<hr>
	
		<table  class="table table-hover" border=0 align = 'center'>
			<tr class="table-danger">
                
				<th>Id</th>
                <td>
				<th>Nom</th>
                </td>
                <td>
				<th>Prenom</th>
                <td>
				<th>adresse</th>
                <td>
                <th>Email</th>
                
				<th>salaire</th>
                
                <th>Telephone</th>
				
			</tr>

			<?PHP
				foreach($listelivreur as $livreur){
			?>
				<tr class="table-danger">
					<td><?PHP echo $livreur['idLivreur']; ?></td>
                    <td>
					<td><?PHP echo $livreur['nomLivreur']; ?></td>
                    <td>
					<td><?PHP echo $livreur['prenomLivreur']; ?></td>
                    <td>
                    <td><?PHP echo $livreur['adresse']; ?></td>
                    <td>
					<td><?PHP echo $livreur['email']; ?></td>
					<td><?PHP echo $livreur['salaire']; ?></td>
                    <td><?PHP echo $livreur['tel']; ?></td>
					<td>
                                    <a href="affecterLivraison.php?idLivreur= <?PHP echo $livreur['idLivreur'];?> "class="btn btn-danger"> Affecter Livreur </a>

                                </td>
					<td>
						<form method="POST" action="supprimerLivreur.php">
						
						<input type="submit" class="btn btn-info " style="color:black" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $livreur['idLivreur']; ?> name="idLivreur">
						</form>
					</td>
					<td>
                    <form method="POST" action="modifierLivreur.php">
					     <a class="btn btn-info " style="color:black" href="modifierLivreur.php?idLivreur= <?PHP echo $livreur['idLivreur'];?>"> Modifier </a> 
					
						
					
						</form>
                        
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
