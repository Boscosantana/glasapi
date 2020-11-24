<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../../config/database.php';
include_once '../objetos/veiculos.php';
 
$database = new Database();
$db = $database->getConnection();
$veiculo = new veiculos($db);
$stmt = $veiculo->read();
$num = $stmt->rowCount();
 
if($num>0){
 
    $veiculos_arr=array();
    $veiculos_arr["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $veiculo_item=array(
            "id" => $id,
            "placa" => $placa,
            "DataSeguro" => $DataSeguro,
            "DataLicencaDER" => $DataLicencaDER
        );
 
        array_push($veiculos_arr["records"], $veiculo_item);
    }
 
    http_response_code(200);
    echo json_encode($veiculos_arr);
}
else{
 
    http_response_code(404);
 
    echo json_encode(
        array("message" => "No products found.")
    );
}
 ?>



