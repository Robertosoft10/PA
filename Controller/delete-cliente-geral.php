<?php
session_start();
require_once '../App/conectionDb.php';

$clientId = $_GET['param'];
$excluir  = $connection->prepare("DELETE FROM tb_clients, tb_ped_artes
    USING tb_clients INNER JOIN tb_ped_artes WHERE tb_clients.clientId = tb_ped_artes.idClient
    AND tb_ped_artes.idClient AND tb_clients.clientId = '$clientId'");
    $excluir->bindValue(":clientId", $clientId);
    $excluir->execute();

if($excluir == true){
	$_SESSION['clientGeralDeletado'] = "Registro geral excluido com sucesso!";
    header('location: ../View/view-cliente-pedido.php');
}else{
$_SESSION['clientGeralNaoDeletado'] = "Registro geral não excluido!";
header('location: ../View/view-cliente-pedido.php');
}

?>
