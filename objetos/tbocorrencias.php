<?php
class tbocorrencias{
 
    // database connection and table name
    private $conn;
	private $table = "tbocorrencias";
	private $tablevw = "vwocorrencias";
 
    // object properties
    public $codigo;
    public $data;
    public $hora;
    public $usuario;
    public $veiculo;
    public $linha;
    public $cooperado;
	public $funcionario;
    public $ocorrencia;
    public $local;	
	public $observacao;
	public $cadastro;
	
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	function read(){
 
    // select all query
    $query = "SELECT * FROM " .$this->tablevw;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// used when filling up the update product form
function readid(){
 
    // query to read single record
   
    $query = "SELECT  * FROM ".$this->tablevw." WHERE Codigo = ? ";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->Codigo = $row['Codigo'];
    $this->Data = $row['Data'];
    $this->Hora = $row['Hora'];
    $this->Usuario = $row['Usuario'];
    $this->Placa = $row['Placa'];
    $this->Linha = $row['Linha'];
    $this->Cooperado = $row['Cooperado'];
    $this->Funcionario = $row['Funcionario'];
    $this->Ocorrencia = $row['Ocorrencia'];
    $this->Local = $row['Local'];
    $this->Observacao = $row['Observacao'];
}

// create product
function create(){
  
    // query to insert record
    $query = 'INSERT INTO tbocorrencias(data, hora, usuario, veiculo, linha, cooperado, funcionario, ocorrencia, local, observacao,cadastro)
                               VALUES(:data, :hora, :usuario, :veiculo, :linha, :cooperado, :funcionario, :ocorrencia, :local, :observacao,:cadastro)';
  
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->data=htmlspecialchars(strip_tags($this->data));
    $this->hora=htmlspecialchars(strip_tags($this->hora));
    $this->usuario=htmlspecialchars(strip_tags($this->usuario));
    $this->veiculo=htmlspecialchars(strip_tags($this->veiculo));
    $this->linha=htmlspecialchars(strip_tags($this->linha));
    $this->cooperado=htmlspecialchars(strip_tags($this->cooperado));
    $this->funcionario=htmlspecialchars(strip_tags($this->funcionario));
    $this->ocorrencia=htmlspecialchars(strip_tags($this->ocorrencia));
    $this->local=htmlspecialchars(strip_tags($this->local));
    $this->observacao=htmlspecialchars(strip_tags($this->observacao));
  
    // bind values
    $stmt->bindParam(":data", $this->data);
    $stmt->bindParam(":hora", $this->hora);
    $stmt->bindParam(":usuario", $this->usuario);
    $stmt->bindParam(":veiculo", $this->veiculo);
    $stmt->bindParam(":linha", $this->linha);
    $stmt->bindParam(":cooperado", $this->cooperado);
    $stmt->bindParam(":funcionario", $this->funcionario);
    $stmt->bindParam(":ocorrencia", $this->ocorrencia);
    $stmt->bindParam(":local", $this->local);
    $stmt->bindParam(":observacao", $this->observacao);
    $stmt->bindParam(":cadastro", $this->cadastro);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}

// update the product
function update(){
 
    // update query
    $query = 'UPDATE tbocorrencias SET   data = :data,  hora = :hora,  usuario = :usuario, veiculo = :veiculo,
              linha = :linha, cooperado = :cooperado, funcionario = :funcionario,
              ocorrencia =:ocorrencia, local =:local, observacao =:observacao
              WHERE  id = :id';
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->data=htmlspecialchars(strip_tags($this->data));
	$this->hora=htmlspecialchars(strip_tags($this->hora));
    $this->usuario=htmlspecialchars(strip_tags($this->usuario));
    $this->veiculo=htmlspecialchars(strip_tags($this->veiculo));
    $this->linha=htmlspecialchars(strip_tags($this->linha));
    $this->cooperado=htmlspecialchars(strip_tags($this->cooperado));
    $this->funcionario=htmlspecialchars(strip_tags($this->funcionario));
    $this->ocorrencia=htmlspecialchars(strip_tags($this->ocorrencia));
	$this->local=htmlspecialchars(strip_tags($this->local));
    $this->observacao=htmlspecialchars(strip_tags($this->observacao));
    
 
    // bind values
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":data", $this->data);
    $stmt->bindParam(":hora", $this->hora);
    $stmt->bindParam(":usuario", $this->usuario);
    $stmt->bindParam(":veiculo", $this->veiculo);
    $stmt->bindParam(":linha", $this->linha);
	$stmt->bindParam(":cooperado", $this->cooperado);
	$stmt->bindParam(":funcionario", $this->funcionario);
	$stmt->bindParam(":ocorrencia", $this->ocorrencia);
	$stmt->bindParam(":local", $this->local);
    $stmt->bindParam(":observacao", $this->observacao);
    
	
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

function delete(){
 
    $query = 'DELETE FROM tbocorrencias WHERE id = ?';
    $stmt = $this->conn->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(1, $this->id);

    if($stmt->execute()){
        return true;
    }
 
    return false;
}






	
}

?>