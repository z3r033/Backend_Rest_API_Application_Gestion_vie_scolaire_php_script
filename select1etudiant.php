<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $etudiantuser_id = $_POST['etudiantuser_id'];

 
   $requite = "select * from etudiantusers  where etudiantuser_id = '$etudiantuser_id'";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query($con,$requite); 

     while ($row = mysqli_fetch_array($res)){
         array_push ($response,array(

             "semestre_id" => $row['semestre_id'],
             "departement_id" => $row ['departement_id'],
            "section" => $row['section'], 
         ));
     
     }
     echo json_encode($response);
       
   mysqli_close($con);
}
?>

