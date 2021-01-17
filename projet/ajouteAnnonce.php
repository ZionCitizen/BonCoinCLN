<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<!DOCTYPE html>

<html>


<head>
<link rel="stylesheet" type="text/css" href="style/style.css">


<h1 class="w3-blue w3-panel w3-center"> Ajouter Une Annonce</h1>

<form class=" w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="POST" action="upload.php" enctype="multipart/form-data">

<lable for="nom">Nom</lable>

<input type="text" name="nom" required><br>

<label for="categorie">Categorie</label>

<input type="text" name="categorie" required><br>

<label for="prix">Prix</label>

<input type="text" name="prix" required><br>

<label for="fichier">Images</label>

<input type="file" name="uploads[]" multiple required><br>


<label for="description">Description</label><br>

<textarea name="description" cols="195" rows="20" placeholder="300 caractères maximum"></textarea><br>

<input class="w3-btn w3-blue" type="submit" value="Ajouter Mon Annonce "><br>

</form>


</head>



<body>


	</body>


</html>