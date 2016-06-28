<?php
 
// Path to move uploaded files
$target_path = "uploads/";
 
// array for final json respone
$response = array();
 
 
$file_upload_url = 'http://www.skywalker.org.in' . '/' . $target_path;
 
if (isset($_FILES['image']['name'])) {

    $name= $_POST['name'];
    $actualimagename = basename($_FILES['image']['name']);
    
    
    if (strpos($actualimagename, '.jpg') !== false) {
    $extnsn = ".jpg";
    unlink($target_path . $name . '.png');
    }
    
    else{
    $extnsn = ".png";
    unlink($target_path . $name . '.jpg');
    }
     
    
    $target_path = $target_path . $name . $extnsn;
    
   
    
    echo $name . $extnsn;
    
    
    $response['file_name'] = $name. $extnsn ; 
  
  

    try {
        // Throws exception incase file is not being moved
        
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            // make error flag true
            $response['error'] = true;
            $response['message'] = 'Could not move the file!';
        }
 
        // File successfully uploaded
        $response['message'] = 'File uploaded successfully!';
        $response['error'] = false;
        $response['file_path'] = $file_upload_url . $name . $extnsn;
    } catch (Exception $e) {
        // Exception occurred. Make error flag true
        $response['error'] = true;
        $response['message'] = $e->getMessage();
    }
} else {
    // File parameter is missing
    $response['error'] = true;
    $response['message'] = 'Not received any file!F';
}
 
// Echo final json response to client
echo json_encode($response);
?>