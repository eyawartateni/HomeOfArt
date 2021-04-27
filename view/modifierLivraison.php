<?php
    require_once ('index.php');
	include_once "../controller/livraisonC.php";
	include_once '../model/livraison.php';

	$livraisonC = new LivraisonC();
	$error = "";
	
	if (
		
        
        isset($_POST["datelivraison"]) && 
        isset($_POST["idLiv"]) &&
        isset($_POST["idcmd"]) && 
        isset($_POST["etat"]) && 
        isset($_POST["prix"]) && 
        isset($_POST["adresse"])
	){
		if (
          
        !empty($_POST["datelivraison"]) && 
        !empty($_POST["idLiv"]) &&
        !empty($_POST["idcmd"]) &&  
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
            $livraisonC->modifierLivraison($_GET['idlivraison'],$datelivraison,$idLiv,$idcmd,$prix,$adresse,$etat);
            //header('refresh:5;url=afficherLivraison.php');
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
                  <td>
                    <div class="mb-3">
                       <label for="idlivraison" class="form-label">Identifiant</label>
                       <input type="int" class="form-control" id="idlivraison"  name="idlivraison" value = "<?php echo $livraison['idlivraison']; ?>" disabled>
                        
                   </div>
				</tr>
				<tr>

                <td>
                  <div class="mb-3">
                   <label for="datelivraison" class="form-label">Date</label>
                   <input type="date" class="form-control" id="datelivraison" name="datelivraison" value = "<?php echo $livraison['datelivraison']; ?>">
                  </div>

				</tr>
                <tr>

                <td>
                     <div class="mb-3">
                     <label for="idLiv" class="form-label">Livreur</label>
                      <input type="text" class="form-control" id="idLiv"  name="idLiv" value = "<?php echo $livraison['idLiv']; ?>">
                      </div>
                </tr>
                <tr>

                <td>
                      <div class="mb-3">
                      <label for="idcmd" class="form-label">Commande</label>
                       <input type="text" class="form-control" id="idcmd"  name="idcmd" value = "<?php echo $livraison['idcmd']; ?>">
                        </div>
                </tr>
                <tr>

                <td>
                       <div class="mb-3">
                       <label for="etat" class="form-label">Etat </label>
                        <input type="text" class="form-control" id="etat"  name="etat" value = "<?php echo $livraison['etat']; ?>">
                         
                         </div>
                </tr>
                <tr>

                <td>
                    <div class="mb-3">
                     <label for="prix" class="form-label">prix</label>
                     <input type="text" class="form-control" id="prix"  name="prix" value = "<?php echo $livraison['prix']; ?>">
                    </div>
                </tr>
             <tr>

             <td>
                  <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="int" class="form-control" id="adresse"  name="adresse" value = "<?php echo $livraison['adresse']; ?>">
                   </div>
                </tr>
                <tr>
                <td></td>
                    <td>
                        <input class="w-100 btn btn-primary btn-lg" href="afficherLivraison.php" type="submit" value="Modifier" name = "modifer"> 
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