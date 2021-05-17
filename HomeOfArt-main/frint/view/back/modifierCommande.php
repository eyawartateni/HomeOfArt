<?php
	include "../../controller/commandeC.php";
	include_once '../../model/commande.php';
    require_once ('index.html');

	$commandeC = new CommandeC();
	$error = "";
	
	if (
      
        isset($_POST["etat"])      
	){
		if (
            
            !empty($_POST["etat"])  
        ) {		
            extract($_POST);
            $commandeC->modifierCommande($_GET['refcommande'],$etat);
           
        }
        else
            $error = "Missing information";
	}

?>

<html>
<head>
<script src="scriptCom.js"></script>
</head>
	<body>
    <script src="scriptCom.js"></script>
		<?php
			if (isset($_GET['refcommande'])){
				$commande1 = $commandeC->recupererCommande($_GET['refcommande']);
			
		?>
		<form action="" method="POST">
        <br><br><br><br><br><br><br><br>
            <table align="center">
               <tr>
                    <td>
                  
                    <div class="mb-3">
                        <label for="etat" class="form-label">etat:
                        </label>
                        </div>
                        
                 
                  
                        <input type="text" class="form-control" id="etat"  name="etat" value = "<?php echo $commande1['etat']; ?>">
                       
                    </td>
                </tr>
                <tr>

                    <td >
                    <br>
                    
                        <input type="submit" class="w-100 btn btn-secondary btn-lg" value="Modifier"  onclick=" verifier();" name = "modifer"> 
                   
                                        
                        <br><br>
                        <input type="reset" class="w-100 btn btn-secondary btn-lg" value="Annuler" >

                        </td>
                   
                                </tr>
            </table>
        </form>
		<?php
		}
		?>
	</body>
    <script src="scriptCom.js" > </script>
</html>