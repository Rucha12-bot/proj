<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='booking_type';
$query='select booking.type as id, booking_type.name as name from booking_type join booking on booking_type.id= booking.type';
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $grades=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['booking_type'=>$booking_type]);

else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
 