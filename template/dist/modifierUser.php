<?php
    include "../controller/UtilisateurC.php";
    include_once '../Model/Utilisateur.php';

	$utilisateurC = new UtilisateurC();
	$error = "";

	if (
        isset($_POST['id_event']) &&
    isset($_POST['nom_event']) &&
isset($_POST['type_event']) &&
isset ($_POST['date_event']) &&
isset ($_POST['nbre_participants']) &&
isset($_POST['artiste'])
    ){
		if(!empty($_POST['id_event']) &&
        !empty($_POST['nom_event']) &&
    !empty($_POST['type_event']) &&
    !empty($_POST['date_event']) &&
    !empty($_POST['nbre_participants']) &&
    !empty($_POST['artiste']) 
    

        ) {
            $user = new Utilisateur(
                $_POST['id_event'],
                $_POST['nom_event'],
                $_POST['type_event'],
                $_POST['date_event'],
                $_POST['nbre_participants'],
                $_POST['artiste']
            );
            
            $utilisateurC->modifierUtilisateur($user, $_GET['id_event']);
            //header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier Utilisateur</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="tables.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['id_event'])){
				$user = $utilisateurC->recupererUtilisateur($_GET['id_event']);
				
		?>
		
        <div class="d-flex justify-content-center">
<form action="" method="POST" class="w-50">

<input type="text"  name="id_event" id="id_event" class="form-control"  placeholder="ID evenement" autocomplete="off" value = "<?php echo $user['id_event']; ?>">
<br>
<input type="text" name="nom_event" id="nom_event" class="form-control" placeholder="Nom de l'evenement" autocomplete="off" value = "<?php echo $user['nom_event']; ?>">

<br>
<input type="date" name="date_event" id="date_event" class="form-control" placeholder="date de l'evenement" autocomplete="off" value = "<?php echo $user['date_event']; ?>">
   <br>
    <input type="text" name="nbre_participants" id="nbre_participants" class="form-control" placeholder="nombre des participants" autocomplete="off" value = "<?php echo $user['nbre_participants']; ?>">
  <div class="row">
    <div class="col">
      <input type="text" name="artiste" id="artiste" class="form-control m-0" placeholder="artiste" autocomplete="off" value = "<?php echo $user['artiste']; ?>">
    </div>
    <div class="col">
      <input type="text" name="type_event" id="type_event" class="form-control m-0" placeholder="type" autocomplete="off" value = "<?php echo $user['type_event']; ?>">
      
      
      </div>
      <div class="d-flex justyfy-content-center">
      <input type="submit" class="btn btn-warning" value="modifier" name="modifier">
   
    </div>



</form>


</div>
		<?php
		}
		?>
	</body>
</html>