<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $semestre_id = $_POST['semestre_id'];
    $departement_id = $_POST['departement_id'];
    $section = $_POST['section'];
 
    $requite = "select * from emploi  where semestre_id = '$semestre_id' 
and departement_id = '$departement_id' and section_id = '$section';";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query($con,$requite); 

     while ($row = mysqli_fetch_array($res)){
         array_push ($response,array(

             "title" => $row['title'],
             "imageurl" => $row ['imageurl'],
             "section_id"=>$row['section_id']
        
         ));
     
     }
     echo json_encode($response);
       
   mysqli_close($con);
}
?>

