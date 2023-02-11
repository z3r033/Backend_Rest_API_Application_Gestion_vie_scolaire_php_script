<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

$absence_date = $_POST['absence_date'];
$heur = $_POST['heur'];
$requite = "select * from absences where absence_date ='$absence_date' and
  heur = '$heur'  ;";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query($con,$requite) ;

if($res->num_rows ==0){
 array_push ($response,array(    "exist" => "0"));
}else{
     array_push ($response,array("exist"=>"1"));
}
     
     
     echo json_encode($response);
       
   mysqli_close($con);
// }
?>

