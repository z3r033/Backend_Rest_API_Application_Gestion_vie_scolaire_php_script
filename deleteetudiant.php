<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();
if($_SERVER['REQUEST_METHOD']=='POST'){
     $etudiantuser_id =(int) $_POST['etudiantuser_id']; 
   
   //requite pour supprumer
   $requite = "delete from etudiantusers where etudiantuser_id = '$etudiantuser_id'";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
   if(mysqli_query($con,$requite)){
	   //si non
   echo " delete est Bien Fait ";
   }else{  // si oui
   echo "essayer autre fois! ";
   }
   // fermer la connection.
   mysqli_close($con);
}
?>

