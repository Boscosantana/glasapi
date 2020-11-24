<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../config/database.php';
include_once '../objetos/tbocorrencias.php';
 
$database = new Database();
$db = $database->getConnection();
$registros = new tbocorrencias($db);
$stmt = $registros->read();
$num = $stmt->rowCount();
 
if($num>0){
 
    $registros_arr=array();
    $registros_arr["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $registros_item=array(
            "Codigo" => $Codigo,
            "Data" => $Data,
			"Hora" => $Hora,
			"Usuario" => $Usuario,
			"Placa" => $Placa,
			"Linha" => $Linha,
			"Cooperado" => $Cooperado,
			"Funcionario" => $Funcionario,
			"Ocorrencia" => $Ocorrencia,
			"Local" => $Local,
			"Observacao" => $Observacao,
          
        );
 
        array_push($registros_arr["records"], $registros_item);
    }
 
    //http_response_code(200);
    echo json_encode($registros_arr);
}
else{
 
    //http_response_code(404);
 
    echo json_encode(
        array("Messagem" => "Registros não localizados.")
    );
}
 ?>



