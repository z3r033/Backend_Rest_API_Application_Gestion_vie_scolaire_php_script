<?php

require_once('include/db_connect.php');
    $db = new db_connect();
    $con=$db->connect();
$response = array();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = md5($password);


    $requite = "select * from etudiantusers where email = '$email' and password='$hashpassword' ";

    $resultas = mysqli_query ($con , $requite) ; 
 if($resultas->num_rows>0){
     array_push ($response,array(
         "exist"=>"1"
     ));
     
   }else{
       array_push ($response,array(
          "exist"=>"0" 
       ));
   }
    echo json_encode($response);
    mysqli_close($con);



  ?>


