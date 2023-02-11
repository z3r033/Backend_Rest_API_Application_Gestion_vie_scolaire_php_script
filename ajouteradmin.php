<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();
if($_SERVER['REQUEST_METHOD']=='POST'){
     
     $email =  $_POST['email'];
     $pa = $_POST['password'];
     $password = MD5($pa);
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $admin_name = $first_name.$last_name;
     $role_id = 1;


   
   //requite pour ajouter un chef de filiere 
   $requite = "insert into adminusers (admin_name,email,password,first_name,last_name,role_id) VALUES ('$admin_name','$email','$password','$first_name','$last_name',$role_id)";
   
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
   if(mysqli_query($con,$requite)){
	   //si non
   echo " AJOUTER est Bien Fait ";
   }else{  // si oui
       
       echo "cet administrateur est deja exister";
   }
   // fermer la connection.
   mysqli_close($con);
}

?>
