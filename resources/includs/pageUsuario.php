<?php 
session_start();
require_once '../App/user.Dao.php';
@$useId = $_GET['param'];
$userDao = new UserDAO();
$listUser = $userDao->userBusc($useId);
$row = $listUser->fetch(PDO::FETCH_OBJ);

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
                            <a   href="view-cliente-pedido.php">
                                <i class="fa fa-users"></i> Listar Clientes / Pedido</a>
                        </li>
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
    <?php if($_SESSION['usernivel'] == 1){?>
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
                        <form action="../Controller/update-user.php?param=<?= $row->useId;?>" method="post">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control"
                                        name="username" value="<?= $row->username;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" 
                                        name="useremail" value="<?= $row->useremail;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-male"></i> 
                                    </div>
                                    <div class="nk-int-st">
                                        <select type="text" class="form-control"
                                        name="usernivel">
                                        <?php if($row->usernivel == 1){?>
                                        <option value="1">Administrador</option>
                                        <?php }else{?>
                                        <option value="2">Usuário</option>
                                        <?php }?>
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuário</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-key"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="password" class="form-control" placeholder="Senha de usuário ou nova senha *"
                                        name="userpassword" required="">
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
										<h2>Novo Usuário</h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
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
                             <?php if(isset($_SESSION['userSalvo'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['userSalvo'];?>
                            </div>
                            <?php unset($_SESSION['userSalvo']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                            <?php if(isset($_SESSION['useExiste'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['useExiste'];?>
                            </div>
                            <?php unset($_SESSION['useExiste']); }?>
                            <!-- end alerts -->
                              <!-- alerts -->
                            <?php if(isset($_SESSION['userAtializado'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['userAtializado'];?>
                            </div>
                            <?php unset($_SESSION['userAtializado']); }?>
                            <!-- end alerts -->
                              <!-- alerts -->
                              <?php if(isset($_SESSION['useAtializadoErro'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['useAtializadoErro'];?>
                            </div>
                            <?php unset($_SESSION['useAtializadoErro']); }?>
                            <!-- end alerts -->
                              <!-- alerts -->
                              <?php if(isset($_SESSION['userDeletado'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['userDeletado'];?>
                            </div>
                            <?php unset($_SESSION['userDeletado']); }?>
                            <!-- end alerts -->
                              <!-- alerts -->
                              <?php if(isset($_SESSION['userErroDelete'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['userErroDelete'];?>
                            </div>
                            <?php unset($_SESSION['userErroDelete']); }?>
                            <!-- end alerts -->
                             
                        </div>
                        <div class="row">
                            <form action="../Controller/insert-user.php" method="post">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Nome de usuário *"
                                        name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="E-mail de usuário"
                                        name="useremail">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-male"></i> *
                                    </div>
                                    <div class="nk-int-st">
                                        <select type="text" class="form-control"
                                        name="usernivel">
                                        <option></option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuário</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-key"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="password" class="form-control" placeholder="Senha de usuário *"
                                        name="userpassword">
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
<!-- Data Table area Start-->
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Lista de usuários</h2>
                            </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Usuário</th>
                                        <th>E-mail</th>
                                        <th>Nível</th>
                                        <th>Senha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $userDao = new UserDAO();
                                    $objt = $userDao->userList();
                                    while($rows = $objt->fetch(PDO::FETCH_OBJ)){?>
                                    <tr>
                                        <td>
                                        <img id="img-user" src="<?= "../resources/fotos/".$rows->userimage;?>">
                                       <small> <a href="" data-toggle="modal" data-target="#myModalImage<?= $rows->useId;?>"><i class="fa fa-pencil"></i> Editar</a></small> 
                                       <div class="modal fade" id="myModalImage<?= $rows->useId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <h3>Imagem de Usuário</h3>
                                                    <form action="../Controller/insert-imagem.php?param=<?= $rows->useId;?>"  method="post" enctype="multipart/form-data">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <input type="file" name="userimage" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer  text-center">
                                                    <button class="btn btn-default"><i class="fa fa-save"></i> Inserir imagem</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        </td>
                                        <td  id="btn-acao-page">
                                        <button class="btn btn-sm" id="btn-acao-cor" data-toggle="modal" data-target="#myModalDelete<?= $rows->useId;?>"> <i class="fa fa-trash"></i></button>
                                        <div class="modal fade" id="myModalDelete<?= $rows->useId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <h3>Excluir registro</h3>
                                                   <h2>Deseja mesmo excluir este registro?</h2>
                                                </div>
                                                <div class="modal-footer  text-center">
                                                    <a href="../Controller/delete-user.php?param=<?= $rows->useId;?>">
                                                    <button class="btn btn-default"><i class="fa fa-save"></i> Sim excluir</button></a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Não cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="view-usuario.php?param=<?= $rows->useId;?>">
                                    <button class="btn btn-sm" id="btn-acao-cor"> <i class="fa fa-edit"></i></button></a>
                                        </td>
                                        <td><?= $rows->username;?></td>
                                        <td><?= $rows->useremail;?></td>
                                        <?php if($rows->usernivel == 1){?>
                                        <td>Administrador</td>
                                        <?php }elseif($rows->usernivel == 2){ ?>
                                        <td>Usuário</td>
                                        <?php } ?>
                                        <td>Secreta **</td>
                                    </tr>
                                    <?php } ?>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- alerts -->
     <?php }else{?>
        <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
            As informações desta página so podem ser vistar por usuários administrador<br>
            acesse com usuário administrador para visualizar o conteúdo da mesma
            </div>
        <!-- end alerts -->
        <?php }?>