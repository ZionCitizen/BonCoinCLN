<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();
?>
<!DOCTYPE html>


<html>

<head>

	<link rel="stylesheet" type="text/css" href="style/style.css">


<h1 style="color:orange; text-align:center; "> Mon Espace </h1>

<h1 style="color:orange">Bienvenue <?php echo $_SESSION['prenom'];?></h1>

<!--TO DO |  | ajouteAnnonce | rechercheAnnonce | mesAnnonces | messagerie | deconnexion-->


<?php

include_once("navigationBarre.php");

?>



</head>


<body style="background-image: url('images/attic.jpg') ;center;">

	</body>

</html>
