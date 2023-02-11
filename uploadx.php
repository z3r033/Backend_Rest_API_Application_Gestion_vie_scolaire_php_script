<?php 
$target_dir = "uploadx_x/";
$target_file_name = $target_dir . basename($_FILES['file']['name']);
$response =  array();

if (isset($_FILES['file']))
{
    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file_name))
    {
    $success = true;
    $message ="upload est success !! ";
    
}else
{
    $success = false;
    $message = 'error in uploading this image';
}
}else
{
    $success = false; 
    $message = "required  image";

}
$response["success"] = $success;
$response["message"] = $message;
echo json_encode ($response);

?>
