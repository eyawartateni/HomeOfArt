<?PHP
require_once ('index.html');
include_once "../../controller/livreurC.php";
include_once  '../../model/livreur.php';
$livreurC=new LivreurC();
	$listelivreur=$livreurC->afficherLivreur();


?>

<!doctype html>
<html lang="en">

<head>
<title>Livreur</title>
  
</head>
    <body>
	<br>
    <br>

<div class="bg-info">	
<div class="container"> 


<table id="mauexport" class="table table-bordered" width=100% collaspacing="0" >
       
  <thead>

    <tr class="table-danger">
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">adresse</th>
	  <th scope="col">email</th>
	  <th scope="col">salaire</th>
	  <th scope="col">tel</th>
	  <th scope="col">affecter</th>
	  <th scope="col">Supprimer</th>
	  <th scope="col">Modifier</th>
    </tr>
  </thead>
  <tbody>   <?php
  	$listelivreur=$livreurC->afficherLivreur(); 
                                   
                                        foreach($listelivreur as $row){
                                        ?>

                                        <tr class="table-danger">
										<td><?php echo $row['idLivreur']; ?></td>
                                            <td><?php echo $row['nomLivreur']; ?></td>
											<td><?php echo $row['prenomLivreur']; ?></td>
                                            <td><?php echo $row['adresse']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['salaire']; ?></td>
											<td><?php echo $row['tel']; ?></td>
                                            <td>
                                    <a href="affecterLivraison.php?idLivreur= <?PHP echo $row['idLivreur'];?> "class="btn btn-danger"> Affecter Livreur </a>

                                </td>
                                            <td>
						<form method="POST" action="supprimerLivreur.php">
						
						<input type="submit" class="btn btn-info " style="color:black" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $row['idLivreur']; ?> name="idLivreur">
						</form>
					</td>
					<td>
                    <form method="POST" action="modifierLivreur.php">
					     <a class="btn btn-info " style="color:black" href="modifierLivreur.php?idLivreur= <?PHP echo $row['idLivreur'];?>"> Modifier </a> 
					
						
					
						</form>
                        
					</td>
                                            
                                      </tr>
                                <?php
                                }
                                ?>
                                    </tbody>
                                </table>

</div> 
				


<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>


</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	</body>
	</html> 
	</div>