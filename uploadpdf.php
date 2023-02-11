<?php
 header ('Content-type: pdf; charset=utf-8');
if (isset($_POST{"encoded_string"})) {


       $encoded_string = $_POST["encoded_string"];
       $image_name = $_POST["image_name"];
       $name = $_POST['name'];
       $module_id = $_POST['module_id'];
        $pdfurl = $_POST['pdfurl'];
       $pdfurlicon = " null ";
       $enseignant_name = $_POST['enseignant_name'];
       $enseignantuser_id = $_POST['enseignantuser_id'];
       $decoded_string  = base64_decode ($encoded_string);   
        $path = 'images/'.$image_name;
       $file = fopen ($path,'wb');
       // $utilisateur_id = $_POST['utilisateur_id'];
       $is_written = fwrite ($file ,$decoded_string);

       fclose ($file);

       if($is_written > 0 ){
           $connection = mysqli_connect ('10.0.0.1','root','gestionviescolaire','gestionvie');
           $query = "insert into documents (name, module_id,pdfurl,pdfurlicon,enseignant_name,enseignantuser_id) values ($name,$module_id,$pdfurl,$pdfurlicon,$enseignant_name,$enseignantuser_id); ";
           $result = mysqli_query ($connection , $query);
           if ($result){
               echo "success";
           }else{
               echo "non success";
           }
           mysqli_close ($connection);
       }


   

?>
