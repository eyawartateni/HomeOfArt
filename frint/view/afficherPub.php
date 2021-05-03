<?php
require_once ('include/header.php');
include_once "../config.php";
include_once '../model/produit.php';
include_once '../Controller/Cproduit.php';
$prod = new Cproduit();
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
        <h1>Featured Products</h1>
         </div>

      <div class="product-center container">
      <?php
            $req=$prod->afficherProduit();
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
            
            <h4 class="price"><?php echo $reponse->prix ?></h4> 
               <a href="detailedPub.php?libelle=<?php echo $reponse->libelle ;?>&descriptionP=<?php echo $reponse->descriptionP ?>&prix=<?php echo $reponse->prix ?>&imageP=<?php echo $reponse->imageP?>&quantite=<?php echo $reponse->quantite ?>" class="pss" >details</a>  

             </div>
        </div>
        <?php  }
?>
    </div>

     
    </section>

   
    
</body>
</html>


