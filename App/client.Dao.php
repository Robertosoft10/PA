<?php
require_once 'connectionDb.class.php';
require_once '../Model/class.client.php';

class clientDao{
    public function __construct() {
		$conexao = new Conexao();
		$this->exec = $conexao->getConnection();
	}
    public function clientInsert($client){
        $sql = "INSERT INTO tb_clients(clientId, clientname, clientfone, clientlocal, clientemail)VALUES(null, ?, ?, ?, ?)";
        try {
		$objt = $this->exec->prepare($sql);
		$objt->bindValue(1, $client->getClientname(), PDO::PARAM_STR);
		$objt->bindValue(2, $client->getClientfone(), PDO::PARAM_STR);
		$objt->bindValue(3, $client->getClientlocal(), PDO::PARAM_STR);
		$objt->bindValue(4, $client->getClientemail(), PDO::PARAM_STR);

		$objt->execute();
			$this->exec = NULL;
		}catch(PDOException $e){
			echo "Erro: " . $e->getMessage();
		}
    }
    public function clientList(){
        $sql = "SELECT * FROM tb_clients";
		try {
			$objt = $this->exec->prepare($sql);
			$objt->execute();
            return $objt;
			$this->objt = NULL;
		}catch(PDOException $e) {
			echo "Erro: " .$e->getMessage();
		}
    }
    public function clientBusc($clientId) {
        $sql = "SELECT * FROM tb_clients WHERE clientId = ?";
        try {
            $objt = $this->exec->prepare($sql);
            $objt->bindValue(1, $clientId, PDO::PARAM_STR);
            $objt->execute();
            return $objt;
            $this->exec = NULL;
        } catch (PDOException $e) {
            echo "Erro: " .$e->getMessage();
        }
    }
    public function clientUpdate($client) {
        $sql = "UPDATE tb_clients SET  clientname= ?, clientfone= ?, clientlocal= ?, clientemail=? WHERE clientId = ?";
        try {
            $objt = $this->exec->prepare($sql);
            $objt->bindValue(1, $client->getClientname(), PDO::PARAM_STR);
            $objt->bindValue(2, $client->getClientfone(), PDO::PARAM_STR);
            $objt->bindValue(3, $client->getClientlocal(), PDO::PARAM_STR);
            $objt->bindValue(4, $client->getClientemail(), PDO::PARAM_STR);
            $objt->bindValue(5, $client->getClientId(), PDO::PARAM_INT);
    
                $objt->execute();
                $this->exec = NULL;
            }catch(PDOException $e) {
                echo "Erro: " .$e->getMessage();
            }
        }
        public function clientDelet($clientId) {
            $sql = "DELETE FROM tb_clients WHERE clientId = ?";
                try {
                    $objt = $this->exec->prepare($sql);
                    $objt->bindValue(1, $clientId, PDO::PARAM_INT);
                    $objt->execute();
                    $this->exec = NULL;
                }catch(PDOException $e) {
                    echo "Erro: " . $ex->getMessage();
                }
            }
}
?>