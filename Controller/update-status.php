<?php
session_start();
require_once '../App/conectionDb.php';

$pdarteId = $_GET['param'];
$artestatus = $_POST['artestatus'];

$sql = "UPDATE tb_ped_artes SET artestatus=:artestatus WHERE pdarteId='$pdarteId'";
$update = $connection->prepare($sql);
$update->bindParam(':artestatus', $artestatus);
$update->execute();

if($update == true){
  $_SESSION['statusOk'] = "Status adicionado com sucesso!";
  header('location: ../View/view-cliente-pedido.php');

}else{
    $_SESSION['statusErro'] = "Erro ao adicionar status";
    header('location: ../View/view-cliente-pedido.php');
}
?>