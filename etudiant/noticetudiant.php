<?php


require_once '../include/db_connect.php';
$db = new db_connect();
$conn=$db->connect();

$response = array ();


$sql = "SELECT `notic_id`, `notic_titre`, `notic_description`, `publish_date`, `parsing` FROM `noticification` WHERE 1 ;";
$res = mysqli_query ($conn,$sql);

while ($row=mysqli_fetch_array($res)){
    array_push($response,array(
        "notic_id" =>$row['notic_id'],
        "notic_titre" =>$row['notic_titre'],
        "notic_description" => $row ['notic_description'],
        "publish_date"=>$row['publish_date'],
        "parsing"=> $row['parsing']
    ));
}
echo json_encode($response);
mysqli_close($conn);

?>
