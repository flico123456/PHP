<?php
 
// Importing DBConfig.php file.
include 'config.php';
 
// Connecting to MySQL Database.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 $json = file_get_contents('php://input');
 
 $obj = json_decode($json,true);
 
 // Nom du téléphone
 $S_Name = $obj['name_phone'];

// Date du panier
 $Dates = $obj['dates'];
 

 $Produit = $obj['produits'];

 $AjoutHistorique = "INSERT INTO numerotation_panier (dates, nom_phone) VALUES ('$Dates', '$S_Name')";
 
 if(mysqli_query($con, $AjoutHistorique)){
 
 }
 else{
 
  echo 'Erreur : Veuillez réessayer.';
 
 }
 mysqli_close($con);
?>