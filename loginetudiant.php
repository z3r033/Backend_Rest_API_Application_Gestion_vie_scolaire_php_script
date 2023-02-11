<?php

require_once 'include/db_functions.php';
$db = new db_functions();

$response = array ("error"=>False);

if (isset($_POST['email']) && isset ($_POST['password'])) {

    $email = $_POST['email'];
    $password =$_POST['password'];

    $user  = $db->getUserEtudiant ($email,$password);
    if ($user != false ) {
        $response ["error"] = FALSE ; 
        $response ["role_id"]=3;
        $response ['etudiantuser_id']=$user["etudiantuser_id"];
        $response ['first_name'] = $user['first_name'];
         $response ['last_name'] = $user['last_name'];

        $response ["user_id"] = $user["id_unique"];
        $response["name"]=$user["name"];
        $response["email"] = $user["email"];
        $response["profile_image"] = $user{"profile_image"};
        $response["departement_id"]= $user["departement_id"];
        $response["semestre_id"] = $user["semestre_id"];  
        $response["section"] = $user["section"];      
        echo json_encode ($response);

    }else {
        $response ["error"] = TRUE;
        $response ["error_msg"] = "login incorrect , ressayer une autre fois ";
        echo json_encode ($response);
    }
} else {
    $response ["error"]= TRUE ;
    $response["error_msg"]="required !!! ";
    echo json_encode ($response);
        

}
?>
