<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $enseignantuser_id = $_POST['enseignantuser_id'];
   $stmt= $con->prepare("select * from modules where module_id IN (select module_id  from module_enseignant where enseignantuser_id= ? )" );
          
          $stmt->bind_param("d",$enseignantuser_id);
        if($stmt->execute()){
              $modules=$stmt->get_result();
              $stmt->close();


        } 
  //  $requite = "select * from module_enseignant where enseignantuser_id = '$enseignantuser_id'";
    $requite ="select * from modules where module_id IN (select module_id  from module_enseignant where enseignantuser_id='$enseignantuser_id' );";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 

    $res = mysqli_query($con,$requite); 
 while ($row = $modules->fetch_assoc()){
           array_push ($response,array(
              "module_name" =>$row['module_name'],
              "module_id" => $row["module_id"],
              "departement_id" => $row['departement_id'],
                 "semestre_id" => $row ['semestre_id']
          ));
      

 }
           
     echo json_encode($response);
       
   mysqli_close($con);
}
?>

