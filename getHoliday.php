<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='holiday';
$query='select holiday.id as id, holiday.title as name, location.id as location, holiday.price as price from holiday join location on holiday.location=location.id';
$stmt=$pdo->prepare($query);
if($stmt->execute())
{
    $grades=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode(['holiday'=>$holiday]);

else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>
