<?php
require_once ('index.html');
include_once  '../../model/livreur.php';
include_once '../../controller/livreurC.php';
include_once  '../../model/livraison.php';
include_once '../../controller/livraisonC.php';
include_once '../../controller/commandeC.php';
include_once '../../model/commande.php';

$error ="";
$livraison = null;
$livraisonC = new LivraisonC();
$livreurC = new LivreurC();
$liste = $livreurC->afficherLivreur();
$commandeC = new CommandeC();
$liste1 = $commandeC->afficherCommande();
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
        $livraison = new Livraison(
           
            $_POST['datelivraison'],
            $_POST['idLivreur'],
            $_POST['idCommande'],
            $_POST['etat'],
            $_POST['prix'], 
            $_POST['adresse'] 
        );
        
        $livraisonC->ajouterLivraison($livraison);
    }
    else
        $error = "Missing information";
}


?>
 
<div class = "bg-info"><br><br>
<title>Livreur</title>

<html>
<script src="valider.js"></script>
<div class="py-3 text-center">
<img class="rounded mx-auto d-block" src="images/logo.jpg" alt="logo" width="150" height="100">

      
</div>
<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
   <form action="" method="POST">
       <table border="0" align="center">

<tr>
<td>
<div class="mb-3">
    <label for="datelivraison" class="form-label">Date</label>
    <input type="date" class="form-control" id="datelivraison" name="datelivraison">
</div>
</td>
</tr>
<tr>

<td>
<div class="mb-3">
<select name="idLivreur" id="idLivreur" class="form-control">
    <option> Choose Livreur </option>
     <?php
         foreach($liste as $livreur) {
             ?>
             <option  >
               <?php  echo $livreur['idLivreur'] ?>
               
               </option>
            <?php
              }
              ?>
        </select>
</div>
</tr>
<tr>
<td>
<div class="mb-3">
<form action="ajouterLivraison.php" method="POST">
    <select name="idCommande" id="idCommande" class="form-control">
    <option> Choose Commande </option>
     <?php
         foreach($liste1 as $commande) {
             ?>
             <option  >
               <?php  echo $commande['refcommande'] ?>
               
               </option>
            <?php
              }
              ?>
        </select>
        
        </form>       
</div>
</tr>
<tr>
<td>
<div class="mb-3">
    <label for="etat" class="form-label">Etat </label>
    <input type="text" class="form-control" id="etat"  name="etat"  >
    
</div>
</tr>
<tr>

<td>
<div class="mb-3">

 
 
    
<label for="prix" class="form-label">Prix </label>
   <input type="text" class="form-control" id="prix"  name="prix" >
  
   
  

</td>
</tr>
<tr>
<td>
<div class="mb-3">
    <label for="adresse" class="form-label">Adresse</label>
    <input type="text" class="form-control" id="adresse"  name="adresse" >
</div>
</td>
</tr>

<tr>
<td></td>
<td>
<input  class="w-100 btn btn-primary btn-lg" type="submit" onsubmit="return verifier();" value="Envoyer">
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
  </html>
