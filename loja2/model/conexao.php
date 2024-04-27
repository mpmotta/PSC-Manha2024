<?php
	Abstract Class conexao{
		private $servidor = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $banco = 'market';
		protected $conn;
		
		public function __construct(){
			$this->conexao();
		}
			
		private function conexao(){
			$this->conn = new mysqli($this->servidor, 
			$this->user, $this->pass, $this->banco);
			
		}
	}
?>