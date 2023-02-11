<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();
if($_SERVER['REQUEST_METHOD']=='POST'){

    $id_unique = $_POST['id_unique'];  
     $email =  $_POST['email'];
     $password_generer=randomPassword();
     $gender = $_POST['gender'];
     $password = MD5($password_generer);
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $telephone = $_POST['telephone'];
     $address = $_POST['address'];
     $join_date  =$_POST['join_date'];
     $enseignant_name = $first_name.$last_name;
     $role_id = 2;
 //    $module_id2 = $_POST['module_id'];
   //  $module_id = (int) $module_id2;

   
   //requite pour ajouter un chef de filiere 
   $requite = "INSERT INTO enseignantusers ( `id_unique`, `gender`, `name`, `email`, `passwordgenerer`, 
`password`, `role_id`, `first_name`, `last_name`, 
`telephone`, `address`, `join_date`) VALUES ('$id_unique','$gender','$enseignant_name','$email','$password_generer','$password',$role_id,'$first_name','$last_name',
'$telephone','$address','$join_date')";

     $res = mysqli_query($con,$requite) or die(mysqli_error($con));
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
   if($res){
	   //si non
   echo " AJOUTER est Bien Fait , mot de pass est ".$password_generer;
   }else{  // si oui
       
       echo "cet enseignant est deja exister";

   }
   // fermer la connection.
   mysqli_close($con);
}


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); 
}
?>

