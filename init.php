<?php
$server_name="localhost";
$db_name="easy_petrol";
$mysql_username="root";
$mysql_pass="";

$con=mysqli_connect($server_name,$mysql_username,$mysql_pass,$db_name);
if (mysqli_connect_errno($con)){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	
}
?>
