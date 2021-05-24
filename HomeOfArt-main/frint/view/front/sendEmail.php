<?php 

use PHPMailer\PHPMailer\PHPMailer;
if(isset($_Post['name'])&& isset($_POST['email']) )
{
    $name= $_POST['name'];
    $email= $_POST['email'];
    $subject= $_POST['subject'];
    $body = $_POST['body'];
    require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";
$mail =new PHPMailer();
 //smtp settings
 $mail->isSMTP();
 $mail->Host= "smtp.gmail.com";
 $mail->SMTPAuth = true;
 $mail->Username= "";
 $mail->Password= '';
 $mail->Port = 465;
 $mail->SMTPSecure = "ssl";
 // email settings
 $mail->isHTML(true);
 $mai->setForm($email, $name);
 $mail->addAddress("");
$mail->Subject= ("$email($subject)");
$mail->Body = $body;
if($mail->send())
{
    $status= "success";
    $response = "email is sent!";
}
else
{
    $status= "failed";
    $response = "sth is wrong: <br> " . $mail->ErrorInfo;
}

exit(json_encode(array("status"=>$status, "response"=>$response)));

}






?>