<?php
 
require_once 'DB_Functions.php';
$db = new DB_Functions();


 

$response = array("error" => FALSE);
 
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['contact_num']) )
 {

    $name = $_POST['name'];
    $email =$_POST['email'];
    $password = $_POST['password'];
    $contact_num = $_POST['contact_num'];
    
 
    
    if ($db->isuserexisted($email)) {
        $response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $email;
        echo json_encode($response);
    } else {

        $user = $db->storeusers($name, $email, $password, $contact_num);
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
             
            $response["user"]["name"] = $user["name"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["contact_num"] = $user["contact_num"];
         
            echo json_encode($response);
        } else {
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, email, password or contact_num) is missing!";
    echo json_encode($response);
}
?>