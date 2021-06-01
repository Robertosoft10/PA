<?php
session_start();
require_once '../App/client.Dao.php';
$clientId = $_GET['param'];
$clientDAO = new ClientDAO();

$clientDAO->clientDelet($clientId);
if($clientDAO == true){
$_SESSION['clienteDeletado'] = "Registro excluido com sucesso!";
header('location: ../View/view-cliente-pedido.php');
}else{
     $_SESSION['clienteErroDelete'] = "Falha ao excluir registro!";
     header('location: ../View/view-cliente-pedido.php');
}
?>