<?php
class funcionarios{
 
    // database connection and table name
    private $conn;
    private $table_name = "funcionarios";
 
    // object properties
    public $codigo;
    public $nome;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	function read(){
 
			// select all query
			$query = "SELECT codigo, nome FROM " . $this->table_name;
		 
			// prepare query statement
			$stmt = $this->conn->prepare($query);
		 
			// execute query
			$stmt->execute();
 
    return $stmt;
}

	
}

?>