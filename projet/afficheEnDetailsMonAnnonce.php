<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php


if(isset($_GET['idAnnonce'])){

$idA=$_GET['idAnnonce'];

include_once('fonctionDB.php');

$con=connexionDB();

$requete_annonce="select * from annonce where ida='$idA';";


$resultat_annonce = executeRequete($con,$requete_annonce);

$ligne_annonce = mysqli_fetch_array($resultat_annonce );

//donnée qui concerne l'annonce 

$idu = $ligne_annonce[1]; 
$nom_annonce = $ligne_annonce[2];
$categorie = $ligne_annonce[3];
$description = $ligne_annonce[4];
$prix = $ligne_annonce[5];
$date_ajout = $ligne_annonce[6];
$date_fin = $ligne_annonce[7];



//les images qui correspondent a l'annonce 

$requete_image = "select chemin from image where ida='$idA'";
$resultat_image = executeRequete($con,$requete_image);

}


?>

<!DOCTYPE html>

<html>



<head>
<link rel="stylesheet" type="text/css" href="style/style.css">



<h1 class="w3-container w3-green w3-center">Annonce <?php $nom_annonce?></h1>

<h2 class="w3-container w3-green">Informations Annonce</h2>

<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">ID_Annonce:<?php echo $idA; ?></p>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Nom_Annonce: <?php echo $nom_annonce; ?> </p>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Catégorie: <?php echo $categorie; ?> </p>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Description:<?php echo $description; ?></p>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Prix: <?php echo $prix; ?></p>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Date D'ajout: <?php echo $date_ajout; ?></p>
<p  class="w3-panel w3-leftbar w3-sand w3-xlarge w3-serif">Date Fin: <?php echo $date_fin; ?></p>

<h2 class="w3-container w3-green">Images</h2>

<?php
if(mysqli_num_rows($resultat_image)==0){
	 echo "l'annonce n'a pas d'image !";
}else
	if(mysqli_num_rows($resultat_image) >= 2 ){
		while($ligne = mysqli_fetch_array($resultat_image)){
		$chemin = $ligne[0];
		echo "<img src=\"$chemin\" alt='erreur lors du chargement' width=\"400\" height=\"200\">";
	}

}
else{

	$ligne=mysqli_fetch_array($resultat_image);
	$chemin = $ligne[0];
	echo "<img src=\"$chemin\" alt='erreur lors du chargement' width=\"400\" height=\"200\">";

}

	?>




	</head>



	<body>
		


	</body>


</html>


