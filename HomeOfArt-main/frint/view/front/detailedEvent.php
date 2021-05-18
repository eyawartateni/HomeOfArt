<?php

require_once ('include/header.php');
include_once "../../config.php";

include_once '../../model/Evenement.php';
include_once '../../controller/EvenementC.php';

$pubC = new UtilisateurC();

$db= config::getConnexion();
?>
<html>
<!-- Product Details -->
	
<?php  ?>

<section class="section product-detail">
    <div class="details container-md">
      <div class="left">
        <div class="main">
          <img src="../../view/back/image/<?php echo $_GET['image_event']  ?>" alt="">
        </div>
      </div>
      <div class="right">
        <!-- <span>Home/T-shirt</span> -->
        <h1>Nom:<?php echo $_GET['nom_event']  ?> </h1>
        <div class="price">Type: <?php echo $_GET['type_event']  ?>  </div>
        <p> nombre participants: <?php echo $_GET['nbre_participants'] ; ?>  </p>
        <form class="form">
          
          
        </form>
        <h3>Event Detail</h3>
        <p> <?php echo $_GET['date_event'] ?> </p>
        <br>
        <a class="pss" href="mail.php">envoyer un email</a>
      </div>
      
    </div>
    
  </section>
 
  <!-- Related -->
  <?php
         $id=$_GET['id_event'];
         
         
$reponse3 = $db->query("SELECT *
   FROM billetterie b
   INNER JOIN evenement e
   ON (b.id_evenement =  e.id_event)
   WHERE e.id_event='$id'") or die(print_r($db->errorInfo()));                           
 
$donnees3 = $reponse3->fetch();
// echo $donnees3['prix'];

?>
  <section class="section featured">
    <div class="top container">
      <h1>Billet associé</h1>
      <a href="#" class="view-more">View more</a>
    </div>

    <div class="product-center container">
    
            
            
            
      <div class="product">
        <div class="product-header">
          <img src="./include/images/tickett.png" alt="">
          <ul class="icons">
            
          </ul>
        </div>
        <div class="right">
        <a href="#"><h1>Votre ticket</h1></a>
        <h3>Id billet:<?php echo $donnees3['id_billet']; ?> </h3>
        <div class="price">Prix: <?php echo $donnees3['prix'] ; ?>  </div>
        <p> Nombre restants: <?php echo $donnees3['nbre'] ; ?>  </p>
        </div>
        <div class="product-footer">
          
          <!--<div class="rating">
             <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i> 
            
          </div>-->

            <form class="form" action="ajouterPanier.php" method="post">
        <input type="hidden" id="idclient" name="idclient" value="$idclient">
                   <input type="hidden" id="image" name="image" value="./include/image/africa.jpg">
                  <input type="hidden" id="nom" name="nom" value="billet">
                  <input type="hidden" id="prix" name="prix" value="20 ">
                    <input type="hidden" id="quantite" name="quantite" value="1">
        
         <button type="submit" class="pss">Add to cart</button>
        </form>

         

        </div>
      </div>
      </html> 