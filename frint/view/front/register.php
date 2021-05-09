<?php 
   include_once "../../Controller/Cutilisateur.php";
   include_once "../../Model/utilisateur.php";
   include_once "../../config.php";
    $error="";
    $user=null;
    $userC= new utilisateurC();
session_start();
  if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
  {
    $status = "<p style='color:#FFFFFF; font-size:20px'>
    <span style='background-color:#46ab4a;'>Votre code captcha est correct.</span></p>";
    if(      isset($_POST['nom']) &&
             isset($_POST['prenom']) &&
             isset($_POST['email']) &&
             isset($_POST['login']) &&
             isset($_POST['pass'])
      )
    {
        if( !empty($_POST['nom']) &&
            !empty($_POST['prenom']) &&
            !empty($_POST['email']) &&
            !empty($_POST['login']) &&
            !empty($_POST['pass'])
          )
            {
                $user =new Utilisateur(
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['email'],
                    $_POST['login'],
                    $_POST['pass']
                );
                $userC->ajouterUtilisateur($user);
                header('location:login.php');
            }
            else {
                $error="Missing information !";
            }
    }


  }else{
    $status = "<p style='color:#FFFFFF; font-size:20px'>
    <span style='background-color:#FF0000;'>Le code captcha entré ne correspond pas! Veuillez réessayer.</span></p>";
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
        <title>register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color:#db7618;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form name="f" action="" method="POST" onsubmit="test();">
                                        
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-4" name="nom" id="nom" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-4" name="prenom" id="prenom" type="text" placeholder="Enter last name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="email" type="text" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">login</label>
                                                <input class="form-control py-4" name="login" id="login" type="text"  placeholder="Enter your login" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" name="pass" id="pass" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            
    <table>
    <tr>
      <td>
        <label>Entrer le texte dans l'image</label>
        <input name="captcha" type="text">
        <img src="captcha.php" style="vertical-align: middle;"/>
      </td>
    </tr>
   
    </table>
   
                                            <div class="form-group mt-4 mb-0"><button type="submit" name="olla" class="btn btn-primary btn-block" href="../login.php">Create Account</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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

        <script src="../../script.js">


        </script>
    </body>
</html>
