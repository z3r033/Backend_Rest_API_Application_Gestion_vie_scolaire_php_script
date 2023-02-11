<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();
if($_SERVER['REQUEST_METHOD']=='POST'){

   $id_unique = $_POST['id_unique'];  
     $email =  $_POST['email'];
    # $gender = $_POST['gender'];
     
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $telephone = $_POST['telephone'];
     $address = $_POST['address'];
     $join_date  =$_POST['join_date'];
     $enseignant_name = $first_name.$last_name;
     $role_id = 2;
    // $module_id2 = $_POST['module_id'];
     //$module_id = (int) $module_id2;
$enseignantuser_id = $_POST['enseignantuser_id'];
   
   //requite pour ajouter un chef de filiere 
   $requite = "UPDATE enseignantusers set id_unique= '$id_unique', gender='$gender', name='$enseignant_name', email='$email', 
role_id='$role_id', first_name='$first_name', last_name='$last_name', 
telephone='$telephone',address='$address', join_date='$join_date' where enseignantuser_id='$enseignantuser_id';";

     $res = mysqli_query($con,$requite) or die(mysqli_error($con));
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
   if($res){
	   //si non
   echo " modification est Bien Fait ";
   }else{  // si oui
       
       echo "il ne peux pas modifier essayer autre fois!";

   }
   // fermer la connection.
   mysqli_close($con);
}



?>

