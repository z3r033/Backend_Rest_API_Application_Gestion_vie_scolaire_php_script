<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $etudiantuser_id=(int) $_POST['etudiantuser_id'];  
    $email =  $_POST['email'];
    $id_unique = $_POST['id_unique'];
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $etudiant_name = $first_name.$last_name;
     $role_id = 3;
     $address  = $_POST['address'];
     $telephone = $_POST['telephone'];
     $annee_id = $_POST['annee_id'];
     $departement_id = $_POST['departement_id'];
     $semestre_id = $_POST['semestre_id'];


   
   //requite pour ajouter un chef de filiere 
     $requite = "UPDATE etudiantusers SET name='$etudiant_name',email='$email',first_name='$first_name',last_name='$last_name' , telephone = '$telephone',address = '$address',annee_id ='$annee_id',id_unique ='$id_unique' where etudiantuser_id='$etudiantuser_id'";
   
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query ($con,$requite)  or die(mysqli_error($con));
     if($res){
	   //si non
   echo " la modification est Bien Fait ";
   }else{  // si oui
       
       echo "il ne peux pas modifier essayer autre fois!";
   }
   // fermer la connection.
   mysqli_close($con);
}

?>
