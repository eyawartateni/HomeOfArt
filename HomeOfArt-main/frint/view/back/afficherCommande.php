<?PHP
require_once ('index.html');
include_once "../../controller/commandeC.php";
include_once  '../../model/commande.php';
$commandeC=new CommandeC();
	$listeCom=$commandeC->afficherCommande();


?>

<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">
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
      background :#FFFAF0;
    }

    </style>


   
<div class="card mb-4">
       <div class="card-header">
                 <i id="liste" class="fas fa-table mr-1"></i>
                Liste des commandes
            </div>
  
</head>
    <body>
   
   
    <div id="layoutSidenav_content">
                <main>
                <div class="center">
                    <div class="container-fluid">
                        <h1 id="tab" class="mt-4" >Commandes</h1>
                        </div>
                      
    <div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered"  width="100%" cellspacing="0" >
       
  <thead>

    <tr>
      <th >refcommande</th>
      <th >prixtotal</th>
      <th >idclient</th>
      <th >etat</th>
      <th >detail</th>

	 
    </tr>
  </thead>
  <tbody>   <?php
  	$listeCom=$commandeC->afficherCommande(); 
                                   
                                        foreach($listeCom as $Commande){
                                        ?>
                                        <tr>
										<td><?PHP echo $Commande['refcommande']; ?></td>    
					<td><?PHP echo $Commande['prixtotal']; ?></td>
                	<td><?PHP echo $Commande['idclient']; ?></td>
					<td><?PHP echo $Commande['etat']; ?></td>
                  <td><?PHP echo $Commande['detail']; ?></td>
			
                  
                                            
                                      </tr>
                                <?php
                                }
                                ?>
                                    </tbody>
                                </table>
                                <a  class="btn btn-secondary " style="color:black" href="rechercherCom.php">rechercher</a>
		<a  class="btn btn-secondary " style="color:black" href="trierCom.php">trier</a>
                                </div>
                            </div>
                            </div>
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




	</body>
	</html> 
	