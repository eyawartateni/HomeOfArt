<?php
session_start();
require_once ('include/header.php');
include_once "../../config.php";
include_once '../../model/produit.php';
include_once '../../controller/produitC.php';
include_once '../../model/panier.php';
include_once '../../controller/panierC.php';

$idclient=$_SESSION['id'];
$db= config::getConnexion();
$prod = new produitC();
$condi=0;
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


        <form class="form" action="ajouterPanier.php" method="post">
        <input type="hidden" id="idclient" name="idclient" value="$idclient">
                   <input type="hidden" id="image" name="image" value="./include/image/africa.jpg">
                  <input type="hidden" id="nom" name="nom" value="tableau mother afric">
                  <input type="hidden" id="prix" name="prix" value="500 ">
                    <input type="hidden" id="quantite" name="quantite" value="1">
          <input type="text" placeholder="1">
          <button type="submit" class="addCart">Add to cart</button>
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
<?php  
if(  $reponse->idproduit != $_GET['idproduit'] )
{
?>
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
      <?php  }}
?>
      </html> 