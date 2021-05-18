<?php 
    session_start();
    include_once "../../controller/UtilisateurC.php";
    include_once "../../model/Utilisateur.php";
    include_once "../../config.php";
    


    $message="";
    $user=null;
    $userC= new utilisateurC();
    $_SESSION['act']="0";
    if(      isset($_POST['email']) &&
             isset($_POST['pass'])
             
      )
    {
        if(!empty($_POST['email']) &&
            !empty($_POST['pass'])
          )
            {
                $message=$userC->connexionUser($_POST['email'],$_POST['pass']);
                
                
                if($message!='pseudo ou le mot de passe est incorrect')
                {
                    $liste=$userC->Rechercherid($_POST['email'],$_POST['pass']);
                    $_SESSION['act']="1";
                    $_SESSION['id']=$liste['id'];
                    $_SESSION['image_client']=$liste['image_client'];
                    $_SESSION['nom']=$liste['nom'];
                    $_SESSION['prenom']=$liste['prenom'];
                    $_SESSION['email']=$liste['email'];
                    $_SESSION['login']=$liste['login'];
                    $_SESSION['password']=$liste['password'];
                    $_SESSION['role']=$liste['role'];
                    if($_SESSION['role']=="admin" || $_SESSION['role']=="artiste")
                    {
                        header('location:../back/dash.php');
                    }
                    else
                    {
                        header('location:ProfilUser.php');
                    }
                   
                }
                else
                {
                    $message='pseudo ou le mot de passe est incorrect';
                }
            }
        
            else {
                
                $error="Missing information !";
            }
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>login</title>
        <link href="css/a.css" rel="stylesheet" />
        <?php
    require_once ('include/header.php');
    ?>
        
    </head>
    <body  style="background-color:#db7618;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="email" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="pass" id="pass" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">Forgot Password?</a>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button type="submit" name="olla" class="btn btn-primary btn-block" >Login</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                    <div class="card-footer text-center">
                                    <div class="small"><a href="loginLivreur.php">Espace Livreur</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
