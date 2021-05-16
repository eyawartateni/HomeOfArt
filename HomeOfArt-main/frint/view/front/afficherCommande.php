<?php
session_start();
include "../../controller/commandeC.php";

require_once ('include/header.php');

$idclient=$_SESSION['id'];
 $commandeC=new commandeC();
 
$listcommande=$commandeC->affichercommande($idclient);


?>
<!DOCTYPE html>
<html lang="en">

        <!-- Masthead-->
        <header class="masthead">
        
        </header>
        <br><br><br>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" style="position: relative;left: 500px; bottom :0px;">Vos commandes</h2>
                 <br>
                </div>
                <div class="row text-center">
                           <table class="table">
  <thead class="thead-light">
    <tr>
       
        <th scope="col">REFCOMMANDE</th>
        
        <th scope="col">ETAT</th>
         <th scope="col">DESCRIPTION</th>
       
        <th scope="col">PRIX</th>
        <th scope="col">IMPRESSION</th>
        <th scope="col">SUPPRESSION</th>
       
        


    </tr>
</thead>
<?php

foreach ($listcommande as $row)
{
   $l=0;
   $l=strlen($row["etat"]);


 ?>    
    
        <tr valign="middle">
            
            <td align="center"><?php echo $row["refcommande"] ?></td>
            
            <td align="center"> <span <?php if ($l>10) echo ' class="badge badge-warning"';
            if ($l==9) echo ' class="badge badge-success"';
             if ($l==7) echo ' class="badge badge-danger"';

             ?>><?php echo $row["etat"] ?></span></td>
            <td><?php echo $row["detail"] ?></td>
       
           
            <td align="center"><?php echo $row["prixtotal"].' '.'TND' ?></td>
                <td>
             <center>   <form action="exportCom.php" method="get">
                    
          <input type="hidden" id="refcommande" name="refcommande" value="<?php echo $row["refcommande"] ?>">
          <input type="hidden" id="prixtotal" name="prixtotal" value="<?php echo $row["prixtotal"] ?>">
          <input type="hidden" id="detail" name="detail" value="<?php echo $row["detail"] ?>">
                   
                    <button  class="btn btn-light" type="submit" ><span class="fa fa-print fa-2x"></span></button>
                </form></center>
            </td>
            <td align="center">
               <center> <form action="supprimercommande.php" method="get">
                    
          <input type="hidden" id="refcommande" name="refcommande" value="<?php echo $row["refcommande"] ?>">
                   
                  <button  class="btn btn-danger" type="submit" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </form></center>
            </td>
         
            
       
            
        </tr>
       
    <?php
}
  
?>
</table>
               </br>
             <br><br>
                </div>
            </div>
        </section>
       
    </body>
</html>
