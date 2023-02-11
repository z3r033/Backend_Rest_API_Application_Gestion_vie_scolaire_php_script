<?php
Define ('DB_USER','root');
Define ('DB_PASSWORD','gestionviescolaire');
Define ('DB_HOST','10.0.0.1');
Define ('DB_NAME','gestionvie');

try{
    $dbcon = new mysqli (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_set_charset($dbcon,'utf8');

}catch (Exception $e)
{
    print " the system is busy please try later":
}catch(Error $e) 
{
    print "the system is busy please try again later";
}
?>
