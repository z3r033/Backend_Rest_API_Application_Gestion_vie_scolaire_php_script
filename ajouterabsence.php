<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();
if($_SERVER['REQUEST_METHOD']=='POST'){

    $absence_date = $_POST['absence_date'];
    $heur = $_POST['heur'];
    $etudiantuser_id = $_POST['etudiantuser_id'];
    $module_id = $_POST['module_id'];
    $status =$_POST['status'];
   
    

$requite = "insert into absences (absence_date,heur,etudiantuser_id,module_id,status) values
 ('$absence_date','$heur','$etudiantuser_id','$module_id','$status')";
     $res = mysqli_query($con,$requite) or die(mysqli_error($con));
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
   if($res){
	   //si non
   echo " AJOUTER est Bien Fait ";
   }else{  // si oui
       
       echo "essayer une autre fois";

   }
   // fermer la connection.
   mysqli_close($con);
}

?>

