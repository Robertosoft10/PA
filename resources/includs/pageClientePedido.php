<?php
 session_start();
 require_once '../App/client.Dao.php';
$clientDao = new ClientDAO();
$objt = $clientDao->clientList();
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
                                <a href="" class="nav-link dropdown-toggle"> <small  id="btn-sair"> Olá: <?= $_SESSION['username'];?></small></a>
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
                            <a href="../App/Db/logout.php" 
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
                            <a   href="../App/Db/Database/backup.php">
                            <i class="fa fa-database"></i> Backup</a>
                        </li>
                     </ul>
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
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
										<h2>Lista de Clientes / Pedidos</h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                                    <a href="view-novo-cliente.php">
									<button class="btn"><i class="fa fa-user-plus"></i> Novo Cliente</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
     <!-- Data Table area Start-->
     <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Tabela de registro</h2> 
                             <!-- alerts -->
                             <?php if(isset($_SESSION['clientSalvo'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['clientSalvo'];?>
                            </div>
                            <?php unset($_SESSION['clientSalvo']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                             <?php if(isset($_SESSION['clientAtualizado'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['clientAtualizado'];?>
                            </div>
                            <?php unset($_SESSION['clientAtualizado']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                             <?php if(isset($_SESSION['clientAtualizadoErro'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['clientAtualizadoErro'];?>
                            </div>
                            <?php unset($_SESSION['clientAtualizadoErro']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                             <?php if(isset($_SESSION['clienteDeletado'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['clienteDeletado'];?>
                            </div>
                            <?php unset($_SESSION['clienteDeletado']); }?>
                            <!-- end alerts -->
                                  <!-- alerts -->
                             <?php if(isset($_SESSION['clienteErroDelete'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['clienteErroDelete'];?>
                            </div>
                            <?php unset($_SESSION['clienteErroDelete']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                             <?php if(isset($_SESSION['statusOk'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['statusOk'];?>
                            </div>
                            <?php unset($_SESSION['statusOk']); }?>
                            <!-- end alerts -->
                            <!-- alerts -->
                            <?php if(isset($_SESSION['statusErro'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['statusErro'];?>
                            </div>
                            <?php unset($_SESSION['statusErro']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                             <?php if(isset($_SESSION['arteAtualizadaOk'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['arteAtualizadaOk'];?>
                            </div>
                            <?php unset($_SESSION['arteAtualizadaOk']); }?>
                            <!-- end alerts -->
                            <!-- alerts -->
                            <?php if(isset($_SESSION['arteAtualizadaErro'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['arteAtualizadaErro'];?>
                            </div>
                            <?php unset($_SESSION['arteAtualizadaErro']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                             <?php if(isset($_SESSION['arteDeletado'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['arteDeletado'];?>
                            </div>
                            <?php unset($_SESSION['arteDeletado']); }?>
                            <!-- end alerts -->
                            <!-- alerts -->
                            <?php if(isset($_SESSION['arteNaoDeletado'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['arteNaoDeletado'];?>
                            </div>
                            <?php unset($_SESSION['arteNaoDeletado']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                             <?php if(isset($_SESSION['clientGeralDeletado'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['clientGeralDeletado'];?>
                            </div>
                            <?php unset($_SESSION['clientGeralDeletado']); }?>
                            <!-- end alerts -->
                             <!-- alerts -->
                             <?php if(isset($_SESSION['clientGeralNaoDeletado'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-warning"></i> <?= $_SESSION['clientGeralNaoDeletado'];?>
                            </div>
                            <?php unset($_SESSION['clientGeralNaoDeletado']); }?>
                            <!-- end alerts -->
                            </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Cliente</th>
                                        <th>Telefone</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($rows = $objt->fetch(PDO::FETCH_OBJ)){?>
                                    <tr>
                                        <td id="btn-acao-page">
                                        <button class="btn btn-sm" id="btn-acao-cor" data-toggle="modal" data-target="#myModalDelete"> <i class="fa fa-trash"></i></button>
                                        <div class="modal fade" id="myModalDelete" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <h3>Excluir registro</h3>
                                                   <h2>Deseja mesmo excluir este registro?</h2>
                                                </div>
                                                <div class="modal-footer  text-center">
                                                    <a href="../Controller/delete-cliente.php?param=<?= $rows->clientId;?>">
                                                    <button class="btn btn-default"><i class="fa fa-save"></i> Sim excluir</button></a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Não cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="view-novo-cliente.php?param=<?= $rows->clientId;?>">
                                        <button class="btn btn-sm" id="btn-acao-cor"> <i class="fa fa-edit"></i></button>
                                        <a href="view-detalhe-cliente.php?param=<?= $rows->clientId;?>">
                                        <button class="btn btn-sm" id="btn-acao-cor"> <i class="fa fa-folder-open-o"></i></button></a>
                                        </td>
                                        <td><?= $rows->clientname;?></td>
                                        <td><?= $rows->clientfone;?></td>
                                        <td><?= $rows->clientemail;?></td>
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