<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $enseignantuser_id = $_POST['enseignantuser_id'];
    $module_id = $_POST['module_id'];
    
   $stmt= $con->prepare("SELECT `notic_id`, `notic_titre`, `notic_description`, `publish_date`, `departement_id`, `module_id`, `enseignantuser_id`, `enseignant_name` FROM `noticification_enseignant` WHERE `enseignantuser_id`=? and `module_id` =?;" );
          
          $stmt->bind_param("dd",$enseignantuser_id,$module_id);
        if($stmt->execute()){
              $modules=$stmt->get_result();
              $stmt->close();


        } 
  
 while ($row = $modules->fetch_assoc()){
           array_push ($response,array(
              "notic_id" =>$row['notic_id'],
              "notic_titre" => $row["notic_titre"],
              "notic_description" => $row['notic_description'],
              "publish_date" => $row ['publish_date'],

              "departement_id" => $row ['departement_id'],
              "module_id" => $row{'module_id'},
              "enseignantuser_id" => $row['enseignantuser_id'],
              "enseignant_name" => $row['enseignant_name']
          ));
      

 }
           
     echo json_encode($response);
       
   mysqli_close($con);
}
?>

