<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../../config/database.php';
include_once '../objetos/ocorrencias.php';
 
$database = new Database();
$db = $database->getConnection();
$registros = new ocorrencias($db);
$stmt = $registros->read();
$num = $stmt->rowCount();
 
if($num>0){
 
    $registros_arr=array();
    //$registros_arr["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $registros_item=array(
            "id" => $id,
            "descricao" => $descricao,
          
        );
 
        array_push($registros_arr, $registros_item);
    }
 
    http_response_code(200);
    echo json_encode($registros_arr);
}
else{
 
    http_response_code(404);
 
    echo json_encode(
        array("Messagem" => "Registros não localizados.")
    );
}
 ?>



