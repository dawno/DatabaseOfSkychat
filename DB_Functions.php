<?php
//error_reporting(E_ERROR | E_PARSE);

class DB_Functions{

	
function storeusers($name,$email,$password,$contact_num){
	//$pass=md5($password);
	require_once 'DB_connec.php';
	
	$conns=Connect();
	$query = mysqli_query($conns,"INSERT INTO skychattable(name, email, password,contact_num) VALUES ('$name','$email','$password','$contact_num')");
        $query_reg = mysqli_query($conns, "SELECT * FROM skychattable WHERE contact_num = '$contact_num'");
        return mysqli_fetch_array($query_reg);
}




function getuserdetails($email,$password){
	require_once 'DB_connec.php';
	
	$conns=Connect();
$query=mysqli_query($conns,"SELECT * FROM skychattable WHERE email='$email'");
$count=mysqli_num_rows($query);
if($count>0){
	return mysqli_fetch_array($query);

}
else
return false;
}

function isuserexisted($email){
require_once 'DB_connec.php';
	
	$conns=Connect();
$query=mysqli_query($conns,"SELECT * FROM skychattable WHERE email='$email'");
$count=mysqli_num_rows($query);

if($count>0)
	return true;

else
	return false;
}


}
?>