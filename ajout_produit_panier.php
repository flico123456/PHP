<?php
 
// Importing DBConfig.php file.
include 'config.php';
 
sleep(15);

// Connecting to MySQL Database.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 $json = file_get_contents('php://input');
 
 $obj = json_decode($json,true);

// Date du panier
 $Produit = $obj['nom_produit'];

 $NomPhone = $obj['nom_phone'];

 $AjoutHistorique = "INSERT INTO historique_appli_panier (numerotation_panier, produit_panier) VALUES ((SELECT id FROM numerotation_panier WHERE nom_phone = '$NomPhone' ORDER BY id DESC LIMIT 1), '$Produit')";

 
 if(mysqli_query($con, $AjoutHistorique)){
 
 }
 else{
 
  echo 'Erreur : Veuillez réessayer.';
 
 }
 mysqli_close($con);
?>