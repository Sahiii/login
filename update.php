<?php
 require"init.php";
 $json = array();
 $Email = $_POST['Email'];
 $Longitude=$_POST['Longitude'];
 $Latitude=$_POST['Latitude'];
 $State=$_POST['State'];



   // $sql_query="INSERT INTO `information`(`Email`, `Password`, `Confirm_pass`, `Image`, `Phone`, `Address`, `Longitude`, `Latitude`, `type`,`State`,`created_date`) VALUES ('$Email','$Password','$Confirm_pass','$Image','$Phone','$Address','$Longitude','$Latitude','$type','$State',CURRENT_TIMESTAMP) ON DUPLICATE KEY UPDATE Longitude = '".$Longitude."', Latitude='".$Latitude."', State='".$State."';";
   $sql_query="UPDATE `information` SET `Longitude`='$Longitude',`Latitude`='$Latitude',`State`='$State',`created_date`=CURRENT_TIMESTAMP WHERE Email='".$Email."';";
   // upload directory
  // $upload_dir ='/Image/$Image.jpg';

  $result = mysqli_query($con,$sql_query);

if($result == 1){
 // file_put_contents($upload_dir,base64_decode($picture));
	$json['success'] = 1;
}
else{
	$json['success'] = 0;
}
   
$con->close();

print_r($json);
header('Content-Type: application/json');
echo json_encode($json);

?>


