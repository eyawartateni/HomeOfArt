<?php
require_once ('index.html');

    include "../../controller/categorieC.php";
    include_once '../../Model/categorie.php';

	$utilisateurC = new categorieC();
	$error = "";

	if (
        isset($_POST['nom_cat']) &&
         isset($_POST['stat_cat']) 
    ){
		if(!empty($_POST['nom_cat']) &&
        !empty($_POST['stat_cat']) 
    
    

        ) {

            $utilisateurC->ModifierCategorie($_POST['nom_cat'],$_POST['stat_cat']);
            //header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
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
                        <h1 id="tab" class="mt-4" >categorie</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">produit</li>
                            <li class="breadcrumb-item"><a href="afficherCategorie.php">categorie</a></li>
                        </ol>
                        <div class="card mb-4">

                        <?php
			if (isset($_GET['nom_cat'])){
				$user = $utilisateurC->recuperercategorie($_GET['nom_cat']);		
		?>

<br>		
 <div class="d-flex justify-content-center">
<form action="" method="POST" class="w-50">
<br>
<input type="text"  name="nom_cat" id="nom_cat" class="form-control"  placeholder=" nom categorie" autocomplete="off" value = "<?php echo $user['nom_cat']; ?>">
<br>
<input type="text" name="stat_cat" id="stat_cat" class="form-control" placeholder="statistique de categorie" autocomplete="off" value = "<?php echo $user['stat_cat']; ?>">
<br>
      <div class="d-flex justyfy-content-center">
      <input type="submit" class="btn btn-success" value="modifier" name="modifier">
            
      <button class="btn btn-warning"><a href="afficherCategorie.php">Retour</a><i class="bi bi-arrow-counterclockwise"></i></button>

    </div>
</form> 
</div>

		<?php
		}
		?>
	</body>
</html>