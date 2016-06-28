<?php


function Connect()
{


$host = "localhost";

$username = "skychatuser";

$password = "skychatpassword";

$database = "skychatdatabase";

// Create connection

$conn = new mysqli($host,$username,$password,$database) or die("could not connect");
   
if($conn == TRUE)
echo "connected"; 

return $conn;


}


?>