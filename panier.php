<?php
 
// Importing DBConfig.php file.
include 'config.php';
 
// Connecting to MySQL Database.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 // Populate Student name from JSON $obj array and store into $S_Name.
 $S_Name = $obj['name_phone'];
 
 // Populate Student Class from JSON $obj array and store into $S_Class.
 $S_Value = $obj['value_produit'];

 
 // Creating SQL query and insert the record into MySQL database table.
 $Sql_Query = "insert into appli_panier (nom_phone,value_produit) values ('$S_Name','$S_Value')";
 
 
 if(mysqli_query($con,$Sql_Query)){
 
 // If the record inserted successfully then show the message.
$MSG = "Le produit à bien été ajouté au panier.";
 
// Echo the message.
 echo $MSG ;
 
 }
 else{
 
 echo 'Erreur : Veuillez réessayer.';
 
 }
 mysqli_close($con);
?>