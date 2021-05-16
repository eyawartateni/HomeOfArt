<?php
require_once ('index.html');
include_once  '../../model/livreur.php';
include_once '../../controller/livreurC.php';

$error ="";
$livreur = null;
$livreurC = new LivreurC();
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
        $livreur = new Livreur(
            
            $_POST['nomLivreur'],
            $_POST['prenomLivreur'],
            $_POST['adresse'], 
            $_POST['email'],
            $_POST['salaire'],
            $_POST['tel']
        );
        
        $livreurC->ajouterLivreur($livreur);
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
    <label for="nomLivreur" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nomLivreur" name="nomLivreur">
</div>

</tr>
<tr>

<td>
<div class="mb-3">
    <label for="prenomLivreur" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="prenomLivreur"  name="prenomLivreur">
</div>
</tr>
<tr>
<td>
<div class="mb-3">
    <label for="adresse" class="form-label">Adresse</label>
    <input type="text" class="form-control" id="adresse"  name="adresse">
</div>
</tr>
<tr>
<td>
<div class="mb-3">
    <label for="email" class="form-label">Email </label>
    <input type="text" class="form-control" id="email"  name="email"   pattern=".+@gmail.com|.+@esprit.tn" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">@gmail.com or @esprit.tn</div>
</div>
</tr>
<tr>

<td>
<div class="mb-3">
    <label for="salaire" class="form-label">salaire</label>
    <input type="text" class="form-control" id="salaire"  name="salaire">
</div>

</tr>
<tr>
<td>
<div class="mb-3">
    <label for="tel" class="form-label">Telephone</label>
    <input type="text" class="form-control" id="tel"  name="tel" minlength="8" maxlength="8">
</div>
</td>
</tr>

<tr>
<td></td>
<td>
<input  class="w-100 btn btn-primary btn-lg" type="submit" onclick=" verifier();" value="Envoyer">
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
 <script src="valider.js" > </script>
  </html>
