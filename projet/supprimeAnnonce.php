<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
include_once("fonctionDB.php");

if(isset($_GET['ida'])) {
$ida=$_GET['ida'];
$con=connexionDB();
$requete="delete from annonce where ida='$ida';";

$resultat = executeRequete($con,$requete);

if($resultat){
	echo '<div class="w3-panel w3-green">';
	echo '<h1>Annonce supprimé </h1>';
	echo '<p>votre annonce a été supprimé</p>';
	echo '</div>';
}
else{
	echo '<div class="w3-panel w3-red">';
	echo '<h1>Annonce Introuvable</h1>';
	echo '<p>votre annonce n\' a pas  été supprimé</p>';
	echo '</div>';
}

}else{
	echo '<div class="w3-panel w3-red">';
	echo '<h1>Annonce Introuvable </h1>';
	echo '<p>votre annonce n\' a pas  été supprimé</p>';
	echo '</div>';
}








?>


<!DOCTYPE html>


<html>

<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">


</head>

<body>
	


</body>

</html>


