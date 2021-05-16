<?php

session_start();
include_once  '../../model/livraison.php';
include_once '../../controller/livraisonC.php';
$livraisonC=new LivraisonC();
/*$listelivraison=$livraisonC->afficherLivraison();*/
$nom=$_SESSION['nomLivreur'];
$prenom=$_SESSION['prenomLivreur'];
$idLivreur=$_SESSION['idLivreur'];
$listelivraison=$livraisonC->RechercherLiv($idLivreur);

?>
<html>
	<head>

    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Espace Livraison</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title> Affecter livraison </title>
		
   
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-info">
            <a class="navbar-brand" href="../front/loginLivreur.php">Home of art</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
    <ul class="navbar-nav ml-auto ml-md-0">
     <li><?php echo $nom ?>
     <?php echo $prenom ?>
     </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="userDropdown" href="../front/logoutLivreur.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    
                </li>
            </ul>

        </nav>
        
    <div class="row justify-content">
                            <div class="col-lg-12">
                                <div class=" border-0 rounded-lg mt-5">
                                   
                                    <div class="card-body">
	    
		<hr>
        <form method="POST">

        <div class="mb-3">
   
    
    <br>
      
       <a href="mailing.php" class=" btn btn-warning">Send Mail</a>
     </div>
     
       



     
       </div>
                    </div>
             </div>
        
    </div>      
</form>

        
        
            
            
    
    
    <table  class="table table-hover" border=0 align = 'center'>
			<tr class="table-danger">
                
				<th>Id</th>
                <td>
				<th>Date</th>
                </td>
                <td>
				<th>Livreur</th>
                <td>
				<th>Commande</th>
                <td>
                <th>Etat</th>
                
				<th>Prix</th>
                
                <th>Adresse</th>
				
			</tr>

            <?PHP
				foreach($listelivraison as $livraison){
			?>
				<tr class="table-danger">
					<td><?PHP echo $livraison['idlivraison']; ?></td>
                    <td>
					<td><?PHP echo $livraison['datelivraison']; ?></td>
                    <td>
					<td><?PHP echo $livraison['idLivreur']; ?></td>
                    <td>
                    <td><?PHP echo $livraison['idCommande']; ?></td>
                    <td>
					<td><?PHP echo $livraison['etat']; ?></td>
					<td><?PHP echo $livraison['prix']; ?></td>
                    <td><?PHP echo $livraison['adresse']; ?></td>
					
                <?php
                  }
                 ?>
		</table>
        
            
	</body>
</html>

