<?php 
    include 'conn.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
        if ($_POST['action'] == "register"){
        $sql = "INSERT INTO `tbl_UserInfo`(`LastName`, `FirstName`, `emailAddress`, `password`, `userLevel`)  VALUES ('".$_POST["LastName"]."','".$_POST["FirstName"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["userLevel"]."')";

            if (mysqli_query($connect, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($connect);
            }
         } else if ($_POST['action'] == "login") {
            $sql = "SELECT * FROM `tbl_UserInfo` JOIN tbl_resident ON tbl_UserInfo.userInfo_ID = tbl_resident.userInfo_ID WHERE `emailAddress` = '".$_POST['emailAddress']."' AND `password` = '".$_POST['password']."'";
            
            if ($result = mysqli_query($connect, $sql)) {
               if ($result->num_rows > 0) { // if greater than zero ang number of rows sa SQL result
                   while($row = mysqli_fetch_assoc($result)) {
                       $userdata = array(
                           "userInfo_ID" => $row['resident_ID'],
                           "FirstName" => $row['FirstName'],
                           "LastName" => $row['LastName'],
                           "emailAddress" => $row['emailAddress'],
                           "userLevel" => $row['userLevel']
                       );
//                       var_dump($row);
                       echo(json_encode($userdata)); // remember to json decode
            }
               } else { //i walay sulod
                    echo "0"; //print 0
                }
                
            } else {
               echo "Error: " . $sql . "" . mysqli_error($connect);
            }
        } else if ($_POST['action'] == "report") {
            $sql = "INSERT INTO `tbl_emergencyreport`(`longitude`, `latitude`, `resident_id`,`addressDesc`,`EtypeID`,`note`)  VALUES ('".$_POST["longitude"]."','".$_POST["latitude"]."','".$_POST["resident_ID"]."','".$_POST["addressDesc"]."','".$_POST["EtypeID"]."','".$_POST["note"]."')";

            if (mysqli_query($connect, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($connect);
            }
        }
        
            $connect->close();
        }
    
?>