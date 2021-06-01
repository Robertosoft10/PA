<?php
session_start();
require_once '../App/conectionDb.php';
$pdarteId = $_GET['param'];
$excluir = $connection->prepare("DELETE FROM tb_ped_artes WHERE pdarteId=:pdarteId");
$excluir->bindValue(":pdarteId", $pdarteId);
$excluir->execute();
if($excluir == true){
	$_SESSION['arteDeletado'] = "Registro excluido com sucesso!";
    header('location: ../View/view-cliente-pedido.php');
}else{
$_SESSION['arteNaoDeletado'] = "Registro não excluido!";
header('location: ../View/view-cliente-pedido.php');
}
?>