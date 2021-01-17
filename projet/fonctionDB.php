<!---TOUDJI NASSIM | BOUGOURI KEITA --------->
<?php

function connexionDB(){
  include_once("parametreDB.php");
  $res = mysqli_connect(HOST,USER,PASSWORD,DEFAULTDB);
  if($res){
 // echo "Connexion Reussi !<br>";
  }else{
  //	echo "Echec de la Connexion !<br>";
  }
return $res;

}

function connexionDB2($dbname){
  include_once("parametreDB.php");
  $res = mysqli_connect(HOST,USER,PASSWORD,$dbname);
  if($res){
  //  echo "Connexion Reussi !<br>";
  }else{
  	  //	echo "Echec de la Connexion !<br>";
  }
return $res;

}

function executeRequete($res,$requette){
  $ok = mysqli_query($res,$requette);
  if($ok){ 
  // echo "Requette Done !<br>";
  }else{
   // echo "Requette Failed !<br>";
  }
return $ok;
}


//debug stuff 
function viewInfo($nom,$prenom,$date,$tel,$email,$mdp){
  echo "nom: $nom<br>";
  echo "prenom: $prenom<br>";
  echo "date: $date<br>";
  echo "telephone: $tel<br>";
  echo "email: $email<br>" ;
  echo "mot de passe: $mdp<br>";

}




?>