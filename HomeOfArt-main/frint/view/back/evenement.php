
<?php 
session_start();

///////////////ajout////////////////////
require_once ('index.html');
include "../../model/Evenement.php";
include_once  '../../controller/EvenementC.php';
include "../../config.php";

$id_artiste=$_SESSION['id'];

$error ="";
$user=null;
$userC =new UtilisateurC();

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
    isset($_POST['nom_event']) &&
isset($_POST['type_event']) &&
isset ($_POST['date_event']) &&
isset ($_POST['nbre_participants']) 

)
{
    if(
        !empty($_POST['nom_event']) &&
    !empty($_POST['type_event']) &&
    !empty($_POST['date_event']) &&
    !empty($_POST['nbre_participants']) 
    
    )
    {
        $user = new Utilisateur(
           
            $_POST['nom_event'],
            $_POST['type_event'],
            $_POST['date_event'],
            $_POST['nbre_participants'],
            $id_artiste
        );
        $userC->ajouterUtilisateur($user,$name_file);
    }
else 

$error = "Missing information";

}
}
?>


<?php 
//////////////affichage/////////
$utilisateurC= new UtilisateurC();
$listeUsers= $utilisateurC->afficherUtilisateur();

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
   <script src="./cs.js"></script>
                        <h1 id="tab" class="mt-4" >Evenements</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Evenement</li>
                            <li  class="breadcrumb-item"> <a href="billetterie.php">Billetterie</a>  </li>
                        </ol>
                        <div class="card mb-4">



                        <div class="d-flex justify-content-center">


                        
<form action="" method="POST" enctype="multipart/form-data" class="w-50">
<br>
<input type="text" name="artiste" value="<?php echo $id_artiste ?>" id="artiste" class="form-control " placeholder="artiste" autocomplete="off" Readonly>

<input type="text" name="nom_event" id="nom_event" class="form-control" placeholder="Nom de l'evenement" autocomplete="off">


<input type="date" name="date_event" id="date_event" class="form-control" placeholder="date de l'evenement" autocomplete="off">
    <input type="number" name="nbre_participants" min="0" max="200" id="nbre_participants" class="form-control" placeholder="nombre des participants" autocomplete="off">
  
    
    
      <input type="text" name="type_event" id="type_event" class="form-control " placeholder="type" autocomplete="off">
      <input class="form-control" type="file" name="fichier"><br><br>
      <br>
     
      
     <div class="d-flex justify-content-center">
     
     <input  type="submit" class="btn btn-success" value="ajouter" name="ajouter" onclick="return verifier();">
     
     </div>
    
   
   
    



</form>


</div>

                            <div class="card-body">
                                
                                
                                
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i id="liste" class="fas fa-table mr-1"></i>
                                Liste des événements
                            </div>
                            <div class="card-body">
                                <div  class="table-responsive">
                                <!---  Barre de recherche   --->
                               <input type="text" name="search_text" id="search_text" placeholder="chercher" class="form-control">
                               <!--      ------------------>
                                
                                
                               <div id="result">
                               
                               </div>
                                
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id event</th>
                                                <th>Nom event</th>
                                                <th>Type event</th>
                                                <th>Date event</th>
                                                <th>Nbre participants</th>
                                                <th>Artiste</th>
                                                <th>Supprimer</th>
                                                <th>Modifier</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id event</th>
                                                <th>Nom event</th>
                                                <th>Type event</th>
                                                <th>Date event</th>
                                                <th>Nbre participants</th>
                                                <th>Artiste</th>
                                                <th>Supprimer</th>
                                                <th>Modifier</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
   foreach($listeUsers as $user) {
    ?>
                                            <tr>
                                            <td><?php echo $user['id_event'] ;?></td>           
   <td><?php echo $user['nom_event'] ;?></td>
   <td><?php echo $user['type_event'] ;?></td>
   <td><?php echo $user['date_event']; ?></td>
   <td><?php echo $user['nbre_participants']; ?></td>
   <td><?php echo $user['artiste']; ?></td>
   <td>
   <form method="POST" action="supprimerEvent.php">
   <i class="fas fa-trash-alt btndelete"></i>	<input  type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $user['id_event']; ?> name="id_event">
						</form>
            </td>
            <td><i class="fas fa-edit btnedit"></i>
						
					<a href="modifierEvent.php?id_event=<?PHP echo $user['id_event']; ?>">modifier</a>
                    <?php 
                    
                    
                    ?>
                   
            </td>
          
         
                                            </tr>
                                            
                                            
                                            
                                            <?php } ?>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                           <center> <button class="primary"><a  href="exportEvent.php">Imprimer</a></button></center>
                           <center> <button class="primary"><a  href="tri_event.php">Trier</a></button></center>

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
        <script src="js/script.js"></script>
       
                                <script src="js/func.js"></script>
                               
                                
        
        

</script>
    </body>
</html>

<script>
$(document).ready(function()
{
    $('#search_text').keyup(function()
    {
        var txt= $(this).val();
        if(txt != '')
        {

        }
        else
        {
            $('#result').html('');
            $.ajax(
                {
                    url:"fetch.php",
                    method :"post",
                    data:{search:txt},
                    dataType: "text",
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
        }
    });
});
</script>
