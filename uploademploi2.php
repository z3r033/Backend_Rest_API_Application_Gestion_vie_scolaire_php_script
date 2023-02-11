<?php

class Constants
{
    //DATABASE DETAILS
    static $DB_SERVER="127.0.0.1";
    static $DB_NAME="gestionvie";
    static $USERNAME="root";
    static $PASSWORD="gestionviescolaire";


}

class Spirituality
{
    /*/
    /*
       1.CONNECT TO DATABASE.
       2. RETURN CONNECTION OBJECT
    */
    public function connect()
    {
        $con=new mysqli(Constants::$DB_SERVER,Constants::$USERNAME,Constants::$PASSWORD,Constants::$DB_NAME);
        if($con->connect_error)
        {
           // echo "Unable To Connect";
            return null;
        }else
        {
            return $con;
        }
    }
    public function insert()
    {
        // INSERT
        $con=$this->connect();
        if($con != null)
        {
            // Get image name
            $image_name = $_FILES['image']['name'];
            

            // image file directory
            $target = "pic/".basename($image_name);
        try
            {
                if(1)
                {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                       print(json_encode(array("message"=>"Success")));
                    }else{
                       print(json_encode(array("message"=>"Saved But Unable to Move Image to Appropriate Folder")));
                    }
                }else
                {
                    print(json_encode(array("message"=>"Unsuccessful. Connection was successful but data could not be Inserted.")));
                }
                $con->close();
            }catch (Exception $e)
            {
                print(json_encode(array("message"=>"ERROR PHP EXCEPTION : CAN'T SAVE TO MYSQL. ".$e->getMessage())));
                $con->close();
            }
        }else{
            print(json_encode(array("message"=>"ERROR PHP EXCEPTION : CAN'T CONNECT TO MYSQL. NULL CONNECTION.")));
        }
    }
        
        
    public function handleRequest() {
        if (isset($_POST['name'])) {
            $this->insert();
        }

$spirituality=new Spirituality();
$spirituality->handleRequest();
