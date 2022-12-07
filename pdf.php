<!DOCTYPE html>
<html>
<head>
<title>Rapport de vente Soraya Beach Resale</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #000000;
font-family: monospace;
font-size: 20px;
text-align: center;
justify-content: center;
align-items: center;
}
th {
background-color: #CFAD6E;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Nom du produit</th>
<th>Quantité</th>
</tr>
<?php
    include 'config.php';


    // Create connection
    $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
    
    $json = file_get_contents('php://input');
 
    $obj = json_decode($json,true);
    
    $ID = $obj['id_panier'];

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
     }

        $sql = "SELECT produit_panier FROM historique_appli_panier WHERE numerotation_panier='$ID'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            echo "<tr><td>" . $row["produit_panier"]. "</td><td>1</td><td>";
        }
            echo "</table>";
        } else {
    echo "0 results";
   } 
?>
</table>
</body>
</html>