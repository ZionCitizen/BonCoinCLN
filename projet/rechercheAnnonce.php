<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();

if(isset($_POST['keywords'])) {
$resultat;
$con;
include("fonctionDB.php");

$idu = $_SESSION['id'];
$mots = $_POST['keywords'];
$categorie = $_POST['categorie'];
$prix = $_POST['prix'];
if(isset($_POST['ordre']))$ordre = $_POST['ordre'];



if(!empty($mots) && !empty($prix) && !empty($categorie) && !empty($ordre)){$requete="select * from annonce where nom='$mots' or description REGEXP '$mots' and prix <= $prix and categorie='$categorie' order by dateFin $ordre;";}

else if(!empty($mots) && !empty($prix) && !empty($categorie)){$requete="select * from annonce where  nom='$mots' or description REGEXP '$mots' and prix <= $prix and categorie='$categorie' order by dateFin asc;";}

else if(!empty($mots) && !empty($ordre) ){$requete="select * from annonce where  nom='$mots' or description REGEXP '$mots' order by dateFin $ordre;";}


else if(!empty($mots) && !empty($prix)){$requete="select * from annonce where  nom='$mots' or description REGEXP '$mots' and prix <= $prix order by dateFin asc;";}


else{
	$requete = "select * from annonce where nom='$mots' or description REGEXP '$mots' order by dateFin asc;";
}

$con = connexionDB();
$resultat = executeRequete($con,$requete);





}





?>


<!DOCTYPE html>

<html>


<head>

<link rel="stylesheet" type="text/css" href="style/style.css">


</head>



<body>
		<h1 class="w3-panel w3-blue w3-center"> Rechercher une Annonce </h1>

<form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post" action="">

<label for="keywords">Mot-clés</label>

<input class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" type="text" name="keywords" placeholder="mots-clés" required><br>

<label for="categorie">Catégorie</label>

<input class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" type="text" name="categorie" ><br>
<label for="ordre">OrderBy </label>

<input class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" type="radio" name="ordre" value="asc">croissant
<input class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" type="radio" name="ordre" value="desc">decroissant<br>
 
<label for="prix" >Prix-Max </label>

<input class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" type="text" name="prix" ><br>

<input class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin w3-btn" type="submit" value="recherche"><br>


</form>

<?php

if(isset($resultat)){
	echo '<table w3-table w3-stripped w3-bordered style="width:100%">';

echo"<tr class='w3-green w3-center'><th>IdAnnonce</th><th>Nom</th><th>Catégorie</th><th>Description</th><th>Prix</th><th>DateAjoute</th><th>DateFin</th><th>Détails</th></tr>";
	while($ligne = mysqli_fetch_array($resultat)){
		$ida = $ligne[0];
		$nom = $ligne[2];
		$categorie = $ligne[3];
		$description = $ligne[4];
		$prix = $ligne[5];
		$dateAj = $ligne[6];
		$dateFin = $ligne[7];
		echo "<tr><td>$ida</td><td>$nom</td><td>$categorie</td><td>$description</td><td>$prix</td><td>$dateAj</td><td>$dateFin</td><td><a href=\"afficheAnnonce.php?idAnnonce=$ida\">voir</a></td></tr>";
	}


	echo '</table>';
}


?>
	</body>


</html>

