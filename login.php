<?php

require_once 'include/db_functions.php';
$db = new db_functions();

$response = array ("error"=>False);

if (isset($_POST['email']) && isset ($_POST['password'])) {

    $email = $_POST['email'];
    $password =$_POST['password'];

    $user  = $db->getUserAdmin ($email,$password);
    if ($user != false ) {
        $response ["error"] = FALSE ; 
        $response ["role_id"]=1;
        $response ["adminuser_id"] = $user["adminuser_id"];
        $response["name"]=$user["admin_name"];
        $response ["email"] = $user["email"];
        $response {"profile_image"}  = $user{"profile_image"};       
        
        echo json_encode ($response);

    }else {
        $response ["error"] = TRUE;
        $response ["error_msg"] = "login wrong , try again";
        echo json_encode ($response);
    }
} else {
    $response ["error"]= TRUE ;
    $response["error_msg"]="required !!! ";
    echo json_encode ($response);
        

}
?>
