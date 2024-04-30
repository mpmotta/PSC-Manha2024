<?php
	require_once('conexao.php');
    Class Cliente extends conexao{
        private $id;
        private $nome;
        private $nascimento;
        private $salario;
        private $codCidade;

        private $tabela = 'cliente';

	//construtor
    public function __construct(){
        parent::__construct();	
    }

    
    //getter e setter
    public function getId() {
        return $this->id;
    }
    
    public function setId( $id){
        $this->id = $id;
    }

	public function getNome() {
        return $this->nome;
    }

	public function setNome( $nome) {
        $this->nome = $nome;
    }

    public function getNascimento(){
		return $this->nascimento;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	public function getSalario(){
		return $this->salario;
	}

	public function setSalario($salario){
		$this->salario = $salario;
	}

	public function getCodCidade(){
		return $this->codCidade;
	}

	public function setCodCidade($codCidade){
		$this->codCidade = $codCidade;
	}

			
       

    //consulta no banco
    public function consulta(){
        $sql = "SELECT id,nome,nascimento,salario,codCidade 
        FROM $this->tabela";
        $result = $this->conn->query($sql) 
        or die("Falha na consulta");
        
        if($result == true){
            return $result;
        }else{
            die("Falha na consulta!");
        }
        $this->conn->close();
    }

    public function consultaID($id){
        $nome='';$nascimento='';$salario='';$codCidade='';
        $sql = "SELECT nome,nascimento,salario,codCidade
        FROM $this->tabela WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();

        if($stmt == true){
            $stmt->store_result();
            $stmt->bind_result($nome,$nascimento,$salario,$codCidade);
            $stmt->fetch();
            $this->setNome($nome); 
            $this->setNascimento($nascimento); 
            $this->setSalario($salario); 
            $this->setCodCidade($codCidade); 
        }else{
            die("Falha na consulta!");
        }
        $stmt->close();
        $this->conn->close();
        
    }
    

    public function inserir($nome, $nascimento, $salario, $codCidade){
        $sql = "INSERT INTO $this->tabela(nome,nascimento,salario,codCidade) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssdi',$nome,$nascimento,$salario,$codCidade);
        $stmt->execute();
        
        if($stmt == true){
            header( "Location: ../view/Clientes.php?nome=$nome");
        }else{
            die("Falha no cadastro!");
        }
        $stmt->close();
        $this->conn->close();
    }


    public function editar($nome,$nascimento,$salario,$codCidade, $id){
        $sql = "UPDATE $this->tabela SET nome = ?, nascimento = ?, salario = ?, codCidade = ? WHERE id = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssdii',$nome,$nascimento,$salario,$codCidade,$id);
        $stmt->execute();
        
        if($stmt == true){
            header( "Location: ../view/Clientes.php?novoNome=$nome");
        }else{
            die("Falha ao Atualizar!");
        }
        $stmt->close();
        $this->conn->close();  
    }


   
    
    public function apagar($id){
        
        $sql = "DELETE FROM $this->tabela WHERE id = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        
        if($stmt == true){
            header( "Location: ../view/Clientes.php?excluido");
        }else{
            die("Falha ao excluir!");
        }
        $stmt->close();
        $this->conn->close();


        
    }


    
}

?>