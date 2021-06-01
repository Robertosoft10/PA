<?php
session_start();
require_once '../App/user.Dao.php';

$objt = new User();
$objt->setUseId($_GET['param']);
$objt->setUserpassword(sha1($_POST['userpassword']));

$userDAO = new UserDAO();
$userDAO->userUpdate($objt);
if($userDAO == true){

    $_SESSION['novasenha'] = "Nova senha cadastrada com sucesso!";
    header('location: /../pa/index.php');
}else{
     $_SESSION['novasenhaErro'] = "Falha na tualização da nova enha";
     header('location: /../pa/index.php');
}
?>