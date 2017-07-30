<?php
 require"init.php";
 
 $Email=$_POST['Email'];
 $password1=$_POST['Password'];
 $Password=md5($password1);
 $sql = "select * from information where Email like '".$Email."' AND Password like '".$Password."';";
 
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result)>0) {
	$response=array();
 	$code="login_true";
 	$row=mysqli_fetch_array($result);
 	$name=$row[0];
 	$message="Login Success ";
 	array_push($response,array("code"=>$code,"message"=>$message));
 	header('Content-Type: application/json');
	echo json_encode(array("server_response"=>$response));
 } elseif (mysqli_num_rows($result)<1) {
	$response=array();
 	$code="login_false";
 	$row=mysqli_fetch_array($result);
 	$name=$row[0];
 	$message="Login Failed ";
 	array_push($response,array("code"=>$code,"message"=>$message));
 	header('Content-Type: application/json');
	echo json_encode(array("server_response"=>$response));
 }

mysqli_close($con);
?>

