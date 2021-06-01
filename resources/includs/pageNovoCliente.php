<?php 
session_start();
require_once '../App/client.Dao.php';
@$clientId = $_GET['param'];
$clientDao = new ClientDAO();
$listClient = $clientDao->clientBusc($clientId);
$row = $listClient->fetch(PDO::FETCH_OBJ);
?>
    <div class="header-top-area" id="barra-topo">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="">
                            <small id="logo-pagina"><i class="fa fa-edit"></i> System - PA</small>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item nc-al">
                                <a href="" class="nav-link dropdown-toggle"> <small  id="btn-sair">Olá: <?= $_SESSION['username'];?></small></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                <li class="nav-item"><a href="" data-toggle="modal" data-target="#myModalEditarImagem<?= $_SESSION['useId'];?>" class="nav-link dropdown-toggle">
                                <span><img  id="image-user" src="<?= "../resources/fotos/".$_SESSION['userimage'];?>"></a>
                                <div class="modal fade" id="myModalEditarImagem<?= $_SESSION['useId'];?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <h3>Imagem de Usuário</h3>
                                                    <form action="../Controller/insert-imagem.php?param=<?= $_SESSION['useId'];?>"  method="post" enctype="multipart/form-data">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <input type="file" name="userimage" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer  text-center">
                                                    <button class="btn btn-default"><i class="fa fa-save"></i> Altarar imagem</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                            </li>
                            <li class="nav-item">
                            <a href="../Backup/arquivodb.php" 
                             class="nav-link dropdown-toggle"><span>
                                 <i class="fa fa-sign-out"></i></span> <small  id="btn-sair">Sair</small></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hea -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li  id="link-pagina">
                            <a   href="view-usuario.php">
                                <i class="fa fa-user"></i> Usuário</a>
                        </li>
                        <li  id="link-pagina">
                            <a   href="../Backup/arquivodb.php">
                            <i class="fa fa-database"></i> Backup</a>
                        </li>
                     </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php if(isset($_GET['param'])){?>
    <!-- editar dados -->
<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
										<h2>Editar dados</h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                                    <a href="view-cliente-pedido.php">
									<button class="btn"><i class="fa fa-list"></i> Listar Clientes</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
     <!-- form editar-->
     <div class="data-table-area">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>Formulário de edição</h2>
                        </div>
                        <div class="row">
                            <form action="../Controller/update-cliente.php?param=<?= $row->clientId;?>" method="post">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control"
                                        name="clientname" value="<?= $row->clientname;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control"
                                        name="clientfone" value="<?= $row->clientfone;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control"
                                        name="clientlocal" value="<?= $row->clientlocal;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control"
                                        name="clientemail" value="<?= $row->clientemail;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
									<button id="btn-salvar-page" class="btn"><i class="fa fa-save"></i> Salvar </button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- end editar -->
<?php }else{?>
    <div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
										<h2>Novo Cliente</h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                                    <a href="view-cliente-pedido.php">
									<button class="btn"><i class="fa fa-list"></i> Listar Clientes</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
     <!-- foram cadastro -->
     <div class="data-table-area">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>Formulário de cadastro</h2>
                             <!-- alerts -->
                            <?php if(isset($_SESSION['clientErro'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['clientErro'];?>
                            </div>
                            <?php unset($_SESSION['clientErro']); }?>
                            <!-- end alerts -->
                        </div>
                        <div class="row">
                            <form action="../Controller/insert-cliente.php" method="post">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Nome do Cliente *"
                                        name="clientname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Telefone"
                                        name="clientfone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Endereço completo ou apenas cidade *"
                                        name="clientlocal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="E-mail"
                                        name="clientemail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
									<button id="btn-salvar-page" class="btn"><i class="fa fa-save"></i> Salvar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php } ?>