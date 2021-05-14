<?php 
///////////////ajout////////////////////
require_once ('index.html');

include "../../Model/categorie.php";
include_once  '../../Controller/categorieC.php';


$error ="";
$user=null;
$userC =new categorieC();
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
                        <h1 id="tab" class="mt-4" >Categorie</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active"><a href="afficherProduit.php">produit</a></li>
                            <li  class="breadcrumb-item active">  Categorie </li>
                        </ol>
                        <div class="card mb-4">



                        <div class="d-flex justify-content-center">



<form action="" method="POST" enctype="multipart/form-data" class="w-50">
<br>
<input type="text"  name="nom_cat" id="nom_cat" class="form-control"  placeholder="nom_cat" autocomplete="off">

    <input type="number" name="stat_cat" min="0" max="200" id="stat_cat" class="form-control" placeholder="stat_cat" autocomplete="off">
  
      <br>
      
     <div class="d-flex justify-content-center">
     <input  type="submit" class="btn btn-success" value="ajouter" name="ajouter">
     </div>
</form>

                                <!-- ajout produit  -->


<?php 
if(isset ($_POST['ajouter']))
{
    extract($_POST);
 

if(
isset($_POST['nom_cat']) &&
isset($_POST['stat_cat'])
)
{
    if(
    !empty($_POST['nom_cat']) &&
    !empty($_POST['stat_cat'])
    
    )
    {
        
        $userC->ajouterCategorie($_POST['nom_cat'],$_POST['stat_cat']);
    }
else 
$error = "Missing information";

}
}
?>



                                              <!-- affichage categorie -->

<?php 
$utilisateurC= new categorieC();
$listeUsers= $utilisateurC->afficherCategorie();
?>
</div>
            <div class="card-body">
             </div>
        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i id="liste" class="fas fa-table mr-1"></i>
                                Liste des categories
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>nom_cat</th>
                                                <th>stat_cat</th>
                                                <th>supprimer</th>
                                                <th>modifier</th>
                                             
                                        
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php 
   foreach($listeUsers as $user) {
    ?>
    <tr>
   <td><?php echo $user['nom_cat'] ;?></td>
   <td><?php echo $user['stat_cat']; ?></td>
   <td>
   <form method="POST" action="supcat.php">
   <i class="fas fa-trash-alt btndelete"></i>	<input  type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $user['nom_cat']; ?> name="nom_cat">
						</form>
            </td>
            <td><i class="fas fa-edit btnedit"></i>
					<a href="modcat.php?nom_cat=<?PHP echo $user['nom_cat']; ?>">modifier</a>
                   
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
