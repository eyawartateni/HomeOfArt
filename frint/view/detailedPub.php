<?php

require_once ('include/header.php');
include_once "../config.php";
include_once '../model/produit.php';
include_once '../Controller/Cproduit.php';
$db= config::getConnexion();
$prod = new Cproduit();
?>
<html>
<!-- Product Details -->
	
<?php  ?>

<section class="section product-detail">
    <div class="details container-md">
      <div class="left">
        <div class="main">
          <img src="./include/images/<?php echo $_GET['imageP']  ?>" alt="">
        </div>
      </div>
      <div class="right">
        <!-- <span>Home/T-shirt</span> -->
        <h1> <?php echo $_GET['libelle']  ?> </h1>
        <div class="price"><?php echo $_GET['prix']  ?>  DNT </div>
        <p> quantite disponible : <?php echo $_GET['quantite']  ?>  </p>
        <form class="form">
          <input type="text" placeholder="1">
          <a href="cart.html" class="addCart">Add To Cart</a>
        </form>
        <h3>Product Detail</h3>
        <p> <?php echo $_GET['descriptionP'] ?> </p>
      </div>
    </div>
  </section>
  <!-- Related -->
  <?php 
 $cat= $_GET['categorie'];
  ?>
  <section class="section featured">
    <div class="top container">
      <h1>Related Products</h1>
      <?php 
       $req=$prod->RechercherProduitcat($cat); ?>
    </div>

    <div class="product-center container">
    <?php      while($reponse=$req->fetch(PDO::FETCH_OBJ)){  ?>

      <div class="product">
        <div class="product-header">
          <img src="./include/images/<?php echo $reponse->imageP?>" alt="">
          <ul class="icons">
            <span><i class="bx bx-shopping-bag"></i></span>
          </ul>
        </div>  
        <div class="product-footer">
          <a href="#"><h3><?php echo $reponse->libelle?></h3></a>
          <h4 class="price"><?php echo $reponse->prix ?></h4>
        </div>
       
      </div>
      <?php  }
?>
      </html> 