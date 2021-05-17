<?php
require_once ('include/header.php');

include_once '../../model/Evenement.php';
include_once '../../controller/EvenementC.php';
include_once "../../config.php";



$utilisateurC = new UtilisateurC();


$db= config::getConnexion();
?>


<!DOCTYPE html>
<html lang="en">
  
    <!-- Hero -->
    <img src="./include/images/banner.png"  style=" position:absolute ; top:10%; right:-8%;" alt="" class="hero-img" />

    <div class="hero-content">
      <h1>
        <span>Profitez de votre </span>
        <span>temps libre</span>
        <span>avec nous</span>
      </h1>
      <a class="btn" href="#">Participez maintenant</a>
    </div>
  </header>
    
    <!-- Featured -->
    <section class="section featured">
      <div class="title">
        <h1>Les événements disponibles</h1>
         </div>

      <div class="product-center container">
      <?php
            $req=$utilisateurC->afficherUtilisateur();
            // $req1=$billetC->afficherBillet();
            while($reponse=$req->fetch(PDO::FETCH_OBJ)){?>
        <div class="product">
          <div class="product-header">
            <img src="../../view/back/image/<?php echo $reponse->image_event?>" alt="">
            <ul class="icons">
              <span><i class="bx bx-shopping-bag"></i></span>
            </ul>
          </div>
          
          
          <div class="product-footer">
             
            
            <h4 class="price"><?php echo $reponse->nom_event ?></h4> <br>
               <a href="detailedEvent.php?id_event=<?php echo $reponse->id_event; ?> 
                &nom_event=<?php echo $reponse->nom_event; ?>
                
                &type_event=<?php echo $reponse->type_event; ?> 
                &date_event=<?php echo $reponse->date_event; ?> 
                &artiste=<?php echo $reponse->artiste; ?>
                 &nbre_participants=<?php echo $reponse->nbre_participants; ?>
                  & image_event=<?php echo $reponse->image_event; ?> 
                   " class="pss" >details</a>  

             </div>
        </div>
        <?php  }
?>
    </div>

     
    </section>

   
    
</body>
</html>


