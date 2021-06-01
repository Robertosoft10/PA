<?php session_start();?>
<div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
        <small id="logo-sistema"><i class="fa fa-pencil-square-o"></i></small>
        <small id="nome-sistema">System - PA</small><br>
        <small id="nome-sistema-seg">Sistema Pedido de Artes</small>
           <form action="../View/view-result-busc-user.php" method="post">
            <div class="nk-form">
                <!-- alerts -->
            <?php if(isset($_SESSION['loginIncorreto'])){?>
            <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
           <i class="fa fa-warning"></i> <?= $_SESSION['loginIncorreto'];?>
            </div>
            <?php unset($_SESSION['loginIncorreto']); }?>
             <!-- end alerts -->
                <h3>Redefinir senha</h3>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="	fa fa-envelope"></i></span>
                    <div class="nk-int-st">
                        <input type="email" class="form-control" placeholder="E-mail de usuário"
                        name="email"  required="">
                    </div>
                </div>
                       <button class="btn  mg-t-15" id="btn-login"><i class="fa fa-mail-forward"></i> Avançar</button>
                </form> 
                <div  id="link-senha-login">
                </div>
                </div>
        </div>
</div>