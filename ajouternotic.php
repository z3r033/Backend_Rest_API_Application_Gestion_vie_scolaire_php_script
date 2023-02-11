<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();
if($_SERVER['REQUEST_METHOD']=='POST'){
     $notic_titre = $_POST['notic_titre'];
	 $notic_description =  $_POST['notic_description'];
	 $dept = $_POST['dept'];
 
   
   //requite pour supprumer
   $requite = "insert into noticification(notic_titre,notic_description,departement_id) VALUES ('$notic_titre','$notic_description','$dept')";
   
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
   if(mysqli_query($con,$requite)){
	   //si non
   echo " AJOUTER est Bien Fait ";
   }else{  // si oui
   echo " ne peux pas Ajouter essayer autre fois! ";
   }
   // fermer la connection.
   mysqli_close($con);
}
?>

