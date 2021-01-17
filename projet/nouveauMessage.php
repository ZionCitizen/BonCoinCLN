<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();
if(isset($_POST['message']) && isset($_POST['dest'])){

	$idExpi = $_SESSION['id'];
	$dest = $_POST['dest'];
	$resultExp = explode(" ", $dest);
	$idDest = end($resultExp);
	$contenue = $_POST['message'];
	$date = date("Y-m-d");
	include("fonctionDB.php");
	$con = connexionDB();
	$requete = "insert into message values(0,'$idExpi','$idDest','$contenue','$date');";
	executeRequete($con,$requete);

}




?>


<!DOCTYPE html>

<html>



<head>

<link rel="stylesheet" type="text/css" href="style/style.css">

<h1 class="w3-panel w3-red w3-center"> Nouveau Message </h1>

<form method="post" action="">

<label for="destinataire">Choisir Utilisateur</label><select name="dest" required><?php 
	include("fonctionDB.php");
	$requete = "select * from utilisateur;";
	$con = connexionDB();
	$resultat = executeRequete($con,$requete);
	while(($ligne = mysqli_fetch_array($resultat))){
		$id = $ligne[0]; $nom = $ligne[1]; $prenom = $ligne[2];
		echo "<option> $nom $prenom $id</option>";
	}

?> </select><br>

<label for="message"> Message </label><br>

<textarea name="message" cols="120" rows="20" required ></textarea><br>

<input class="w3-btn w3-red " type="submit" value="Envoyer "><br>


</form>



</head>







</html>