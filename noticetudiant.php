<?php


require_once 'include/db_connect.php';
$db = new db_connect();
$con=$db->connect();

$response = array ();

 
     $stmt= $con->prepare("select * from noticification ;" );
          if($stmt->execute()){
 $modules=$stmt->get_result();
      $stmt->close();
  
  
          }

   while ($row = $modules->fetch_assoc()){
            array_push ($response,array(
                "notic_id" =>$row['notic_id'],
          "notic_titre" =>$row['notic_titre'],
          "notic_description" => $row ['notic_description'],
          "publish_date"=>$row['publish_date'],
          "departement_id"=>$row['departement_id'],
          "parsing"=> $row['parsing']
            ));
  
  
   }
  
       echo json_encode($response);
  
     mysqli_close($con);
?>
