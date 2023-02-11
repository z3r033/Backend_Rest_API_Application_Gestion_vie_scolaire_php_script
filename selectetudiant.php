<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();
/*
 if($_SERVER['REQUEST_METHOD']=='POST'){
$departement_id = $_POST['departement_id'];
 */
   $requite = "select * from etudiantusers ;";
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
     $res = mysqli_query($con,$requite) ;

     while ($row = mysqli_fetch_array($res)){
         array_push ($response,array(

             "etudiantuser_id" => $row['etudiantuser_id'],
             "id_unique" => $row['id_unique'],
             "gender" => $row['gender'],
             "annee_id"=>$row['annee_id'],
             "departement_id"=>$row['departement_id'],
            "name" => $row['name'],
             "passwordgenerer"=> $row['passwordgenerer'],
             "address"=>$row['address'],
             "telephone"=>$row['telephone'],
             "email" => $row['email'],
         "first_name"=>$row['first_name'],
         "last_name"=>$row['last_name'],
         "role_id"=>$row['role_id'],
         "semestre_id"=>$row['semestre_id'],
         "parsing" =>$row['parsing'],
        "profile_image" =>$row["profile_image"]         

         ));
     
     }
     echo json_encode($response);
       
   mysqli_close($con);
// }
?>

