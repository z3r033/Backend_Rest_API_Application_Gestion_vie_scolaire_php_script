<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    
   $stmt= $con->prepare("select * from resultas r,etudiantusers e where e.etudiantuser_id = r.etudiantuser_id" );
          
        
        if($stmt->execute()){
              $modules=$stmt->get_result();
              $stmt->close();


        } 
  
 while ($row = $modules->fetch_assoc()){
           array_push ($response,array(
              "name" =>$row['first_name']." ".$row['last_name'],
              "etudiantuser_id" => $row["etudiantuser_id"],
              "notes" => $row['notes'],
              "modules" => $row['module_id'],
              "semestre_id" =>$row['semestre_id'],
              "departement_id"=>$row['departement_id']
          ));
      

 }
           
     echo json_encode($response);
       
   mysqli_close($con);
}
?>

