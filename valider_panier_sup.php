<?php
 
// Importing DBConfig.php file.
include 'config.php';
 
// Connecting to MySQL Database.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 // Nom du téléphone
 $S_Name = $obj['name_phone'];

 // Supression des produits dans le panier :
 $Delete_qty = "DELETE FROM appli_panier WHERE nom_phone= '$S_Name'"; 
 
 if(mysqli_query($con, $Delete_qty)){
 
 }
 else{
 
  echo 'Erreur : Veuillez réessayer.';
 
 }
 mysqli_close($con);
?>