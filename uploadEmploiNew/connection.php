<?php
 header ('Content-type: bitmap; charset=utf-8');
   if (isset($_POST{"encoded_string"})) {
       $encoded_string = $_POST["encoded_string"];
       $image_name = $_POST["image_name"];
       $decoded_string  = base64_decode ($encoded_string);   
        $path = 'images/'.$image_name;
       $file = fopen ($path,'wb');
        $emploi_id = $_POST['emploi_id'];
       $is_written = fwrite ($file ,$decoded_string);

       fclose ($file);

       if($is_written > 0 ){
           $connection = mysqli_connect ('10.0.0.1','root','gestionviescolaire','gestionvie');
           $query = "update emploi set imageurl = '$path' where emploi_id  = '$emploi_id'; ";
           $result = mysqli_query ($connection , $query);
           if ($result){
               echo "success";
           }else{
               echo "non success";
           }
           mysqli_close ($connection);
       }


   }

?>
