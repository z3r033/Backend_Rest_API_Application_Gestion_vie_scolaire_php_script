<?php

require_once('include/db_connect.php');
    $db = new db_connect();
    $con=$db->connect();
    $recpassword = $_POST['recpassword'];
    $hashrecpassword = MD5($recpassword);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = md5($password);

$requite = "update adminusers set password = '$hashpassword' where email ='$email' and password = '$hashrecpassword'";
 if(mysqli_query ($con,$requite)) {
echo "mot de pass bien change" ; }
 else{
 echo "le mot de pass recent encorrect ! ";
   }


  ?>


