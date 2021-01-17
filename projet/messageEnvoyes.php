<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();

include("fonctionDB.php");

$con = connexionDB();
$idExp = $_SESSION['id'];
$requete = "select * from message where idExpi='$idExp';";
$resultat = executeRequete($con,$requete);





?>








<!DOCTYPE html>

<head> 
	<link rel="stylesheet" type="text/css" href="style/style.css">

		<h1 class="w3-panel w3-red  w3-center"> Mes Messages </h1>




	</head>



	<body>

<?php

echo '<table class="w3-table w3-striped w3-bordered">';
echo "<tr class=' w3-green'><th>Message</th><th>Date</th></tr>";
while(($ligne = mysqli_fetch_array($resultat))){
 $contenue = $ligne[3];
 $date = $ligne[4];

 echo "<tr><td>$contenue</td><td>$date</td></tr>";

}


echo '</table>';


?>



	</body>


</html>