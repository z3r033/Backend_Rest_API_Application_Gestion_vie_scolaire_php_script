<?php 
class db_connect {

    private $conn ; 

    //connecting to database
    public function connect()
    {
        require_once 'include/config.php';
        $this->dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        return $this->dbcon;
    }
}
?>
