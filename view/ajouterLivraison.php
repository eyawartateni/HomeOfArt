<?php
require_once ('index.php');
include_once  '../model/livraison.php';
include_once '../controller/livraisonC.php';

$error ="";
$livraison = null;
$livraisonC = new LivraisonC();
if (
    isset($_POST["idlivraison"]) && 
    isset($_POST["datelivraison"]) && 
    isset($_POST["idLiv"]) &&
    isset($_POST["idcmd"]) && 
    isset($_POST["etat"]) &&
    isset($_POST["prix"]) && 
    isset($_POST["adresse"]) 
    
){
    if (
        !empty($_POST["idlivraison"]) && 
        !empty($_POST["datelivraison"]) && 
        !empty($_POST["idLiv"]) &&
        !empty($_POST["idcmd"]) &&  
        !empty($_POST["etat"]) &&
        !empty($_POST["prix"]) &&  
        !empty($_POST["adresse"]) 
    ) {
        $livraison = new Livraison(
            $_POST['idlivraison'],
            $_POST['datelivraison'],
            $_POST['idLiv'],
            $_POST['idcmd'],
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
    <label for="idlivraison" class="form-label">Identifiant</label>
    <input type="int" class="form-control" id="idlivraison"  name="idlivraison" aria-describedby="idlHelp">
    <div id="idHelp" class="form-text">Identifiant contient chiffre seulement</div>
</div>
</tr>
<tr>

<td>
<div class="mb-3">
    <label for="datelivraison" class="form-label">date</label>
    <input type="text" class="form-control" id="datelivraison" name="datelivraison">
</div>

</tr>
<tr>

<td>
<div class="mb-3">
    <label for="idLiv" class="form-label">Livreur</label>
    <input type="int" class="form-control" id="idLiv"  name="idLiv">
</div>
</tr>
<tr>
<td>
<div class="mb-3">
    <label for="idcmd" class="form-label">Commande</label>
    <input type="int" class="form-control" id="idcmd"  name="idcmd">
</div>
</tr>
<tr>
<td>
<div class="mb-3">
    <label for="etat" class="form-label">etat </label>
    <input type="text" class="form-control" id="etat"  name="etat" >
    
</div>
</tr>
<tr>

<td>
<div class="mb-3">
    <label for="prix" class="form-label">prix</label>
    <input type="int" class="form-control" id="prix"  name="prix">
</div>

</tr>
<tr>
<td>
<div class="mb-3">
    <label for="adresse" class="form-label">adresse</label>
    <input type="text" class="form-control" id="adresse"  name="adresse">
</div>
</td>
</tr>

<tr>
<td></td>
<td>
<input  class="w-100 btn btn-primary btn-lg" type="submit" name="submit" onclick="verifier();" value="Envoyer">
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
