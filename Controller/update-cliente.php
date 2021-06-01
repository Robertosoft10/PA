<?php
session_start();
require_once '../App/client.Dao.php';

$objt = new Client();
$objt->setClientId($_GET['param']);
$objt->setClientname($_POST['clientname']);
$objt->setClientfone($_POST['clientfone']);
$objt->setClientlocal($_POST['clientlocal']);
$objt->setClientemail($_POST['clientemail']);

$clientDAO = new ClientDAO();
$clientDAO->clientUpdate($objt);
if($objt == true){
    $_SESSION['clientAtualizado'] = "Registro atualizaso com sucesso!";
    header('location: ../View/view-cliente-pedido.php');
}else{
     $_SESSION['clientAtualizadoErro'] = "Falha! Não foi possível atualizar o registro";
     header('location: ../View/view-cliente-pedido.php');
}
?>