<?php
class Conexao {

	public $conn = null;
	public $dbType = "mysql";
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $db = "db_ped_arte";
	public $result = false;

	public function Conexao($result = false) {
		if ($result != false) {
			$this->result = true;
		}
	}

	public function getConnection() {

		try {
			$this->conexao = new PDO($this->dbType . ":host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			return $this->conexao;

		}catch (PDOException $e){
			 echo "Erro: " . $e->getMessage();
		}

	}
	public function Close() {
		if ($this -> conn != null)
			$this -> conn = null;
	}

}
?>