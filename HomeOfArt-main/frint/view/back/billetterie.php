
<?php 
///////////////ajout////////////////////
include "../../model/Billet.php";
include_once  '../../controller/BilletC.php';
require_once ('index.html');


$error ="";
$userb=null;
$userBC =new BilletC();






if(
    isset($_POST['id_evenement']) &&
isset($_POST['prix']) &&

isset ($_POST['nbre']) 


)
{
    if(
        !empty($_POST['id_evenement']) &&
    
    !empty($_POST['nbre']) &&
    !empty($_POST['prix']) 
    
    )
    {
        $userb = new Billet(
            
            $_POST['id_evenement'],
            
            $_POST['nbre'],
            $_POST['prix']
        );
        $userBC->ajouterBillet($userb);
    }
else 

$error = "Missing information";

}

?>


<?php 
//////////////affichage/////////
$billetC= new BilletC();
$listeUsersb= $billetC->afficherBillet();

?>




<!-- ////////////// html + navbar + sidebar ///////// -->




<!DOCTYPE html>
<html lang="en">                
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div style="  width: 80%;
  padding-right: 0.75rem;
  padding-left: 0.75rem;
  margin-right: auto;
  margin-left: auto;
  position: absolute;
  top:20%;
  left:17%;
  ">
                        <h1 id="tab" class="mt-4" >Billetterie</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Billetterie</li>
                            <li  class="breadcrumb-item"> <a href="evenement.php">Evenements</a>  </li>
                        </ol>
                        <div class="card mb-4">



                        <div class="d-flex justify-content-center">

<form action="" method="POST" class="w-50">
<br>

<input type="number" name="id_evenement" id="id_evenement" class="form-control" placeholder="ID evenement" autocomplete="off">


<input type="float" name="prix" id="prix" class="form-control" placeholder="prix du billet" autocomplete="off">
    <input type="number" name="nbre" min="0" max="200" id="nbre" class="form-control" placeholder="nombre restant" autocomplete="off">
  
    
    
      <br>
     
      
     <div class="d-flex justify-content-center">
     <input  type="submit" class="btn btn-success" value="ajouter" name="ajouter">
     </div>
    
   
   
    



</form>


</div>

                            <div class="card-body">
                                
                                
                                
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i id="liste" class="fas fa-table mr-1"></i>
                                Liste des billets
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id billet</th>
                                                <th>Id evenement</th>
                                                <th>Prix</th>
                                                
                                                <th>Nbre des billets</th>
                                                
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id billet</th>
                                                <th>Id evenement</th>
                                                <th>Prix</th>
                                                
                                                <th>Nbre des billets</th>
                                                
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
   foreach($listeUsersb as $userb) {
    ?>
                                            <tr>
                                            <td><?php echo $userb['id_billet']; ?></td>
   <td><?php echo $userb['id_evenement'] ;?></td>
 
   
   <td><?php echo $userb['nbre']; ?></td>
   <td><?php echo $userb['prix']; ?></td>
   <td>
   <form method="POST" action="supprimerBillet.php">
   <i class="fas fa-trash-alt btndelete"></i>	<input  type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $userb['id_billet']; ?> name="id_billet">
						</form>
            </td>
            <td><i class="fas fa-edit btnedit"></i>
						
					<a href="modifierbillet.php?id_billet=<?PHP echo $userb['id_billet']; ?>">modifier</a>
                    <?php 
                    
                    
                    ?>
                   
            </td>
          
         
                                            </tr>
                                            
                                            
                                            
                                            <?php } ?>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
