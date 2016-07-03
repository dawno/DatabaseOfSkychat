<?php
include 'DB_connec.php';
$con = Connect();

$image_url = "http://www.skywalker.org.in/uploads/profileimage.jpg";
$status = "Hey, I am using skychat";

$sql = "select * from skychattable";

$res = mysqli_query($con,$sql);

$response = array();

while($row = mysqli_fetch_array($res)){
array_push($response,
array('title'=>$row[0],
'image'=>$image_url, 
'status'=>$status
));
}

echo json_encode($response);
?>