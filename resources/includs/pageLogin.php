<?php session_start();?>
<div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
        <small id="logo-sistema"><i class="fa fa-pencil-square-o"></i></small>
        <small id="nome-sistema">System - PA</small><br>
        <small id="nome-sistema-seg">Sistema Pedido de Artes</small>
           <form action="App/autentc-user.php" method="post">
            <div class="nk-form">
                <!-- alerts -->
            <?php if(isset($_SESSION['loginIncorreto'])){?>
            <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
           <i class="fa fa-warning"></i> <?= $_SESSION['loginIncorreto'];?>
            </div>
            <?php unset($_SESSION['loginIncorreto']); }?>
             <!-- end alerts -->
              <!-- alerts -->
              <?php if(isset($_SESSION['imgAtualizda'])){?>
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
            <i class="fa fa-check-circle"></i> <?= $_SESSION['imgAtualizda'];?>
                </div>
                <?php unset($_SESSION['imgAtualizda']); }?>
                <!-- end alerts -->
                              <!-- alerts -->
                <?php if(isset($_SESSION['imgAtualizdaErro'])){?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                    <i class="fa fa-warning"></i> <?= $_SESSION['imgAtualizdaErro'];?>
                    </div>
                    <?php unset($_SESSION['imgAtualizdaErro']); }?>
                            <!-- end alerts -->
                                <!-- alerts -->
                <?php if(isset($_SESSION['userNaoEncontrado'])){?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                    <i class="fa fa-warning"></i> <?= $_SESSION['userNaoEncontrado'];?>
                    </div>
                <?php unset($_SESSION['userNaoEncontrado']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                <?php if(isset($_SESSION['novasenhaErro'])){?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                    <i class="fa fa-warning"></i> <?= $_SESSION['novasenhaErro'];?>
                    </div>
                <?php unset($_SESSION['novasenhaErro']); }?>
                            <!-- end alerts -->
                              <!-- alerts -->
                              <?php if(isset($_SESSION['novasenha'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['novasenha'];?>
                            </div>
                            <?php unset($_SESSION['novasenha']); }?>
                            <!-- end alerts -->
                <h3>Acessar Sistema</h3>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-user"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Usuário"
                        name="username"  required="">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-key"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Senha"
                        name="userpassword" required="">
                    </div>
                </div>
                       <button class="btn  mg-t-15" id="btn-login"><i class="fa fa-sign-in"></i> Entrar</button>
                </form> 
                <div  id="link-senha-login">
                <a href="App/requestpassword.php">Escqueci senha!</a>
                </div>
                </div>
        </div>
</div>