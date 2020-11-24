<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objetos/tbocorrencias.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

$ocorrencia = new tbocorrencias($db);
$data = json_decode(file_get_contents("php://input"));
$ocorrencia->id = $data->id;
$ocorrencia->data = $data->data;
$ocorrencia->hora = $data->hora;
$ocorrencia->usuario = $data->usuario;
$ocorrencia->veiculo = $data->veiculo;
$ocorrencia->linha = $data->linha;
$ocorrencia->cooperado = $data->cooperado;
$ocorrencia->funcionario = $data->funcionario;
$ocorrencia->ocorrencia = $data->ocorrencia;
$ocorrencia->local = $data->local;
$ocorrencia->observacao = $data->observacao;
 
if($ocorrencia->update()){
 
    // set response code - 200 ok
    //http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Registro atualizado."));
}
else{
 
    //http_response_code(503);
    echo json_encode(array("message" => "Erro na atualização do registro."));
}
?>