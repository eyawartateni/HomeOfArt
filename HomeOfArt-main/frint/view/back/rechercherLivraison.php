<?php

require_once ('index.html');
include_once  '../../model/livraison.php';
include_once '../../controller/livraisonC.php';


$livraisonC=new LivraisonC();
	$listelivraison=$livraisonC->afficherLivraison();
    

?>
<div class="bg-info">
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title> Rechercher livraison </title>
		
   
    </head>
    <body>
	
    <div class="row justify-content">
                            <div class="col-lg-12">
                                <div class=" border-0 rounded-lg mt-5">
                                   
                                    <div class="card-body">
	    
		<hr>
        <form  action="" method="POST">

        <div class="mb-3">
   
    <input type="text" class="form-control" id="adresse"  name="adresse" placeholder="Search for Adresse"  aria-describedby="basic-addon2">
    <br>
    <input type="text" class="form-control" id="etat"  name="etat" placeholder="Search for Etat"  aria-describedby="basic-addon2">
    <br>
    <input type="int" class="form-control" id="prix"  name="prix" placeholder="Search for prix" aria-describedby="basic-addon2" >
    <br>
       <input type="submit" class="btn btn-warning " style="color:black" value="Serach" name="submit">
       
     </div>
        
       



     
       </div>
                    </div>
             </div>
        
    </div>      
</form>

        <?php
        if(isset($_POST['adresse']) && isset($_POST['etat']) && isset($_POST['prix']) && isset($_POST['submit'])) 
        { 
            $liste=$livraisonC->recherche($_POST['adresse'],$_POST['etat'],$_POST['prix']);
            if ($liste !== false) {
    ?>
    
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
				foreach($liste as $livraison){
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
	</body>
</html>
</div>
