<?php
    require_once ('index.php');
	include_once "../controller/livreurC.php";
	include_once '../model/livreur.php';

	$livreurC = new LivreurC();
	$error = "";
	
	if (
		
        
        isset($_POST["nomLivreur"]) && 
        isset($_POST["prenomLivreur"]) &&
        isset($_POST["adresse"]) && 
        isset($_POST["email"]) && 
        isset($_POST["salaire"]) && 
        isset($_POST["tel"])
	){
		if (
          
        !empty($_POST["nomLivreur"]) && 
        !empty($_POST["prenomLivreur"]) &&
        !empty($_POST["adresse"]) &&  
        !empty($_POST["email"]) && 
        !empty($_POST["salaire"]) && 
        !empty($_POST["tel"])
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
            $livreurC->modifierLivreur($_GET['idLivreur'],$nomLivreur,$prenomLivreur,$adresse,$email,$salaire,$tel);
            header('refresh:5;url=afficherLivreur.php');
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
			if (isset($_GET['idLivreur'])){
				$livreur = $livreurC->recupererLivreur($_GET['idLivreur']);
				
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
                       <label for="idLivreur" class="form-label">Identifiant</label>
                       <input type="int" class="form-control" id="idLivreur"  name="idLivreur" value = "<?php echo $livreur['idLivreur']; ?>" disabled>
                        
                   </div>
				</tr>
				<tr>

                <td>
                  <div class="mb-3">
                   <label for="nomLivreur" class="form-label">Nom</label>
                   <input type="text" class="form-control" id="nomLivreur" name="nomLivreur" value = "<?php echo $livreur['nomLivreur']; ?>">
                  </div>

				</tr>
                <tr>

                <td>
                     <div class="mb-3">
                     <label for="prenomLivreur" class="form-label">Prenom</label>
                      <input type="text" class="form-control" id="prenomLivreur"  name="prenomLivreur" value = "<?php echo $livreur['prenomLivreur']; ?>">
                      </div>
                </tr>
                <tr>

                <td>
                      <div class="mb-3">
                      <label for="adresse" class="form-label">Adresse</label>
                       <input type="text" class="form-control" id="adresse"  name="adresse" value = "<?php echo $livreur['adresse']; ?>">
                        </div>
                </tr>
                <tr>

                <td>
                       <div class="mb-3">
                       <label for="email" class="form-label">Email </label>
                        <input type="text" class="form-control" id="email"  name="email" value = "<?php echo $livreur['email']; ?>"  pattern=".+@gmail.com|.+@esprit.tn" aria-describedby="emailHelp">
                         <div id="emailHelp" class="form-text">@gmail.com or @esprit.tn</div>
                         </div>
                </tr>
                <tr>

                <td>
                    <div class="mb-3">
                     <label for="salaire" class="form-label">salaire</label>
                     <input type="text" class="form-control" id="salaire"  name="salaire" value = "<?php echo $livreur['salaire']; ?>">
                    </div>
                </tr>
             <tr>

             <td>
                  <div class="mb-3">
                    <label for="tel" class="form-label">Telephone</label>
                    <input type="int" class="form-control" id="tel"  name="tel" value = "<?php echo $livreur['tel']; ?>">
                   </div>
                </tr>
                <tr>
                <td></td>
                    <td>
                        <input class="w-100 btn btn-primary btn-lg" href="afficherLivreur.php" type="submit" value="Modifier" name = "modifer"> 
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