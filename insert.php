<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
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
$Image=$_POST['Image'];

        require_once('init.php');

        $sql ="SELECT Id FROM information ORDER BY id ASC";

        $res = mysqli_query($con,$sql);

         $id = uniqid();

        while($row = mysqli_fetch_array($res)){
                $id = $row['Id'];
        }

        $path = 'Image/'.uniqid().".png";
              //  $path1 = "uploads/".uniqid().".png";

        $actualpath  = "$path";
 

        $sql_query="INSERT INTO `information`(`Email`, `Password`, `Confirm_pass`, `Image`, `Phone`, `Address`, `Longitude`, `Latitude`, `type`,`created_date`) VALUES ('$Email','$Password','$Confirm_pass','$actualpath','$Phone','$Address','$Longitude','$Latitude','$type',CURRENT_TIMESTAMP);";

        if(mysqli_query($con,$sql_query)){
            file_put_contents($path,base64_decode($Image));
                    
            echo "Successfully Uploaded";
        }

        mysqli_close($con);
    }else{
        echo "Error";
    }
?>
