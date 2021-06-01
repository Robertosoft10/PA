<?php
session_start();
require_once '../App/user.Dao.php';

$objt = new User();
$objt->setUseId($_GET['param']);
$objt->setUsername($_POST['username']);
$objt->setUseremail($_POST['useremail']);
$objt->setUsernivel($_POST['usernivel']);
$objt->setUserpassword(sha1($_POST['userpassword']));

$userDAO = new UserDAO();
$userDAO->userUpdate($objt);
if($userDAO == true){

    $_SESSION['userAtializado'] = "Registro atualizado com sucesso!";
    header('location: ../View/view-usuario.php');
}else{
     $_SESSION['useAtializadoErro'] = "Falha na tualização do registro";
     header('location: ../View/view-usuario.php');
}
?>