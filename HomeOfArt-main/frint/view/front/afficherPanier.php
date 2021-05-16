<?php
session_start();
include "../../controller/panierC.php";
require_once ('include/header.php');
include_once "../../config.php";
 $panierC=new panierC();
  $panierC1=new panierC();
 $idclient=$_SESSION['id'];
    $listpanier=$panierC->afficherpanier($idclient);
    $list = $panierC1->calculerpanier($idclient);
     $N=0;
    
    $N=$list['nb'];

?>
<!DOCTYPE html>
<html lang="en">
    
    <body id="page-top">
     
        <!-- Services-->
        <br>
        <br>
        <br>
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                <div class="center">
                    <h2 class="section-heading text-uppercase" style="position: relative;right: -550px;">PANIER</h2>
                   <br><br> <h3 class="section-subheading text-muted"> <?php  if ($N==0) echo "Votre Panier est Vide !"?></h3>
                    <?php    if ($N>0) { ?>     <h2 class="section-heading text-uppercase" style="position: relative;right: 0px;">Article(<?php  echo $N; ?>)</h2>   <?php    } ?> 
                </div>
                </div>
                <div class="row text-center">
                    <?php 
                       if ($N>0) {
                   ?>
               <table class="table">
                <thead class="thead-light">
                    <tr>
                       <th scope="col" style="font-weight: 1000;font-size: 15px"><center>IMAGE</center></th>
        
         <th scope="col"style="font-weight: 1000;font-size: 15px"><center>NOM</center></th>
       
         <th scope="col"style="font-weight: 1000;font-size: 15px"><center>PRIX UNITAIRE</center></th>
        
       
        
            <th scope="col"style="font-weight: 1000;font-size: 15px"><center>QUANTITÉ</center></th>
            <th scope="col"style="font-weight: 1000;font-size: 15px"><center>SOUS-TOTAL</center></th>
           <th scope="col"style="font-weight: 1000;font-size: 15px"><center>SUPPRIMER</center></th>



                    </tr>


                </thead>
                <?php
$C='';
$S=0;
$S1=0;

$D=date("Y-m-d H:i:s");


foreach ($listpanier as $row)
{
    
        
        $S=(intval($row["prix_produit"])*intval($row["qte"]));
        $S1=$S1+(intval($row["prix_produit"])*intval($row["qte"]));
      
        $C=$C.$row["qte"].'x'.' '.$row["nom_produit"].'</br>';
 ?>
                <tbody>
                  <tr valign="middle">
            
               <td valign="middle"><center><img width="200px" src="./include/images/<?php echo $row['img_produit']; ?>" alt="" /></center></td>
        <th><center><h5 style="position: relative;top: 0px"><?php echo $row["nom_produit"] ?></h5></center></th>
            
            <td style="margin: auto"><center><h5 style="position: relative;top: 0px"><?php echo $row["prix_produit"].' '.'TND' ?></h5></center></td>
           
       
          
            <td align="center">
              <center>  <form action="modifierpanier.php" method="post" style="position: relative;top: 0px">
                    
                      <input type="hidden" id="idpanier" name="idpanier" value="<?php echo $row["id_panier"] ?>">
                    <select name="quantite" id="quantite" >
        <option value="1"   <?php if ($row["qte"]==1) echo "selected" ; ?>
        >1</option>
        <option value="2"  <?php if ($row["qte"]==2) echo "selected" ; ?>>2</option>
        <option value="3"  <?php if ($row["qte"]==3) echo "selected" ; ?>>3</option></select>
                    <button type="submit" class="badge badge-info">update</button>
                </form></center>
            </td>
            
            <td><center><h5 style="position: relative;top: 0px"><?php echo $S.' '.'TND' ; ?></h5></center></td>
              <td align="center">
              <center >  <form action="supprimerpanier.php" method="get" style="position: relative;top: 0px">
                   
                    <input type="hidden" id="idpanier" name="idpanier" value="<?php echo $row["id_panier"] ?>">
                   <input type="hidden" id="id" name="id" value="<?php echo  $row["id_client"] ?>">
                    <button  class="btn btn-danger" type="submit" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </form></center>
            </td>
            
        </tr>   




                </tbody>
                   
<?php
} ?>




               </table>
               </br>
               <table>
                   <tr>
 <h3 style="position: relative;left: 900px; bottom :0px;"><?php echo 'Total:'.'    '.'  '. $S1.' '.'TND' ?> </h3>
 </tr>
</br>
</br>
<tr>
<form action="ajoutercommande.php"  method="post">
                    
                    <input type="hidden" id="refcommande" name="refcommande" value=" ">
                    <input type="hidden" id="prixtotal" name="prixtotal" value="<?php echo $S1 ?>">
          <input type="hidden" id="idclient" name="idclient" value="$idclient">
          <input type="hidden" id="detail" name="detail" value="<?php echo $C ?>">
                    <input type="hidden" id="etat" name="etat" value="CONFIRMEE">
                    <input type="hidden" id="date" name="date" value="<?php echo $D ?>">
                    <button style="position: relative;left: 918px ;bottom: 25px" class="btn btn-info">PASSER COMMANDE</button>
                </form>
</tr>
               </table>
           <?php } 
            else
            {

           ?>
          
            
                </br>
                </br>
                    <center><img src="panier.png" style="position: relative;left: 0px;"></center>

                <?php } ?>
                </div>
            </div>
        </section>
   
    </body>
</html>
