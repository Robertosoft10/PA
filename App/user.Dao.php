<?php
require_once 'connectionDb.class.php';
require_once '../Model/class.user.php';

class userDao{
    public function __construct() {
		$conexao = new Conexao();
		$this->exec = $conexao->getConnection();
	}
    public function userInsert($user){

        $sql = "INSERT INTO tb_users(useId, username, useremail, usernivel, userpassword)VALUES(null, ?, ?, ?, ?)";
        try {
		$objt = $this->exec->prepare($sql);
		$objt->bindValue(1, $user->getUsername(), PDO::PARAM_STR);
		$objt->bindValue(2, $user->getUseremail(), PDO::PARAM_STR);
		$objt->bindValue(3, $user->getUsernivel(), PDO::PARAM_STR);
		$objt->bindValue(4, $user->getUserpassword(), PDO::PARAM_STR);

		$objt->execute();
			$this->exec = NULL;
		}catch(PDOException $e){
			echo "Erro: " . $e->getMessage();
		}
    }

    public function userList(){
        $sql = "SELECT * FROM tb_users";
		try {
			$objt = $this->exec->prepare($sql);
			$objt->execute();
            return $objt;
			$this->objt = NULL;
		}catch(PDOException $e) {
			echo "Erro: " .$e->getMessage();
		}
    }
    public function userBusc($useId) {
        $sql = "SELECT * FROM tb_users WHERE useId = ?";
        try {
            $objt = $this->exec->prepare($sql);
            $objt->bindValue(1, $useId, PDO::PARAM_STR);
            $objt->execute();
            return $objt;
            $this->exec = NULL;
        } catch (PDOException $e) {
            echo "Erro: " .$e->getMessage();
        }
    }
    public function userUpdate($user) {
        $sql = "UPDATE tb_users SET  username= ?, useremail= ?, usernivel= ?, userpassword= ? WHERE useId = ?";
        try {
            $objt = $this->exec->prepare($sql);
            $objt->bindValue(1, $user->getUsername(), PDO::PARAM_STR);
            $objt->bindValue(2, $user->getUseremail(), PDO::PARAM_STR);
            $objt->bindValue(3, $user->getUsernivel(), PDO::PARAM_STR);
            $objt->bindValue(4, $user->getUserpassword(), PDO::PARAM_STR);    
            $objt->bindValue(5, $user->getUseId(), PDO::PARAM_INT);
    
                $objt->execute();
                $this->exec = NULL;
            }catch(PDOException $e) {
                echo "Erro: " .$e->getMessage();
            }
        }
        public function userDelet($useId) {
            $sql = "DELETE FROM tb_users WHERE useId = ?";
                try {
                    $objt = $this->exec->prepare($sql);
                    $objt->bindValue(1, $useId, PDO::PARAM_INT);
                    $objt->execute();
                    $this->exec = NULL;
                }catch(PDOException $e) {
                    echo "Erro: " . $ex->getMessage();
                }
            }
}
?>