<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

$etudiantuser_id = $_POST['etudiantuser_id'];
$requite = "select * from absences where etudiantuser_id = '$etudiantuser_id' ;";
$res = mysqli_query($con,$requite) ;

 while ($row = mysqli_fetch_array($res)){
     array_push ($response,array(   
         "absence_date" => $row['absence_date'],
         "status"=> $row['status'],
         "heur" =>  $row['heur'],
         "module_id" =>$row['module_id']
    ));
 
 }    
     echo json_encode($response);   


// }
?>

