<?php


require_once 'include/db_connect.php';
$db = new db_connect();
$conn=$db->connect();

$response = array ();


$sql = "select * from etudiantusers;";
$res = mysqli_query ($conn,$sql);

while ($row=mysqli_fetch_array($res)){
    array_push($response,array(
        "role_id" =>$row['role_id'],
        "departement_id" =>$row['departement_id'],
        "email" => $row ['email']));
}
echo json_encode($response);
mysqli_close($conn);

?>
