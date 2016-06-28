<?php
require_once 'DB_Functions.php';
$db = new DB_Functions();
 

$response = array("error" => FALSE);
 
if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password =$_POST['password'];
 
   
    $user = $db->getuserdetails($email, $password);
 
    if ($user != false) {
    
        $response["error"] = FALSE;
    
        $response["user"]["name"] = $user["name"];
        $response["user"]["email"] = $user["email"];
        $response["user"]["contact_num"] = $user["contact_num"];
     
        echo json_encode($response);
    } else {
        
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);

    }
} 
else {
 
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>