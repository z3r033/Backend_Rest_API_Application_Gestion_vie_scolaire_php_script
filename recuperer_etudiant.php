<?php

require_once('include/db_connect.php');
    $db = new db_connect();
    $con=$db->connect();

    $email = $_POST['email'];
    $password = randomPassword();
    $hashpassword = md5($password);
$to = "saad19551945@gmail.com";
$subject = 'cet message est ';
$message ='bonjour mon etudiant votre nouveau mot de pass est '.$password."
email c'est'.$email;
";
$headers = 'From : estm@umi.ac.ma';
$requite = "update etudiantusers set password = '$hashpassword' where email ='$email'";
 if(mail($to,$subject,$message,$headers)&& mysqli_query ($con,$requite)){
     echo "tous est vas bien : verifier ton mail electronique";
     
   }else{
      echo "not ok";
   }


 function randomPassword() {
     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $pass = array();
      $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
      for ($i = 0; $i < 8; $i++) {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
      }
      return implode($pass);
  }

  ?>


