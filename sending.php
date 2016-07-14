<?php

include 'DB_connec.php';
$con = Connect();

if(isset($_POST['sender_name']) && isset($_POST['receiver_name']) && isset($_POST['message']))
{
$sender_name = $_POST['sender_name'];
$message = $_POST['message'];
$receiver_name = $_POST['receiver_name'];

$query = mysqli_query($con, "INSERT INTO chatdata (sender_name, message, receiver_name, created_at) VALUES ('$sender_name', '$message', '$receiver_name', NOW())");
$response = array();

array_push($response,
array('message'=>$message,
'bool' => "1", 

));


echo json_encode($response);
}
else
{
 $response["error"] = TRUE;
 $response["error_msg"] = "Unknown error occurred in registration!";
echo json_encode($response);

}
?>