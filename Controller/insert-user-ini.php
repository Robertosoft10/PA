<?php
session_start();
require_once '../App/conectionDb.php';

$username = 'Admin';
$useremail = 'admin@sistemapedido.com.br';
$usernivel = '1';
$userpassword = sha1('admin');
$sql = "INSERT INTO tb_users(username, useremail, usernivel, userpassword)VALUES(:username, :useremail, :usernivel, :userpassword)";
$insert = $connection->prepare($sql);
$insert->bindParam(':username', $username);
$insert->bindParam(':useremail', $useremail);
$insert->bindParam(':usernivel', $usernivel);
$insert->bindParam(':userpassword', $userpassword);
$insert->execute();
if($insert == true){

    $_SESSION['userSalvo'] = "Cadastro efetuado com sucesso! Pode acessar o sistema";
    header('location: /../pa/index.php');
}else{
    $_SESSION['userSalvoErro'] = "Algo deu erro no cadastro tente novamente";
    header('location: /../pa/index.php');
}
?>