<?php session_start();?>
<div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
        <small id="logo-sistema"><i class="fa fa-pencil-square-o"></i></small>
        <small id="nome-sistema">System - PA</small><br>
        <small id="nome-sistema-seg">Sistema Pedido de Artes</small>
           <form action="../Controller/insert-user-ini.php" method="post">
            <div class="nk-form">
                <h3>Cadastrar Usuário inícial do Sistema</h3>
                <small id="att-inform">Atenção!<br>
                Anote estas informações elas servem para acessar o sistema iniciamente,
                ao acessar o sistema você poderá cadastrar novos usuários  </small>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro">Usuário</span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control"
                          value="Admin" disabled="">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro">E-mail</span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control"
                          value="admin@sistemapedido.com.br" disabled="">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro">Nível</span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control"
                         value="Admin" disabled="">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro">Senha</span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control"
                          value="admin" disabled="">
                    </div>
                </div>

                       <button class="btn  mg-t-15" id="btn-login"><i class="fa fa-sign-in"></i> Cadastrar</button>
                </form> 
                </div>
                </div>
        </div>
</div>