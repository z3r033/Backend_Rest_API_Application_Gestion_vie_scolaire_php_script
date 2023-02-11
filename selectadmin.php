<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

   $requite = "select * from adminusers";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query($con,$requite); 

     while ($row = mysqli_fetch_array($res)){
         array_push ($response,array(

         "adminuser_id" => $row['adminuser_id'],
         "admin_name"=> $row['admin_name'],
         "email" => $row['email'],
         "first_name"=>$row['first_name'],
         "last_name"=>$row['last_name'],
         "role_id"=>$row['role_id'],
         "parsing"=>$row['parsing']

         ));
     
     }
     echo json_encode($response);
       
   mysqli_close($con);

?>

