<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();
if(isset($_POST['message']) && isset($_GET['idu']) ){
	$idExpi = $_SESSION['id'];
	$idDest = $_GET['idu'];
	$contenue = $_POST['message'];
	$tr1 = htmlentities($contenue);	// prévention de l'injection d'un code malveillant du type xss ou bien sqlinjection
	$message = str_replace("'", "\'", $tr1); /*problème résolue lors de l'envoie de message on a remarqué que dés la saisie du caractère ' dans le message l'evoie se terminé par un echec ce qui est logique parceque la requête juste en dessous n'est plus valide*/
	$date = date("Y-m-d");
	include_once("fonctionDB.php");
	$con = connexionDB();
	$requete = "insert into message values(0,'$idExpi','$idDest','$message','$date');";
	$resultat=executeRequete($con,$requete);
	if($resultat){
		 echo '<div>';
		 echo "<h1 class='w3-panel w3-green'> Message Envoyé </h1>";
		 echo '</div>';
	}
	else{
		echo '<div>';
		echo "<h1 class='w3-panel w3-red'> Message non Envoyé </h1>";
		echo '</div>';
	}
}
?>


<!DOCTYPE html>

<html>



<head>

<link rel="stylesheet" type="text/css" href="style/style.css">

<h1 class="w3-panel w3-blue w3-center"> Nouveau Message </h1>

<form method="post" action="">


<label for="message"> Message </label><br>

<textarea name="message" style="width:100%;" rows= 20 required ></textarea><br>

<input class="w3-btn w3-blue" type="submit" value="Envoyer "><br>


</form>



</head>







</html>


