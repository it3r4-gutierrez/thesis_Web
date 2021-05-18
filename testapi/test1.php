<?php
class dht11{
 public $link='';
 function __construct($from,$type,$lat,$long){
  $this->connect();

  $this->storeInDB($from,$type,$lat,$long);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'tabangdb') or die('Cannot select the DB');

 }
 
 function storeInDB($from,$type,$lat,$long){
   
//$res = explode(" ", $data);
// echo "resident_ID: ".$res[4]."<br>"; 
// echo "EtypeID: ".$res[6]."<br>"; 
// echo "City : ".$res[8]." ".$res[9]." ".$res[10]."<br>";
// echo "latitude: ".$res[12]."<br>";
// echo "longitude: ".$res[14]."<br>";
// echo "Google Map Link: ".$res[15]."<br>";


  $query = "INSERT INTO tbl_emergencyreport (resident_ID, EtypeID, latitude, longitude)
 VALUES ('.$from.', '.$type.', '.$lat.', '.$long.')";
//$query = "INSERT INTO tbl_emergencyreport(`resident_ID`,`latitude`, `EtypeID`) VALUES (24,'test',1)";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
	echo $result;
 }
 
}
if($_GET['from'] != ''){
 $dht11=new dht11($_GET['from'],$_GET['type'],$_GET['lat'],$_GET['long']);
}
?>