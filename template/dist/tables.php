
<?php 
///////////////ajout////////////////////
include "../Model/Utilisateur.php";
include_once  '../Controller/UtilisateurC.php';


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
isset ($_POST['nbre_participants']) &&
isset($_POST['artiste'])

)
{
    if(
        !empty($_POST['nom_event']) &&
    !empty($_POST['type_event']) &&
    !empty($_POST['date_event']) &&
    !empty($_POST['nbre_participants']) &&
    !empty($_POST['artiste']) 
    
    )
    {
        $user = new Utilisateur(
           
            $_POST['nom_event'],
            $_POST['type_event'],
            $_POST['date_event'],
            $_POST['nbre_participants'],
            $_POST['artiste']
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




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
<!--
function testInput()
{
 var exp = new RegExp("^[a-zA-Z]*$","g");
 var data = document.getElementById("nom_event").value;
 alert(exp.text(data));
 
}
//-->
</script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 id="tab" class="mt-4" >Evénements</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Evenements</li>
                            <li class="breadcrumb-item"><a href="billetterie.php">Billetterie</a></li>
                        </ol>
                        <div class="card mb-4">



                        <div class="d-flex justify-content-center">
<form action="" method="POST" enctype="multipart/form-data" class="w-50">
<br>
<!-- <input type="number"  name="id_event" id="id_event" class="form-control"  placeholder="ID evenement" autocomplete="off"> -->
<input type="text" name="nom_event" id="nom_event" class="form-control" placeholder="Nom de l'evenement" autocomplete="off">


<input type="date" name="date_event" id="date_event" class="form-control" placeholder="date de l'evenement" autocomplete="off">
    <input type="number" name="nbre_participants" min="0" max="200" id="nbre_participants" class="form-control" placeholder="nombre des participants" autocomplete="off">
  
      <input type="text" name="artiste" id="artiste" class="form-control " placeholder="artiste" autocomplete="off">
    
    
      <input type="text" name="type_event" id="type_event" class="form-control " placeholder="type" autocomplete="off">
      <input class="form-control" type="file" name="fichier"><br><br>
      <br>
     
      
     <div class="d-flex justify-content-center">
     <input  type="submit" class="btn btn-success" value="ajouter" name="ajouter" onclick="testInput();">
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id event</th>
                                                <th>Nom event</th>
                                                <th>Type event</th>
                                                <th>Date event</th>
                                                <th>Nbre participants</th>
                                                <th>Artiste</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                                
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
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
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
   <form method="POST" action="supprimerUser.php">
   <i class="fas fa-trash-alt btndelete"></i>	<input  type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $user['id_event']; ?> name="id_event">
						</form>
            </td>
            <td><i class="fas fa-edit btnedit"></i>
						
					<a href="tables1.php?id_event=<?PHP echo $user['id_event']; ?>">modifier</a>
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
        <script src="js/script.js"></script>
        
        
    </body>
</html>
