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

 $Localisation = $obj['localisation'];

 $Produit = $obj['name_produit'];

// Supression de la quantité dans le dépots :
$Delete_qty = "UPDATE produit_via_depot SET qty_produit = (qty_produit - 1) WHERE value_produit = '$Produit' AND (sous_label_2 = '$Localisation' OR sous_label_1 = '$Localisation')";
 
 if(mysqli_query($con, $Delete_qty)){
 
 // Message confirmation
$MSG = "Vous venez de valider votre panier !";
 
// Message echo
 echo $MSG ;
 
 }
 else{
 
  echo 'Erreur : Veuillez réessayer.';
 
 }
 mysqli_close($con);
?>