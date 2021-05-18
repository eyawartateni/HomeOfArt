<?php include 'sendemail_client.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Contact Form</title>
    <link rel="stylesheet" href="style_client.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css'>
  </head>
  <body>

    <!--alert messages start-->
    <?php echo $alert; ?>
    <!--alert messages end-->

    <!--contact section start-->
    <div class="contact-section">
      <div class="contact-info">
        <div><i class="fas fa-map-marker-alt"></i>NourJafeer, Ariana, Tunisie</div>
        <div><i class="fas fa-envelope"></i>HomeOfArt@gmail.com</div>
        <div><i class="fas fa-phone"></i>+216 25 831 535/+216 27 708 111</div>
        <div><i class="fas fa-clock"></i>Lundi - Vendredi 8:00 AM to 5:00 PM</div>
      </div>
      <div class="contact-form">
        <h2>Contacter nous</h2>
        <form class="contact" action="" method="post">
          <textarea name="message" rows="5" placeholder="Votre Message" required></textarea>
          <input type="submit" name="submit" class="send-btn" value="Envoyer">
          <span><a href="ProfilUser.php"><i class="fa fa-arrow-circle-left"></i> Retour</a></span>

          
        </form>
      </div>
    </div>
    <!--contact section end-->

    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

  </body>
</html>