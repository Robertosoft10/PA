<?php
session_start();
require_once '../App/conectionDb.php';

$pdarteId = $_GET['param'];
$arttipo = $_POST['arttipo'];
$artdescrition = $_POST['artdescrition'];
$artentreg = $_POST['artentreg'];
$artvalue = $_POST['artvalue'];

$sql = "UPDATE tb_ped_artes SET arttipo=:arttipo, artdescrition=:artdescrition, artentreg=:artentreg, artvalue=:artvalue WHERE pdarteId='$pdarteId'";
$update = $connection->prepare($sql);
$update->bindParam(':arttipo', $arttipo);
$update->bindParam(':artdescrition', $artdescrition);
$update->bindParam(':artentreg', $artentreg);
$update->bindParam(':artvalue', $artvalue);
$update->execute();

if($update == true){
  $_SESSION['arteAtualizadaOk'] = "Registro atualizado com sucesso!";
  header('location: ../View/view-cliente-pedido.php');

}else{
    $_SESSION['arteAtualizadaErro'] = "Erro ao atualizar registro";
    header('location: ../View/view-cliente-pedido.php');
}
?>