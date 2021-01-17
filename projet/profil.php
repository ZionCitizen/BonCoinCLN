<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();

    $id = $_SESSION['id'];
	include("fonctionDB.php");
	$con = connexionDB();
	$requete = "select * from utilisateur where id='$id' ";
	$resultat = executeRequete($con,$requete);
	$num_lignes = mysqli_num_rows($resultat);
		if($num_lignes==0){
			echo "Utilisateur Introuvable !";
		}
		else{
			$ligne = mysqli_fetch_array($resultat);
			$id=$ligne[0];
			$nom=$ligne[1];
			$prenom=$ligne[2];
			$daten=$ligne[3];
			$tel=$ligne[4];
			$email=$ligne[5];
		}

?>

<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
<h1 class="w3-panel w3-green Red w3-center w3-text-dark-gray w3-hover-text-red"> Profil de <?php echo $_SESSION['prenom'];?> </h1>

 <div class="w3-bar w3-dark-grey">
  <a href="home.php" class="w3-bar-item w3-button w3-mobile w3-green" style="width:50%">Home</a>
  <a href="mesAnnonces.php" class="w3-bar-item w3-button w3-mobile w3-green" style="width:50%">Mes Annonces</a>
</div> 




</head>


<body>


<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Vous Etes le #<?php echo $id ?> inscrit sur le site</p><br>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">ID: <?php echo $id?></p><br>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Nom: <?php echo $nom?></p><br>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Prenom: <?php echo $prenom?></p><br>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Date Naissance: <?php echo $daten ?></p><br>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Telephone: <?php echo $tel?></p><br>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Adresse Email: <?php echo $email ?> </p><br>


	</body>


</html>