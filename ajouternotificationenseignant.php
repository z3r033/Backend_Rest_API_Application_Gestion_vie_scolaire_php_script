<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

    $enseignantuser_id = $_POST['enseignantuser_id'];
 
 $notic_titre = $_POST['notic_titre'];
 $notic_description = $_POST['notic_description'];
     $departement_id = $_POST['departement_id'];
 $enseignant_name = $_POST['enseignant_name'];
 $module_id = $_POST['module_id'];
 $requite = "INSERT INTO noticification_enseignant ( notic_titre,notic_description,departement_id,module_id, enseignantuser_id, enseignant_name) 
     VALUES ('$notic_titre' , '$notic_description' , '$departement_id','$module_id','$enseignantuser_id','$enseignant_name');";
        if(mysqli_query($con,$requite)){
          
        echo "ajouter bien fait !! ";
    }else{
        echo "essayer une autre fois !! ";
    }
     
       
   mysqli_close($con);
?>

