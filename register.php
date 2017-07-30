<?php
 require"init.php";
 $json = array();
 $type=$_POST['type'];
 $Email = $_POST['Email'];
 $password1=$_POST['Password'];
 $Password=md5($password1);
 $confirm_password1=$_POST['Confirm_pass'];
 $Confirm_pass=md5($confirm_password1);
 $created_date= $_POST['created_date'];
 $Phone=$_POST['Phone'];
 $Address=$_POST['Address'];
 $Longitude=$_POST['Longitude'];
 $Latitude=$_POST['Latitude'];
 $State=$_POST['State'];

  echo $imgFile = $_FILES['Image']['name'];
  $tmp_dir = $_FILES['Image']['tmp_name'];

 //   // upload directory
    $upload_dir = dirname(__FILE__).'/Image/';
  

      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

 //   // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
 //   // rename uploading image
     $Image = rand(1000,1000000).".".$imgExt;

  
 //   // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){   
         {
     move_uploaded_file($tmp_dir,$upload_dir.$Image);
     
     }
   
   }

   $sql_query="INSERT INTO `information`(`Email`, `Password`, `Confirm_pass`, `Image`, `Phone`, `Address`, `Longitude`, `Latitude`, `type`,`State`,`created_date`) VALUES ('$Email','$Password','$Confirm_pass','$Image','$Phone','$Address','$Longitude','$Latitude','$type','$State',CURRENT_TIMESTAMP) ON DUPLICATE KEY UPDATE Longitude = '".$Longitude."', Latitude='".$Latitude."', State='".$State."';";
   // upload directory
  // $upload_dir ='/Image/$Image.jpg';

  $result = mysqli_query($con,$sql_query);

if($result == 1){
 // file_put_contents($upload_dir,base64_decode($picture));
	$json['success'] = 1;
   $json['image_extension'] = $imgExt;
   $json['flname'] = $imgFile;
}
else{
	$json['success'] = 0;
}
   
$con->close();

print_r($json);
header('Content-Type: application/json');
echo json_encode($json);

?>


