<?php

require_once ('include/header.php');
include_once "../config.php";
include_once '../model/produit.php';
include_once '../Controller/Cproduit.php';
$pubC = new Cproduit();
$db= config::getConnexion();
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
  <section class="section featured">
    <div class="top container">
      <h1>Related ticket</h1>
      <a href="#" class="view-more">View more</a>
    </div>

    <div class="product-center container">
      <div class="product">
        <div class="product-header">
          <img src="./images/" alt="">
          <ul class="icons">
            <span><i class="bx bx-heart"></i></span>
            <span><i class="bx bx-shopping-bag"></i></span>
            <span><i class="bx bx-search"></i></span>
          </ul>
        </div>
        <div class="product-footer">
          <a href="#"><h3>Boy’s T-Shirt</h3></a>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <h4 class="price">$50</h4>
        </div>
      </div>
      </html> 