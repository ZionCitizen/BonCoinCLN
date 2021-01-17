<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php
session_start();
define('KB', 1024);
define('MB', 1048576);
define('TAILLE_MAX',5);

if(isset($_POST['nom']) && isset($_POST['categorie']) && isset($_POST['description']) && isset($_POST['prix'])){
	$idu = $_SESSION['id'];
	$nom = $_POST['nom'];
	$categorie = $_POST['categorie'];
	$description = $_POST['description'];
	$prix = $_POST['prix'];
	$dateAjout = date("Y-m-d");
	$validite = time() + 60*24*3600;
	$dateFin = date("Y-m-d",$validite);
	include_once("fonctionDB.php");
    $con = connexionDB();
	$requete = "insert into annonce values(0,'$idu','$nom','$categorie','$description','$prix','$dateAjout','$dateFin');";
	executeRequete($con,$requete);
    $requete = "select max(ida) from annonce where idu='$idu';"; //on récupère le dernier idA qui correspond a la dernière annonce du //user
	$resultat = executeRequete($con,$requete);
	$ligne = mysqli_fetch_array($resultat);
	$ida = $ligne[0]; //ida


	$format_autoriser = array("jpg","jpeg","png");

		for($i=0;$i<count($_FILES['uploads']['name']);$i++){

			$fichier = $_FILES['uploads']['name'][$i];
			$temp_name = $_FILES['uploads']['tmp_name'][$i];
			$taille_fichier = $_FILES['uploads']['size'][$i];
			$resultat = explode(".",$fichier);
		    $extension_fichier = strtolower(end($resultat));
		   
			 if(in_array($extension_fichier, $format_autoriser)){
				  if($taille_fichier < TAILLE_MAX * MB){
						if(move_uploaded_file($temp_name,"uploads/$fichier")){
								$chemin="uploads/$fichier";
								$requete = "insert into image values(0,'$ida','$chemin');";
								executeRequete($con,$requete);							
						}
						else{
							echo "erreur lors de la sauvegarde  de l'image ";
						}
					}
					else{
				  			echo "le Fichier ".$fichier." a une taille qui n'est pas conforme !<br>";
				  			echo "Taille de votre Fichier $taille_fichier > Maximum Autorisé  TAILLE_MAX MB<br>";
				  		}

				  }
			   else
				  {
				  	echo "le Fichier ".$fichier." n'est pas conforme !<br>";
				    echo "Format Autorisés jpg jpeg png seulement <br>";
				  }

				  		

				  	}


				 
		}

		header('location:home.php');
 




?>