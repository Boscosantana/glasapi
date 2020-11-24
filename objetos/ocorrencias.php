<?php
class ocorrencias{
 
    // database connection and table name
    private $conn;
    private $table_name = "ocorrencias";
 
    // object properties
    public $id;
    public $descricao;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	function read(){
 
			// select all query
			$query = "SELECT id, descricao FROM ". $this->table_name ;
		 
			// prepare query statement
			$stmt = $this->conn->prepare($query);
		 
			// execute query
			$stmt->execute();
 
    return $stmt;
}

	
}

?>