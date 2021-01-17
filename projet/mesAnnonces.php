<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();
$idu = $_SESSION['id'];
include_once("fonctionDB.php");
$con = connexionDB();
$requete = "select * from annonce where idu='$idu';";
$resultat = executeRequete($con,$requete);

?>

<!DOCTYPE html>


<html>



<head>	
	<link rel="stylesheet" type="text/css" href="style/style.css">

	<h1 class="w3-serif w3-center w3-red"> Mes Annonces </h1>


	</head>




	<body>


<?php
echo '<table class="w3-table w3-striped w3-bordered">';
echo '<tr class="w3-green"><th>Nom</th><th>Catégorie</th><th>Déscription</th><th>Prix</th><th>DateAjout</th><th>DateFin</th><th>supprimer</th><th>details</th></tr>';
while($ligne = mysqli_fetch_array($resultat)){
$ida = $ligne[0]; $nom = $ligne[2];$type = $ligne[3];$description= $ligne[4];$prix = $ligne[5];$dateAjout = $ligne[6];$dateFin = $ligne[7];
echo "<tr>  <td>$nom</td>  <td>$type</td>  <td>$description</td>  <td>$prix</td>  <td>$dateAjout</td> <td>$dateFin</td>  <td><a href='supprimeAnnonce.php?ida=$ida'>supprimer</a></td>  <td><a href='afficheEnDetailsMonAnnonce.php?idAnnonce=$ida'>details</a></td></tr>";
}
echo'</table>';
?>



	</body>




</html>
