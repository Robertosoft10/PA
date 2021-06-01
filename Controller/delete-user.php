<?php
session_start();
require_once '../App/conectionDb.php';

$useId = $_GET['param'];
$userimage = $_FILES['userimage'];
$sql = $connection->query("SELECT * FROM tb_users WHERE useId='$useId'");
while($rows = $sql->fetch(PDO::FETCH_OBJ)){
	$arquivo_db = $rows->userimage;
}
unlink("../resources/fotos/$arquivo_db");
require_once '../App/user.Dao.php';
$userDAO = new UserDAO();

$userDAO->userDelet($useId);
if($userDAO == true){
$_SESSION['userDeletado'] = "Registro excluido com sucesso!";
header('location: ../View/view-usuario.php');
}else{
     $_SESSION['userErroDelete'] = "Falha ao excluir registro!";
     header('location: ../View/view-usuario.php');
}
?>