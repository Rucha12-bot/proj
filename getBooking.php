<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='booking';
$query=' select booking.id as id, booking.name as name, booking_type.id as type, booking.data as data,hotel.id as refer from booking join booking_type on booking.type=booking_type.id join hotel on booking.booking_refer=hotel.id';
$query=' select booking.id as id, booking.name as name, booking_type.id as type, booking.data as data,holiday.id as refer from booking join booking_type on booking.type=booking_type.id join holiday on booking.booking_refer=holiday.id';
$query=' select booking.id as id, booking.name as name, booking_type.id as type, booking.data as data,flights.id as refer from booking join booking_type on booking.type=booking_type.id join flights on booking.booking_refer=flights.id';

$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $grades=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['booking'=>$booking]);

else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>


