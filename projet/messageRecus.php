<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();

$idDest = $_SESSION['id'];
include("fonctionDB.php");

$con = connexionDB();

$requete = "select * from message where idDesti='$idDest'";

$resultat = executeRequete($con,$requete);
 
?>


<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">

	<h1 class="w3-blue w3-panel w3-center"> Messages Reçus </h1>


</head>



<body>

	<?php


echo '<table class="w3-table w3-stripped w3-bordered">';
echo "<tr class='w3-green'><td>AdressMail</td><td>Message</td><td>Date</td><td>Contacter</td></tr>";
$temp=0;
while(($ligne = mysqli_fetch_array($resultat))){

$idexpi = $ligne[1];


// pour eviter l'éxécution de la meme requete pour le meme utilisateur n messages fois la requete sera éxécuter que si un ya un message d'un autre utilisateur
if($temp!=$idexpi){	
$requete = "select * from utilisateur where id='$idexpi';";
$user_info = executeRequete($con,$requete);
$ligneUtilisateur = mysqli_fetch_array($user_info);
$mail = $ligneUtilisateur[5];
$temp=$idexpi;
}

$contenue = $ligne[3];
$date = $ligne[4];


echo "<tr><td>$mail</td><td>$contenue</td><td>$date</td><td><a href='contactVendeur.php?idu=$idexpi'>répondre</a></td></tr>";



}

echo '</table>';



	?>


</body>



</html>