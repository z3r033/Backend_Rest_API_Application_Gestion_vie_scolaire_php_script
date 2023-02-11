<?php
 require_once('include/db_connect.php');
    $db = new db_connect();
    $con=$db->connect();
   
 $targetfolder = "testupload/";
$fname = $_POST['filename'].".pdf";
$name = $_POST['name'];
$module_id = $_POST{'module_id'};
$pdfurl = "http://10.0.0.1/gestionvie/testupload/".$fname;
$enseignant_name = $_POST['enseignant_name'];
$enseignantuser_id = $_POST{'enseignantuser_id'};
$pdfurlicon = "";
$targetfolder = $targetfolder.$fname;


$requite = "insert into documents (name,module_id,pdfurl,pdfurlicon,enseignant_name,enseignantuser_id) values ('$name','$module_id','$pdfurl','$pdfurlicon','$enseignant_name','$enseignantuser_id');";
$result = mysqli_query ($con,$requite);
if ($result){
     if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
   {
 
 
          echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
        
 
 
   }
 
   else {
 
   echo "Problem uploading file";
 
   }

} else{
              echo "essayer une autre fois !! ";
          }

?>
