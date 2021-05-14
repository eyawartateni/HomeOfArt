<?php
session_start();
include_once "../../controller/UtilisateurC.php";
    include_once "../../model/Utilisateur.php";
    include_once "../../config.php";

$error="";
$user=null;
$userC= new utilisateurC();
$id=$_SESSION['id'];
$liste=$userC->user($id);
$_SESSION['nom']=$liste['nom'];
$_SESSION['prenom']=$liste['prenom'];
$_SESSION['email']=$liste['email'];
$_SESSION['login']=$liste['login'];
$_SESSION['password']=$liste['password'];
$_SESSION['role']=$liste['role'];



$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$email=$_SESSION['email'];
$login=$_SESSION['login'];
$password=$_SESSION['password'];
$role=$_SESSION['role'];
if(isset($_POST['supp']))
{
    $userC->SupprimerUtilisateur($id);
    header('location:login.php');
}
if($_SESSION['act']=="0")
{
    header('location:login.php');
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
        <!--  All snippets are MIT license http://bootdey.com/license -->
        <title>profil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body{
                margin-top:20px;
                color: #1a202c;
                text-align: left;
                background-color: #e2e8f0;
            }
            .main-body {
                padding: 15px;
            }
            .card {
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
            }

            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0,0,0,.125);
                border-radius: .25rem;
            }

            .card-body {
                flex: 1 1 auto;
                min-height: 1px;
                padding: 1rem;
            }

            .gutters-sm {
                margin-right: -8px;
                margin-left: -8px;
            }

            .gutters-sm>.col, .gutters-sm>[class*=col-] {
                padding-right: 8px;
                padding-left: 8px;
            }
            .mb-3, .my-3 {
                margin-bottom: 1rem!important;
            }

            .bg-gray-300 {
                background-color: #e2e8f0;
            }
            .h-100 {
                height: 100%!important;
            }
            .shadow-none {
                box-shadow: none!important;
            }

        </style>
        <?php
   require_once ('include/header.php');
    ?>
    </head>
    <body>
    
    <li value="logout" style="background-color: #04AA6D; color: #ff8800; padding: 12px 18px; margin: 8px 0; border: none; border-radius: 12px;cursor: pointer; width: 3.5%;font-size: 12px; position:absolute ; top:5px; right:140px;">
               <a href="./logout.php" > logout</a>
            </li>
    
    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="affichePub.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <form name="f"action="" method="POST" onsubmit="test();">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4><?php echo $prenom ?> <?php echo $nom ?> </h4>
                                        <p class="text-secondary mb-1"><?php echo $role ?></p>
                                        <br>
                                        <input type="submit" class="btn btn-outline-primary" value="modifier ce compte" name="modif" >
                                        <input type="submit" class="btn btn-outline-primary"  value="Supprimer ce compte" name="supp">
                                        <a href="Ajouter_publication.php"  class="btn btn-outline-primary">Partager</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">

                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>

                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name=nom class="form-control" value="<?php echo $nom ?>">
                                        <input type="text" name=prenom class="form-control" value="<?php echo $prenom ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name=email class="form-control" value="<?php echo $email ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">login</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name=login class="form-control" value="<?php echo $login?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name=pass class="form-control" value="<?php echo $password ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">role</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <select name="role">
                                    <option value="0" selected="selected">choisir un role</option>
                                    <option value="artiste"> artiste</option>
                                     <option value="client"> client</option>
                                     </select>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>

            </form>
            <script >
                
                function test()
{
    var nom=f.nom.value
    var prenom=f.prenom.value
    var email=f.email.value
    var pass=f.pass.value
    var login=f.login.value
    var role=f.role.value
    if(login.length==0 || pass.length==0 || email.length==0 || nom.length==0 || prenom.length==0 || role==0 )
    {
        alert("les champs sont vide")
    }
    else if(pass.length<8)
        alert("tapez un mot de passe avec 8 caracetere au minimum")
    else if(email.substring(email.indexOf('@'))!='@esprit.tn')
    {
        console.log(email.substring(email.indexOf('@')))
        alert("tapez un email de esprit")
    }
    else
    {
        alert("succes !!")
    }


}
            </script>
            <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            <script type="text/javascript">

            </script>

    </body>
    </html>
<?php
$error="";
$user=null;
$usere= new utilisateurC();
if(isset($_POST['modif']))
{
if(      isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['email']) &&
    isset($_POST['login']) &&
    isset($_POST['pass']) &&
    isset($_POST['role'])
)
{
    if( !empty($_POST['nom']) &&
        !empty($_POST['prenom']) &&
        !empty($_POST['email']) &&
        !empty($_POST['login']) &&
        !empty($_POST['pass']) &&
        !empty($_POST['role'])
    )
    {
        $user =new Utilisateur(

            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['login'],
            $_POST['pass']
        );
        $usere->ModifierUtilisateur($user,$_POST['role'],$id);
    }
    else {
        $error="Missing information !";
    }
}
}
?>