<?php
session_start();
require 'conectionDb.php';
$username = $_POST['username'];
$userpassword =  sha1($_POST['userpassword']);

$sql = "SELECT * FROM tb_users WHERE username = :username AND userpassword = :userpassword";
$login = $connection->prepare($sql);
$login->bindParam(':username', $username);
$login->bindParam(':userpassword', $userpassword);
$login->execute();
$result = $login->fetchAll(PDO::FETCH_ASSOC);

if (count($result) <= 0)
{

  $_SESSION['loginIncorreto'] = "Usuário ou senha invalidos";
  header('location: /../pa/index.php');
    exit;
}
$result = $result[0];

$_SESSION['logged_in'] = true;
$_SESSION['useId'] = $result['useId'];
$_SESSION['username'] = $result['username'];
$_SESSION['useremail'] = $result['useremail'];
$_SESSION['usernivel'] = $result['usernivel'];
$_SESSION['userpassword'] = $result['userpassword'];
$_SESSION['userimage'] = $result['userimage'];
header('location: /../pa/View/view-cliente-pedido.php');
?>