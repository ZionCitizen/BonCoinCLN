<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" type="text/css" href="style/style.css">
<title> MonVideGrenier </title>

<meta charset="UTF-8">
<meta name="keywords" content="vente achat">
<meta name="description" content="projet programmation web 2019 2020">
<meta name="viewport"  content="width=device-width , intiale-scale=1">


	</head>


	<body>

<!-- nom prenom date_naissance telephone adressMail mdp -->



<h2 class="w3-container w3-teal" style="width:22%;"> Inscription </h2> 

<form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post" action="">

<label class="w3-text-blue" for="nom">Nom</label>

<input class="w3-input" type="text" name="nom" required><br>

<label class="w3-text-blue" for="prenom">Prenom</label>

<input class="w3-input" type="text" name="prenom" required><br>

<label class="w3-text-blue" for="dateN">Date Naissance</label>

<input class="w3-input" type="date" name="dateN" required><br>

<label class="w3-text-blue" for="telephone">Telephone</label>

<input class="w3-input" type="tel" name="telephone" required><br>

<label class="w3-text-blue" for="mail">Email</label>

<input class="w3-input" type="email" name="mail" required><br>

<label class="w3-text-blue"  for="pwsd">Mot de Passe </label>

<input class="w3-input" type="password" name="pswd" required><br>

	<input class="w3-btn w3-blue-grey" type="submit" value="S'inscrire">

</form>


	</body>

</html>


<?php

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dateN']) && isset( $_POST['telephone']) && isset($_POST['mail']) && isset($_POST['pswd'])){

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$daten = $_POST['dateN'];
$telephone = $_POST['telephone'];
$email = $_POST['mail'];
$mdp = $_POST['pswd'];

include("fonctionDB.php");
$res = connexionDB();
$requete = "insert into utilisateur values(0,'$nom','$prenom','$daten','$telephone','$email','$mdp')";
if(executeRequete($res,$requete)){
		echo "<div class='w3-panel w3-green'>";
		echo "<h1>Inscription Réussie !</h1>";
		echo "<p>Bienvenue parmi nous !</p>";
		echo "</div>";
	}else{
		echo "<div class='w3-panel w3-red'>";
		echo "<h1>Véréfiez Que Vous Avez Bien Remplis les champs</h1>";
		echo "</div>";
	}


}else









?>