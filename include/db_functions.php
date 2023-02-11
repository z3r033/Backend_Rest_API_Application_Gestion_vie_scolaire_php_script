<?php 

class db_functions {

    private $dbcon ; 

    //constructor 
    function __construct (){
        require_once 'db_connect.php';

        $db= new db_connect ();
        $this->dbcon = $db->connect();
    }

    function __destruct(){
        
    }
   /*
    * return username and password from db 
    */ 
    public function getUserAdmin($username,$password){
        $stmt= $this->dbcon->prepare("SELECT * FROM adminusers where email = ?
            and password = ? and role_id=1");
        $ps = MD5("$password");
        $stmt->bind_param("ss",$username,$ps);
        if($stmt->execute()){
            $user=$stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;

        }else {
            return false;
        }
    } 
    public function getUserEnseignant($username,$password){
        $stmt= $this->dbcon->prepare("SELECT * FROM enseignantusers where email = ?
            and password = ? and role_id=2");
        $ps = MD5("$password");
        $stmt->bind_param("ss",$username,$ps);
        if($stmt->execute()){
            $user=$stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;

        }else {
            return false;
        }
    } 
   public function getUserEtudiant($username,$password){
        $stmt= $this->dbcon->prepare("SELECT * FROM etudiantusers where email = ?
            and password = ? and role_id=3");
        $ps = MD5("$password");
        $stmt->bind_param("ss",$username,$ps);
        if($stmt->execute()){
            $user=$stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;

        }else {
            return false;
        }
    } 

/*
 * functions resultas * / 
 */
   public function getAllEtudiant(){
          $stmt= $this->dbcon->prepare("SELECT * FROM etudiantusers;");
          $h= array();

          if($stmt->execute()){
              
              $user=$stmt->get_result()->fetch_assoc();
              $stmt->close();
              return $user;

  
          }else {
              return false;
          }
      }
 
 
  
}
?>
