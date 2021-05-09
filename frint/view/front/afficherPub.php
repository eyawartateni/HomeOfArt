<?php
require_once ('include/header.php');
include_once "../config.php";
include_once '../model/produit.php';
include_once '../Controller/Cproduit.php';
include_once '../model/categorie.php';
include_once '../Controller/categorieC.php';
$prod = new Cproduit();
$cat = new categorieC();
$db= config::getConnexion();
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Hero -->
    <img src="./include/images/banner.png" alt="" class="hero-img" />
    <div class="hero-content">
      <h1>
        <span>Sell And Buy Art</span>
        <span>with us</span>
      </h1>
      <a class="btn" href="#">shop now</a>
    </div>
  </header>
    <!-- Featured -->
    <section class="section featured">
      <div class="title">
        <h1 id="">All Products</h1>
         </div>
         <h2 style="position: relative; left:100px; top: -26px;"> Sort products By : </h2>  
  <form action="" method="POST">
         <select name="categorie" id="cat" style="position: relative; left:300px; top: -50px; background-color:#ff8800 ;   border: 4px solid transparent; border-color:back;     border-radius:6px;color: #444;">
           <option value="0">select categorie</option>

         <?php
            $pes=$cat->affichercategorie();
            while($rep=$pes->fetch(PDO::FETCH_OBJ)){?>
          <option value="<?php echo $rep->nom_cat?>"><?php echo $rep->nom_cat?></option>
          <?php  }
?>
          </select>
          <input type="submit" name="submit" value="Choose options" style="position: relative; left:300px; top: -50px; background-color:#ff8800 ;   border: 4px solid transparent; border-color:back;     border-radius:6px;
          color: #444;">
          </form>

      <div class="product-center container">
      <?php
      if(isset($_POST['categorie']))
      {
        if(!empty($_POST['categorie']))
        {

          $selected = $_POST['categorie'];
        if($selected!='0')
        {
            $req=$prod->RechercherProduitcat($selected);
        }
        }       
      }
      else
        {
          $req=$prod->afficherProduit();
        }      
            while($reponse=$req->fetch(PDO::FETCH_OBJ)){?>
        <div class="product">
          <div class="product-header">
            <img src="./include/images/<?php echo $reponse->imageP?>" alt="">
            <ul class="icons">
              <span><i class="bx bx-shopping-bag"></i></span> 
            </ul>
          </div>
          <div class="product-footer">
              <h3 ><?php echo $reponse->libelle ?></h3>
            
            <h4 class="price"><?php echo $reponse->prix ?> DNT</h4> 
            <br>
               <a href="detailedPub.php?idproduit=<?php echo $reponse->idproduit ;?>&libelle=<?php echo $reponse->libelle ;?>&descriptionP=<?php echo $reponse->descriptionP ?>&prix=<?php echo $reponse->prix ?>&imageP=<?php echo $reponse->imageP?>&quantite=<?php echo $reponse->quantite ?>&categorie=<?php echo $reponse->categorie ?>" class="pss" >details</a>  

             </div>
        </div>
        <?php  }
?>
    </div>     
    </section>    
</body>
</html>


