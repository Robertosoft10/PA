<?php
session_start();
require_once '../App/conectionDb.php';

$useremail = $_POST['useremail'];
$sql = $connection->query("SELECT * FROM tb_users WHERE useremail='$useremail'");
$result = $sql->fetchAll();
$row = count($result);
if($row >= 1){
    $_SESSION['useExiste'] = "Este usuário já estar cadastrado na base de dados";
    header('location: ../View/view-usuario.php');

}else{
require_once '../App/user.Dao.php';
$objt = new User();
$objt->setUsername($_POST['username']);
$objt->setUseremail($_POST['useremail']);
$objt->setUsernivel($_POST['usernivel']);
$objt->setUserpassword(sha1($_POST['userpassword']));

$userDAO = new UserDAO();
$userDAO->userInsert($objt);


    $_SESSION['userSalvo'] = "Cadastro efetuado com sucesso!";
    header('location: ../View/view-usuario.php');
}
?>