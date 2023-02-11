<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

    $enseignantuser_id = $_POST['enseignantuser_id'];
    $module_id = $_POST['module_id'];
$requite = "insert into module_enseignant (enseignantuser_id , module_id ) values ('$enseignantuser_id','$module_id') ;";
        if(mysqli_query($con,$requite)){
          
        echo "ajouter bien fait !! ";
    }else{
        echo "essayer une autre fois !! ";
    }
     
       
   mysqli_close($con);
?>

