<?php
    require_once ('index.html');
	include_once "../../controller/livraisonC.php";
	include_once '../../model/livraison.php';

	$livraisonC = new LivraisonC();
	$error = "";
	
	if (
		
        
        isset($_POST["datelivraison"]) && 
        isset($_POST["idLivreur"]) &&
        isset($_POST["idCommande"]) && 
        isset($_POST["etat"]) && 
        isset($_POST["prix"]) && 
        isset($_POST["adresse"])
	){
		if (
          
        !empty($_POST["datelivraison"]) && 
        !empty($_POST["idLivreur"]) &&
        !empty($_POST["idCommande"]) &&  
        !empty($_POST["etat"]) && 
        !empty($_POST["prix"]) && 
        !empty($_POST["adresse"])
        ) {
           /* $livreur = new Livreur(
            
            $_POST['nomLivreur'],
            $_POST['prenomLivreur'],
            $_POST['adresse'], 
            $_POST['email'],
            $_POST['salaire'],
            $_POST['tel']
			);*/
			extract($_POST);
            $livraisonC->modifierLivraison($_GET['idlivraison'],$datelivraison,$idLivreur,$idCommande,$prix,$adresse,$etat);
           /* header('refresh:5;url=afficherLivreur.php');*/
        }
        else
            $error = "Missing information";
	}

?>
<html>
<head>
         <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
       <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['idlivraison'])){
				$livraison = $livraisonC->recupererLivraison($_GET['idlivraison']);
				
		?>  
        <div class="bg-info"><br><br>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    
                                    <div class="card-body">  
        <form action="" method="POST">
        <table border="0"  align="center">
                  
				<tr>

                <td>
                  <div class="mb-3">
                   <label for="datelivraison" class="form-label">Date</label>
                   <input type="text" class="form-control" id="datelivraison" name="datelivraison" value = "<?php echo $livraison['datelivraison']; ?>">
                  </div>

				</tr>
                <tr>

                <td>
                     <div class="mb-3">
                     <label for="idLivreur" class="form-label">Livreur</label>
                      <input type="text" class="form-control" id="idLivreur"  name="idLivreur" value = "<?php echo $livraison['idLivreur']; ?>">
                      </div>
                </tr>
                <tr>

<td>
     <div class="mb-3">
     <label for="idCommande" class="form-label">Commande</label>
      <input type="text" class="form-control" id="idCommande"  name="idCommande" value = "<?php echo $livraison['idCommande']; ?>">
      </div>
</tr>
                <tr>

                <td>
                      <div class="mb-3">
                      <label for="etat" class="form-label">Etat</label>
                       <input type="text" class="form-control" id="etat"  name="etat" value = "<?php echo $livraison['etat']; ?>">
                        </div>
                </tr>
                <tr>

                <td>
                       <div class="mb-3">
                       <label for="prix" class="form-label">Prix </label>
                        <input type="text" class="form-control" id="prix"  name="prix" value = "<?php echo $livraison['prix']; ?>" >
                         
                         </div>
                </tr>
                <tr>

                <td>
                    <div class="mb-3">
                     <label for="adresse" class="form-label">Adresse</label>
                     <input type="text" class="form-control" id="adresse"  name="adresse" value = "<?php echo $livraison['adresse']; ?>">
                    </div>
                </tr>
            
                <tr>
                <td></td>
                    <td>
                        <input class="w-100 btn btn-primary btn-lg"  type="submit" value="Modifier" name = "modifer"> 
                    </td>
                    <td>
                        <input  class="w-100 btn btn-primary btn-lg" type="reset" value="Annuler" >
                    </td>
                </tr>


        </table>

        </form>
        </div>
                    </div>
             </div>
        </div>
    </div>
 </div>
        <?php
		}
		?>


</body>


</html>