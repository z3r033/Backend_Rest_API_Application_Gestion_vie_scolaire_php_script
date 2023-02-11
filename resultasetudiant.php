<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
     $etudiantuser_id = $_POST['etudiantuser_id'];
 
   $requite = "select m.module_id as module_id, m.module_name as module_name ,r.notes as note ,r.semestre_id as semestre_id,s.semestre_name as semestre_name from modules m , resultas r ,semestre s where m.module_id= r.module_id and r.etudiantuser_id='$etudiantuser_id' and s.semestre_id = r.semestre_id;";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query($con,$requite); 

     while ($row = mysqli_fetch_array($res)){
         array_push ($response,array(
            "module_id" =>$row['module_id'],
             "module_name" => $row['module_name'],
         "note"=> $row['note'],
         "semestre_name" => $row['semestre_name']
         ));
     
     }
     echo json_encode($response);
       
   mysqli_close($con);
}
?>

