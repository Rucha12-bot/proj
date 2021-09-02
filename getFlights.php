<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='flights';
$query=' select flights.id as id, flights.name as name, location.id as origin, location.id as dept,company.id as company from flights join location on flights.origin=location.id AND flights.dest=location.id  join company on  flights.company=company.id';
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $grades=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['flights'=>$flights]);

else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
