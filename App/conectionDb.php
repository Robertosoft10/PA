<?php
define( 'SERV', '127.0.0.1');
define( 'USER', 'root' );
define( 'PASS', '' );
define( 'DB', 'db_ped_arte');

$connection = new PDO('mysql:host=' . SERV . ';dbname=' . DB, USER, PASS);
try
{
    $connection = new PDO('mysql:host=' . SERV . ';dbname=' . DB, USER, PASS);
    $connection->exec("set names utf8");
}
catch (PDOException $e)
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
?>