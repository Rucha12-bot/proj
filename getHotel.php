<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='hotel';
$query='select hotel.id as id, hotel.name as name, location.id as location, hotel.price as price from '.$table.' join location on hotel.location=location.id';
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $grades=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['hotel'=>$hotel]);

else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
         