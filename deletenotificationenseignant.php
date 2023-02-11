<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

    $notic_id = $_POST['notic_id'];
    
    $requite = "DELETE FROM noticification_enseignant WHERE notic_id = '$notic_id';";
        if(mysqli_query($con,$requite)){
          
        echo "delete bien fait !! ";
    }else{
        echo "essayer une autre fois !! ";
    }
     
       
   mysqli_close($con);
?>

