<?php
session_start();
require_once '../App/conectionDb.php';

$idClient = $_GET['param'];
$arttipo = $_POST['arttipo'];
$artdescrition = $_POST['artdescrition'];
$artentreg = $_POST['artentreg'];
$artvalue = $_POST['artvalue'];

$sql = "INSERT INTO tb_ped_artes (idClient, arttipo, artdescrition, artentreg, artvalue)VALUES(:idClient, :arttipo, :artdescrition, :artentreg, :artvalue)";
$insert = $connection->prepare($sql);
$insert->bindParam(':idClient', $idClient);
$insert->bindParam(':arttipo', $arttipo);
$insert->bindParam(':artdescrition', $artdescrition);
$insert->bindParam(':artentreg', $artentreg);
$insert->bindParam(':artvalue', $artvalue);
$insert->execute();

if($insert == true){
  $_SESSION['arteOk'] = "Pedido de arte efetuado com sucesso!";

}else{
    $_SESSION['arteErro'] = "Erro no cadastro";
}
include '../resources/includs/header.php';
include '../resources/includs/pageDetalheCiente.php';
include '../resources/includs/footer.php';
?>