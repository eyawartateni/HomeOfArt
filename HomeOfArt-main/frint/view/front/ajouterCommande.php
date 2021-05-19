<?php
session_start();
include_once "../../model/commande.php";
include_once "../../controller/commandeC.php";
include_once "../../controller/panierC.php";
require_once ('include/header.php');

$idclient=$_SESSION['id'];
$email=$_SESSION['email'];

$mailto =$email; // houni t7ot il mail ili bich tibaathlou 
    $mailSub = "Commande";
    $mailMsg = "Votre commande a ete traite avec succes";
    require 'PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "smtp.gmail.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = ""; // houni t7ot il maail mnin bich yitibaaath
    $mail ->Password = ""; // houni t7ot il mdp mttaaa il  maail mnin bich yitibaaath
    $mail ->SetFrom(""); // houni t7ot il maail mnin bich yitibaaath
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

$panierC=new panierC();
if (isset($idclient))
    //$panierC->supprimertout($idclient);

    $commande=new commande($_POST["refcommande"],$idclient,$_POST["prixtotal"],$_POST["etat"],$_POST["detail"],$_POST["date"]);
    $commandeC=new commandeC();
    $commandeC->ajoutercommande($commande);
      
    header("location:afficherCommande.php");
 

?>
