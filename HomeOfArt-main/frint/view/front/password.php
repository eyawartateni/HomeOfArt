
<?php
include_once "../../controller/UtilisateurC.php";
include_once "../../model/Utilisateur.php";
include_once "../../config.php";

   $error="";
   $user=null;
   $userC= new utilisateurC();


define('EMAIL', 'mayssa.bouzid2000@gmail.com');
define ('PASS','02052000m');

if(isset($_POST['reset'])) {
    $mailto =$_POST['email']; // houni t7ot il mail ili bich tibaathlou 
    $mailSub = "salemou alykom";
    $mailMsg = "Votre password est 0000 temporaire vous pousez le modifier";
    $userC->updatepassword($_POST['email']);
    require 'PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "smtp.gmail.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "mayssa.bouzid2000@gmail.com"; // houni t7ot il maail mnin bich yitibaaath
    $mail ->Password = "02052000m"; // houni t7ot il mdp mttaaa il  maail mnin bich yitibaaath
    $mail ->SetFrom("mayssa.bouzid2000@gmail.com"); // houni t7ot il maail mnin bich yitibaaath
    $mail ->Subject = $mailSub;
    $mail ->Body = $mailMsg;
    $mail ->AddAddress($mailto);

    if(!$mail->Send())
    {
    echo "Mail Not Sent";
    }
    else
    {
    echo "Mail Sent";
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
        
        <link href="css/a.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="./login.php">Return to login</a>
                                                
                                                <input type="submit" class="btn btn-outline-primary" value="reset password" name="reset" >
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
