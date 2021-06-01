<?php 
session_start();
require_once '../App/conectionDb.php';
$user = 0;
$useremail = $_POST['email'];
$sql = $connection->query("SELECT * FROM tb_users WHERE useremail LIKE '%$useremail%'");
$result = $sql->fetchAll();
$row = count($result);

if($row > 0){
$sql = $connection->query("SELECT * FROM tb_users WHERE useremail='$useremail'");
$rows = $sql->fetch(PDO::FETCH_OBJ);
  $_SESSION['emailOk'] = "Usuário encontrado! Pede dedefinir a nova senha";
?>
<div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
        <small id="logo-sistema"><i class="fa fa-pencil-square-o"></i></small>
        <small id="nome-sistema">System - PA</small><br>
        <small id="nome-sistema-seg">Sistema Pedido de Artes</small><
       
           <form action="../Controller/update-new-senha.php?param=<?= $rows->useId;?>" method="post">
            <div class="nk-form">
               <!-- alerts -->
               <?php if(isset($_SESSION['emailOk'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['emailOk'];?>
                            </div>
                            <?php unset($_SESSION['emailOk']); }?>
                            <!-- end alerts -->
                <h3>Redefinir senha</h3><br>
                User: <?= $rows->username;?><br>
        E-mail: <?= $rows->useremail;?><br>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="	fa fa-envelope"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="digite sua nova senha"
                        name="userpassword"  required="">
                    </div>
                </div>
                       <button class="btn  mg-t-15" id="btn-login"><i class="fa fa-save"></i> Salvar nova senha</button>
                </form> 
                <div  id="link-senha-login">
                </div>
                </div>
        </div>
</div>
<?php }else{
    $_SESSION['userNaoEncontrado'] = "Usuário não encontrado na bse de dados!";
    header('location: /../pa/index.php');
      
}