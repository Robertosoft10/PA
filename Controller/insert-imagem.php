<?php
session_start();
require_once '../App/conectionDb.php';
$useId = $_GET['param'];
$userimage = $_FILES['userimage'];
$sql = $connection->query("SELECT * FROM tb_users WHERE useId='$useId'");
while($rows = $sql->fetch(PDO::FETCH_OBJ)){
	$arquivo_db = $rows->userimage;
}
unlink("../resources/fotos/$arquivo_db");

if(isset($_FILES['userimage'])){
	$extensao = strtolower(substr($_FILES['userimage']['name'], - 4));
	$userimage = sha1(time()) . $extensao;
    $diretorio = "../resources/fotos/";
	move_uploaded_file($_FILES['userimage']['tmp_name'], $diretorio.$userimage);
    $sql = "UPDATE tb_users SET userimage=:userimage WHERE useId='$useId'";
    $update = $connection->prepare($sql);
    $update->bindParam(':userimage', $userimage);
    $update->execute();

if($update == true){
    $_SESSION['imgAtualizda'] = "Imagem atualizada com sucesso!";
    header('location: /../pa/index.php');
}else{
    $_SESSION['imgAtualizdaErro'] = "Falha na atualização da imagem!";
    eader('location: /../pa/index.php');
}
}
?>
