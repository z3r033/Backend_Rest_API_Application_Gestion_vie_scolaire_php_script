<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $etudiantuser_id = $_POST['etudiantuser_id'];
    $semestre_id = $_POST['semestre_id'];
    $module_id= $_POST['module_id'];
    $note= $_POST['note'];
 
   $requite = "select * from resultas where semestre_id = '$semestre_id'and module_id ='$module_id' and  etudiantuser_id = '$etudiantuser_id'";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query($con,$requite); 

     while ($row = mysqli_fetch_array($res)){
         array_push ($response,array(

             "semestre_id" => $row['semestre_id'],
         "module_id"=> $row['module_id'],
         "note" => $row['note']
         ));
     
     }
     echo json_encode($response);
       
   mysqli_close($con);
}
?>

