<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $enseignantuser_id = $_POST['enseignantuser_id'];
    $module_id = $_POST['module_id'];
    
   $stmt= $con->prepare("SELECT `document_id`, `name`, `module_id`, `pdfurl`, `pdfurlicon`, `enseignant_name`, `enseignantuser_id` FROM `documents` WHERE module_id = ? and enseignantuser_id = ?;" );
          
          $stmt->bind_param("dd",$module_id,$enseignantuser_id);
        if($stmt->execute()){
              $modules=$stmt->get_result();
              $stmt->close();


        } 
if (($modules->num_rows)>0){ 
 while ($row = $modules->fetch_assoc()){
     array_push ($response,array(
         "error"=>0,
         "document_id"=>$row['document_id'],
         "name"=>$row['name'],
         "module_id" => $row{'module_id'},
         "pdfurl"=> $row ['pdfurl'],
         "pdfurlicon" => $row['pdfurlicon'],
         "enseignant_name"=> $row['enseignant_name'],
         "enseignantuser_id"=> $row ['enseignantuser_id']
          ));
      

 }
} else

{
  array_push($response,array(
        "error"=>1,
         "eee"=>"kkdd"
 ));
}
           
     echo json_encode($response);
       
   mysqli_close($con);
}
?>

