<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();


if(!empty($_POST['email']) && !empty($_POST['mdp'])){
	$email = $_POST['email'];
	$mdp = $_POST['mdp'];
	$requette = "select * from utilisateur where email='$email' and mdp='$mdp';";
	include("fonctionDB.php");
	$con = connexionDB();
	$resultat = executeRequete($con,$requette);
	$presentDansDB = mysqli_num_rows($resultat);
	if($presentDansDB==0){
		header('location:index.php?erreur=1');
	} else{
		$ligne = mysqli_fetch_array($resultat);
		$_SESSION['id'] = $ligne[0];
		$_SESSION['nom'] = $ligne[1];
		$_SESSION['prenom'] = $ligne[2];
		$_SESSION['email'] = $ligne[5];
	  	header("location:home.php");

	}

}



?>

<!DOCTYPE html>


<html>

<head>


<link rel="stylesheet" type="text/css" href="style/style.css">


</head>


<body >

<h1 class="w3-container w3-teal w3-center"> Bienvenue sur MonVideGrenier </h1>

<div class="w3-container w3-teal " style="width:22%;">
  <h1>Connexion</h1>
</div>

<form class="w3-container" method="post" action="connexion.php">

  <label class="w3-text-teal"><b>Email</b></label>
  <input class="w3-input w3-border w3-light-grey" style="width:21%;" type="text" name="email">

  <label class="w3-text-teal"><b>Mot De Passe </b></label>
  <input class="w3-input w3-border w3-light-grey" style="width:21%;" type="password" name="mdp">
  <input class="w3-btn w3-blue-grey" type="submit" value="se connecter">

</form>



	</body>

</html>



