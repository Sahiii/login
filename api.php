<?php
require"init.php";
$data =array();
$Email=$_GET['Email'];

//$data=[];
$sql = "SELECT Email,State FROM information where Email='".$Email."';";
//$sql = "SELECT * FROM quiz_que";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      // $data["Quiz"][] = $row;
    	$data[]=$row;
    }

}
$con->close();
header('Content-Type: application/json');
echo json_encode($data);
?>

