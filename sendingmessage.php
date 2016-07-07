<?php

include 'DB_connec.php';
$con = Connect();

if(isset($_POST['sender_name']) && isset($_POST['receiver_name']) && isset($_POST['message']))
{
$sender_name = $_POST['sender_name'];
$message = $_POST['message'];
$receiver_name = $_POST['receiver_name'];
//$x= (String)date(DATE_RFC2822);
$query = mysqli_query($con, "INSERT INTO chatdata (sender_name, message, receiver_name) VALUES ('$sender_name', '$message', '$receiver_name')");

$bool_query1 = mysqli_query($con, "UPDATE chatdata SET bool = '1' WHERE sender_name = ('$sender_name') ");

$bool_query2 = mysqli_query($con, "UPDATE chatdata SET bool = '0' WHERE sender_name = ('$receiver_name')");

$query_sender = mysqli_query($con, "SELECT * FROM chatdata WHERE (sender_name = '$sender_name' OR sender_name = '$receiver_name') AND (receiver_name = '$receiver_name' OR receiver_name = '$sender_name')" );

$response = array();

while($row = mysqli_fetch_array($query_sender)){
array_push($response,
array('message'=>$row[1],
'bool' => $row[4]
));
}

echo json_encode($response);
}
else
{
 $response["error"] = TRUE;
 $response["error_msg"] = "Unknown error occurred in registration!";
echo json_encode($response);
}
?>

