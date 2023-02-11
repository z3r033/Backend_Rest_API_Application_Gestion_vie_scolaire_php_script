<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $adminuser_id=(int) $_POST['adminuser_id'];  
     $email =  $_POST['email'];
     $pa = $_POST['password'];
     $password = MD5($pa);
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $admin_name = $first_name.$last_name;
     $role_id = 1;


   
   //requite pour ajouter un chef de filiere 
     $requite = "UPDATE adminusers SET admin_name='$admin_name',email='$email',password='$password',first_name='$first_name',last_name='$last_name' where adminuser_id='$adminuser_id'";
   
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
   if(mysqli_query($con,$requite)){
	   //si non
   echo " la modification est Bien Fait ";
   }else{  // si oui
       
       echo "il ne peux pas modifier essayer autre fois!";
   }
   // fermer la connection.
   mysqli_close($con);
}

?>
