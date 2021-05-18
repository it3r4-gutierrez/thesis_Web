<!DOCTYPE html>
<html>
<body>

<?php
// Example 1
// $recievesms  = "From: 24 Type: 1 Location: Cagayan de Oro Latitude: 8.4870777 Longitude: 124.6114727 https://www.google.com/maps/search/8.4870777,124.6114727";
// $res = explode(" ", $recievesms);
// echo "resident_ID: ".$res[1]."<br>"; 
// echo "EtypeID: ".$res[3]."<br>"; 
// echo "City : ".$res[5]." ".$res[6]." ".$res[7]."<br>";
// echo "latitude: ".$res[9]."<br>";
// echo "longitude: ".$res[11]."<br>";
// echo "Gogle Map Link: ".$res[12]."<br>";
 const pizza  = "+CMT: "+63976002648921/04/1817:51:35+32"
From: 24
Type: 1
Location: Cagayan de Oro
Latitude: 8.4870777
Longitude: 124.6114727
https://www.google.com/maps/search/8.4870777,124.6114727";
$res = str_replace('"', "", $pizza);


$pieces = explode(" ", );
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2
echo $pieces[3]; // piece1
echo $pieces[4];
echo $pieces[5]; // piece1
echo $pieces[6];
echo $pieces[7]; // piece1
echo $pieces[8];
?>

</body>
</html>
