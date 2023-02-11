<?php

 //verifier si la connection est passer avec la Base de donner 
 require_once('include/db_connect.php');
 $db = new db_connect();
 $con=$db->connect();

 $response = array();

 $image = $_POST['image'];
 $name = $_POST['name'];
 
 $upload_path = "imagess/$name.jpg"

 //    $res = mysqli_query($con,$requite) ;

$tt= file_put_contents($upload_path,base64_decode($image));
if($tt){
    echo "fichier est uploader";
}else{
    echo "fichier not uploader";
}
     
     

       
   mysqli_close($con);
// }
?>

