<?php

require_once 'include/db_functions.php';
$db = new db_functions();

$response = array ("error"=>False);

if (isset($_POST['email']) && isset ($_POST['password'])) {

    $email = $_POST['email'];
    $password =$_POST['password'];

    $user  = $db->getUserEnseignant ($email,$password);
    if ($user != false ) {
        $response ["error"] = FALSE ;
        $response ["role_id"]=2; 
        $response ["user_id"] = $user["id_unique"];
        $response["name"]=$user["name"];
        $response ["email"] = $user["email"];
         $response ['enseignantuser_id']=$user["enseignantuser_id"];
        $response ['profile_image'] = $user{"profile_image"};
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
