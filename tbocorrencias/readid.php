<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objetos/tbocorrencias.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$ocorrencia = new  tbocorrencias($db);
 
// set ID property of record to read
$ocorrencia->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of product to be edited
$ocorrencia->readid();
 
if($ocorrencia->Codigo!=null){
    // create array
    $ocorrencia_arr = array(
        "Codigo" =>  $ocorrencia->Codigo,
        "Data" => $ocorrencia->Data,
        "Hora" => $ocorrencia->Hora,
        "Usuario" => $ocorrencia->Usuario,
        "Placa" => $ocorrencia->Placa,
        "Linha" => $ocorrencia->Linha,
        "Cooperado" => $ocorrencia->Cooperado,
        "Funcionario" => $ocorrencia->Funcionario,
        "Ocorrencia" => $ocorrencia->Ocorrencia,
        "Local" => $ocorrencia->Local,
        "Observacao" => $ocorrencia->Observacao
        
    );
 
    // set response code - 200 OK
    //http_response_code(200);
 
    // make it json format
    echo json_encode($ocorrencia_arr);
}
 
else{
    // set response code - 404 Not found
   // http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "Ocorrencia nao encontrada"));
}
?>