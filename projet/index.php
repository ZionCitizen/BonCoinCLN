<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<!DOCTYPE html>


<html>

<head>

	<link rel="stylesheet" type="text/css" href="style/style.css">

<?php
include_once("connexion.php");
if(isset($_GET['erreur'])){
	 	echo "<div class='w3-panel w3-red'> Adresse Mail ou Mot de Passe Incorrect ! </div>";
}
?>


</head>



<body style="background-image: url('images/attic.jpg');"> 
<?php
include_once("register.php");

?>

	</body>



</html>


