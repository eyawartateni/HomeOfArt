<?PHP
require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/commentaire.php';
include_once '../../Controller/commentaireC.php';

$error = "";
$pub  = null;
$comC = new CommentaireC();
$db= config::getConnexion();


$req=$comC->afficherCommentaires();


?>

<!doctype html>
<html lang="en">

<head>
<title>Commentaires</title>

<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">
    
    <style type="text/css">
    
    body
    {
      width: 100%;
      height: 100vh;
      background :#eee;
     }
    
    .center
    {
      width: 70%;
      margin-right: auto;
      margin-left: auto;
      background:#D3D3D3;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }

    </style>

  
</head>
    <body>
    

 <br>
 <br>
 <br>
 <br>

<div class="center"> 


<table id="mauexport" class="table table-success table-striped" width=100% collaspacing="0" >
       
  <thead>

    <tr >
      <th scope="col">Id</th>
      <th scope="col">Message</th>
      <th scope="col">Date</th>
      <th scope="col">Publication </th>
      <th scope="col">Client </th>
     
      <th scope="col">Supprimer</th>
      <th scope="col">Modifier</th>
    </tr>
  </thead>
  <tbody>   <?php
    $req=$comC->afficherCommentaires(); 
                                   
                                        foreach($req as $row){
                                        ?>

                                        <tr class="table table-success table-striped">

                                        <td><?php echo $row['id_commentaire']; ?></td>
                                        <td><?php echo $row['messages']; ?></td>
                                        <td><?php echo $row['date_commentaire']; ?></td>
                                        <td><?php echo $row['id_publication_commentaire']; ?></td>
                                        <td><?php echo $row['id_client_commentaire']; ?></td>
                                            
                                
                                            <td>
                        <form method="POST" action="supprimerCommentaire.php">
                        
                        <input type="submit" class="btn btn-info " style="color:black" name="supprimer" value="supprimer">
                        <input type="hidden" value=<?PHP echo $row['id_commentaire']; ?> name="id_commentaire">
                        </form>
                    </td>
                    <td>
                    <form method="POST" action="modifierCommentaire.php">
                         <a class="btn btn-info " style="color:black" href="modifierCommentaire.php?id_commentaire= <?PHP echo $row['id_commentaire'];?>"> Modifier </a> 
                    
                        
                    
                        </form>
                        
                    </td>
                                            
                                      </tr>
                                <?php
                                }
                                ?>
                                    </tbody>
                                </table>

</div> 
                


<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>


</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    </body>
    </html> 
