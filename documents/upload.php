<?php
 
//importing dbDetails file
require_once 'config.php';
 
//this is our upload folder
$upload_path = 'uploads/';
 
//Getting the server ip
$server_ip = gethostbyname(gethostname());
 
//creating the upload url
$upload_url = 'http://'.$server_ip.'/gestionvie/documents/'.$upload_path;
 
//response array
$response = array();
 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
    //checking the required parameters from the request
    if(isset($_POST['name']) and isset($_FILES['pdf']['name'])and isset($_POST['enseignantuser_id'])){
 
        //connecting to the database
        $con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('Unable to Connect...');
 
        //getting name from the request
        $name = $_POST['name'];
        $enseignantuser_id=$_POST['enseignantuser_id'];
        //getting file info from the request
        $fileinfo = pathinfo($_FILES['pdf']['name']);
 
        //getting the file extension
        $extension = $fileinfo['extension'];
 
        //file url to store in the database
        $file_url = $upload_url . getFileName() . '.' . $extension;
 
        //file path to upload in the server
        $file_path = $upload_path . getFileName() . '.'. $extension;
 
        //trying to save the file in the directory
        try{
            //saving the file
            move_uploaded_file($_FILES['pdf']['tmp_name'],$file_path);
            $sql = "INSERT INTO `documents (document_id, pdfurl,name,enseignantuser_id) VALUES (NULL, '$file_url', '$name',$enseignantuser_id);";
 
            //adding the path and name to database
            if(mysqli_query($con,$sql)){
 
                //filling response array with values
                $response['error'] = false;
                $response['url'] = $file_url;
                $response['name'] = $name;
            }
            //if some error occurred
        }catch(Exception $e){
            $response['error']=true;
            $response['message']=$e->getMessage();
        } 
        //closing the connection
        mysqli_close($con);
    }else{
        $response['error']=true;
        $response['message']='Please choose a file';
    }
    
    //displaying the response
    echo json_encode($response);
}
 
/*
We are generating the file name
so this method will return a file name for the image to be upload
*/
function getFileName(){
    $con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('Unable to Connect...');
    $sql = "SELECT max(document_id) as document_id FROM documents";
    $result = mysqli_fetch_array(mysqli_query($con,$sql));
 
    mysqli_close($con);
    if($result['document_id']==null)
        return 1;
    else
        return ++$result['document_id'];
}
