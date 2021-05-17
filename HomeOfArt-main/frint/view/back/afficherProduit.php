<?php 
///////////////ajout////////////////////
require_once ('index.html');

include "../../Model/produit.php";
include "../../Model/categorie.php";
include_once  '../../Controller/produitC.php';

include_once  '../../Controller/categorieC.php';


$error ="";
$user=null;
$userC =new produitC();

$cat = new categorieC();



?>




<!-- ////////////// html + navbar + sidebar ///////// -->




<!DOCTYPE html>
<html lang="en">                

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
                        <h1 id="tab" class="mt-4" >Produit</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">produit</li>
                            <li  class="breadcrumb-item"> <a href="afficherCategorie.php">Categorie</a>  </li>
                        </ol>
                        <div class="card mb-4">



                        <div class="d-flex justify-content-center">



<form action="" method="POST" enctype="multipart/form-data" class="w-50">
<br>
<input type="text"  name="libelle" id="libelle" class="form-control"  placeholder="libelle" autocomplete="off">


          <input type="text" name="categorie" id="categorie" class="form-control" list="pss" placeholder="categorie " autocomplete="off">

 <datalist id="pss">
     
<?php
         
         $pes=$cat->affichercategorie();
         while($rep=$pes->fetch(PDO::FETCH_OBJ)){?>
  <option value="<?php echo $rep->nom_cat?>"> 
  
  <?php  }
?>

</datalist>
          


    <input type="number" name="quantite" min="0" max="200" id="quantite" class="form-control" placeholder="quantite" autocomplete="off">
    <input type="number" name="prix" min="0" max="200" id="prix" class="form-control" placeholder="prix " autocomplete="off">

      <input type="text" name="descriptionP" id="descriptionP" class="form-control " placeholder="description" autocomplete="off" >
    
          <input class="form-control" type="file" name="fichier"><br><br>
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
    //print_r($_FILES['fichier']);
$content_dir = 'image/';

$tmp_file = $_FILES['fichier']['tmp_name'];

if (!is_uploaded_file($tmp_file))
{

    exit('fichier introuvable');
}

$type_file = $_FILES['fichier']['type'];

if (!strstr($type_file,'jpeg') && !strstr($type_file,'png') )
{
    exit("Ce fichier n'est pas une image");
}

$name_file= time().'.jpeg';

if(!move_uploaded_file($tmp_file,$content_dir.$name_file))
{
    exit('impossible de copier le fichier');
}

if(
isset($_POST['libelle']) &&
isset($_POST['categorie']) &&
isset ($_POST['prix']) &&
isset($_POST['quantite'])&&
isset($_POST['descriptionP'])
)
{
    if(
    !empty($_POST['libelle']) &&
    !empty($_POST['categorie']) &&
    !empty($_POST['prix']) &&
    !empty($_POST['quantite']) &&
    !empty($_POST['descriptionP']) 
    
    )
    {
        $user = new produit(
            $_POST['libelle'],
            $_POST['categorie'],
            $_POST['prix'],
            $_POST['quantite'],
            $_POST['descriptionP']
        );
        $userC->ajouterProduit($user,$name_file);
    }
else 
$error = "Missing information";

}
}
?>



                                              <!-- affichage produit -->

<?php 
$utilisateurC= new produitC();
$listeUsers= $utilisateurC->afficherProduit();
?>
</div>
            <div class="card-body">
             </div>
        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i id="liste" class="fas fa-table mr-1"></i>
                                Liste des Produit
                                <a style="position:absolute; right:4%;" href="exportProduit.php">export</a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>id Produit</th>
                                            <th>libelle</th>
                                                <th>categorie</th>
                                                <th>prix</th>
                                                <th>description</th>
                                                <th>quantite</th>
                                                <th>Supprimer</th>
                                                <th>Modifier</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php 
   foreach($listeUsers as $user) {
    ?>
    <tr>
    <td><?php echo $user['idproduit'] ;?></td>
   <td><?php echo $user['libelle'] ;?></td>
   <td><?php echo $user['categorie'] ;?></td>
   <td><?php echo $user['prix']; ?></td>
   <td><?php echo $user['descriptionP']; ?></td>
   <td><?php echo $user['quantite']; ?></td>
   <td>
   <form method="POST" action="supprod.php">
   <i class="fas fa-trash-alt btndelete"></i>	<input  type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $user['idproduit']; ?> name="idproduit">
						</form>
            </td>
            <td><i class="fas fa-edit btnedit"></i>
					<a href="modprod.php?idproduit=<?PHP echo $user['idproduit']; ?>">modifier</a>
                   
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
