<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

// if($_SERVER['REQUEST_METHOD']=='POST'){
$user_id = $_POST['utilisateur_id'];
   $requite = "SELECT * FROM `modules` WHERE 1;";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query($con,$requite) ;

     while ($row = mysqli_fetch_array($res)){
         array_push ($response,array(

             "module_id" => $row ['module_id']."*salam",
             "module_name" => $row ['module_name'] ,
             "departement_id" => $row['departement_id']."salam",
             "semestre_id" => $row ['semestre_id']."salam"

         ));
     
     }
     echo json_encode($response);
       
   mysqli_close($con);
// }
?>

