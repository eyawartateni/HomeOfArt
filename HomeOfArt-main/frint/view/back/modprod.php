<?php
    include "../../controller/produitC.php";
    include_once '../../Model/produit.php';
    require_once ('index.html');

	$utilisateurC = new produitC();
	$error = "";

	if (
        
    isset($_POST['idproduit']) &&
    isset($_POST['libelle']) &&
isset($_POST['prix']) &&
isset ($_POST['quantite']) &&
isset ($_POST['descriptionP']) 
    ){
		if(!empty($_POST['idproduit']) &&
        !empty($_POST['libelle']) &&
    !empty($_POST['prix']) &&
    !empty($_POST['quantite']) &&
    !empty($_POST['descriptionP']) 
    

        ) {

            $utilisateurC->ModifierProduit($_POST['idproduit'],$_POST['libelle'],$_POST['prix'],$_POST['quantite'],$_POST['descriptionP']);
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
                        <h1 id="tab" class="mt-4" >Produit</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Produit</li>
                            <li class="breadcrumb-item"><a href="index.html">Page d'accueil</a></li>
                        </ol>
                        <div class="card mb-4">

                        <?php
			if (isset($_GET['idproduit'])){
				$user = $utilisateurC->recupererproduit($_GET['idproduit']);		
		?>

<br>		
 <div class="d-flex justify-content-center">
<form action="" method="POST" class="w-50">
<br>
<input type="number"  name="idproduit" id="idproduit" class="form-control"  placeholder="id produit" autocomplete="off" value = "<?php echo $user['idproduit']; ?>">
<br>
<input type="text" name="libelle" id="libelle" class="form-control" placeholder="libelle" autocomplete="off" value = "<?php echo $user['libelle']; ?>">
<br>
<input type="number" name="prix" id="prix" class="form-control" placeholder="prix" autocomplete="off" value = "<?php echo $user['prix']; ?>">
<br>
<input type="number" name="quantite" id="qunatite" class="form-control" placeholder="qunatite" autocomplete="off" value = "<?php echo $user['quantite']; ?>">
<br>
<input type="text" name="descriptionP" id="descriptionP" class="form-control" placeholder="descriptionP" autocomplete="off" value = "<?php echo $user['descriptionP']; ?>">

      <div class="d-flex justyfy-content-center">
      <input type="submit" class="btn btn-success" value="modifier" name="modifier">
            
      <button class="btn btn-warning"><a href="afficherProduit.php">Retour</a><i class="bi bi-arrow-counterclockwise"></i></button>

    </div>
</form>
</div>

		<?php
		}
		?>
	</body>
</html>