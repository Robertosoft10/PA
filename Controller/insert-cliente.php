<?php
session_start();
require_once '../App/client.Dao.php';

if(!empty($_POST['clientname']) && !empty($_POST['clientlocal'])){

$objt = new Client();
$objt->setClientname($_POST['clientname']);
$objt->setClientfone($_POST['clientfone']);
$objt->setClientlocal($_POST['clientlocal']);
$objt->setClientemail($_POST['clientemail']);

$clientDAO = new ClientDAO();
$clientDAO->clientInsert($objt);

    $_SESSION['clientSalvo'] = "Cadastro efetuado com sucesso!";
    header('location: ../View/view-cliente-pedido.php');
}else{
     $_SESSION['clientErro'] = "Falha no cadastro! Preencha todos os campos obrigatórios!";
     header('location: ../View/view-novo-cliente.php');
}
?>