<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

    $etudiantuser_id = $_POST['etudiantuser_id'];
    $semestre_id = $_POST['semestre_id'];
    $module_id= $_POST['module_id'];
    $note= $_POST['note'];

 $requite = "insert into resultas (semestre_id, etudiantuser_id,module_id,notes) values ('$semestre_id','$etudiantuser_id','$module_id','$note')";

    $res2 = mysqli_query($con,$requite) or die mysqli_error($con);
        
        if($res2){
          
        echo "ajouter bien fait !! ";
    }else{
        echo "essayer une autre fois !! ";
    }
     
       
   mysqli_close($con);
?>

