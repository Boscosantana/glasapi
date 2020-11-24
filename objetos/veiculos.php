<?php
class veiculos{
 
    // database connection and table name
    private $conn;
    private $table_name = "veiculos";
 
    // object properties
    public $id;
    public $placa;
    public $DataSeguro;
    public $DataLicencaDER;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	function read(){
 
    // select all query
    $query = "SELECT id, placa, DataSeguro, DataLicencaDER FROM " .$this->table_name;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

	
}

?>