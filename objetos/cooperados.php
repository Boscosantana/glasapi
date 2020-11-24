<?php
class cooperados{
 
    // database connection and table name
    private $conn;
    private $table_name = "cooperados";
 
    // object properties
    public $id;
    public $codglas;
    public $cooperado;
   
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	function read(){
 
			// select all query
			$query = "SELECT id, codglas, cooperado FROM ". $this->table_name ;
		 
			// prepare query statement
			$stmt = $this->conn->prepare($query);
		 
			// execute query
			$stmt->execute();
 
    return $stmt;
}

function create(){
  
    // query to insert record
    $query = 'INSERT INTO cooperado(codglas,cooperado) VALUES(:codglas, :cooperado)';
     // prepare query
    $stmt = $this->conn->prepare($query);
      // sanitize
    $this->codglas=htmlspecialchars(strip_tags($this->codglas));
    $this->cooperado=htmlspecialchars(strip_tags($this->cooperado));
    // bind values
    $stmt->bindParam(":codglas", $this->codglas);
    $stmt->bindParam(":cooperado", $this->cooperado);
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}





	
}

?>