<?php
$prenom=$_SESSION['prenom'];
$nom=$_SESSION['nom'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <style>
        strong,
        .far {
            color: darkgreen;
            
            
        }
        .navbar-right{
            margin-left: 520px;   
        }
        .navbar-brand {
            color : #FFFF00 ;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                
               
           </a>
                
            </div>
            <ul class="nav navbar-nav far">
                


                <li>bienvenue <?php echo $prenom ?> <?php echo $nom ?></li>
               



                <form class="navbar-form navbar-right" action="logout.php" method="POST">
                    <button type="submit" class="btn btn-success">
                           <span class="glyphicon glyphicon-log-out">
                           </span> &nbsp; se déconnecter
                    </button>
                </form>
            </ul>
        </div>
    </nav>
</body>

</html>