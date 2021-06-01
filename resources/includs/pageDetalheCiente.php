<?php 
@session_start();
include '../App/protection.php';
require_once '../App/conectionDb.php';
require_once '../App/client.Dao.php';
$clientId = $_GET['param'];
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
    <div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
                             <!-- alerts -->
                             <?php if(isset($_SESSION['arteOk'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['arteOk'];?>
                            <a href="../View/view-detalhe-cliente.php?param=<?= $row->clientId;?>">
                            <button class="btn pull-right" id="btn-acao-cor"><i class="fa fa-check-circle"></i> Ok</button>
                            </a>
                            </div>
                            <?php unset($_SESSION['arteOk']); }?>
                            <!-- end alerts -->
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
										<h2>Detalhe do cliente / Pedido</h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                                    <a href="view-cliente-pedido.php">
									<button class="btn"><i class="fa fa-list"></i> Listar Clientes</button></a>
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
    <div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
									<p>
                                    <b>Cliente: </b><?= $row->clientname;?><br>
                                    <b>Telefone: </b><?= $row->clientfone;?><br>
                                    <b>Endereço / Cidade: </b><?= $row->clientlocal;?><br>
                                    <b>E-mail: </b><?= $row->clientemail;?><br><br>
                                    </p>
                                    <?php 
                                    $sql = $connection->query("SELECT * FROM tb_ped_artes PA JOIN tb_clients Cl ON PA.idClient = CL.clientId WHERE clientId='$clientId'");
                                    $true = $sql->fetch(PDO::FETCH_OBJ);
                                    if(!isset($true->artvalue)){
                                    ?>
                                    <button class="btn" id="btn-acao-cor" data-toggle="modal" data-target="#myModalDeleteCliente<?= $row->clientId;?>"> <i class="fa fa-trash"></i></button>
                                    <div class="modal fade" id="myModalDeleteCliente<?= $row->clientId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <h3>Excluir registro</h3>
                                                   <h2>Deseja mesmo excluir este registro?</h2>
                                                </div>
                                                <div class="modal-footer  text-center">
                                                    <a href="../Controller/delete-cliente.php?param=<?= $row->clientId;?>">
                                                    <button class="btn btn-default"><i class="fa fa-save"></i> Sim excluir</button></a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Não cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                     <?php }else{?>
                                     <button class="btn" id="btn-acao-cor" data-toggle="modal" data-target="#myModalDeleteClienteGral<?= $row->clientId;?>"> <i class="fa fa-trash"></i></button>
                                    <div class="modal fade" id="myModalDeleteClienteGral<?= $row->clientId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <h3>Excluir registro </h3>
                                                   <h2>Deseja mesmo excluir este registro?</h2>
                                                </div>
                                                <div class="modal-footer  text-center">
                                                    <a href="../Controller/delete-cliente-geral.php?param=<?= $row->clientId;?>">
                                                    <button class="btn btn-default"><i class="fa fa-save"></i> Sim excluir</button></a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Não cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                     <?php }?>
                                    <a href="view-novo-cliente.php?param=<?= $row->clientId;?>">
                                    <button class="btn" id="btn-acao-cor"> <i class="fa fa-edit"></i></button></a>
                                    <button class="btn" id="btn-acao-cor" data-toggle="modal" data-target="#myModalNovoPedido"> <i class="fa fa-plus"></i> Novo Pedido</button>
                                    <div class="modal fade" id="myModalNovoPedido" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3>Adicionar novo pedido</h3>
                                                <form action="../Controller/insert-arte.php?param=<?= $row->clientId;?>" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-edit"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" class="form-control" placeholder="Tipo da Arte *"
                                                            name="arttipo" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <textarea type="text" class="form-control" placeholder="Descrição"   
                                                            name="artdescrition"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" class="form-control" placeholder="Data de entrega *" 
                                                            name="artentreg"  required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-asterisk"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="number" class="form-control" placeholder="Valor, Apenas números *"
                                                            name="artvalue"  required="">
                                                        </div>
                                                    </div>
                                                    </div>
                                                        </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-default"><i class="fa fa-save"></i> Salvar</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                                            </div>
                                            </div>
                                        </div>
                                        </form>
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
     <!-- Data Table area Start-->
     <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Tabela de Pedidos</h2> 
                            </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Arte</th>
                                        <th>Descrição</th>
                                        <th>Entrega</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $sql = $connection->query("SELECT * FROM tb_ped_artes PA JOIN tb_clients Cl ON PA.idClient = CL.clientId WHERE clientId='$clientId'");
                                    while($rows = $sql->fetch(PDO::FETCH_OBJ)){?>
                                    <tr>
                                        <td id="btn-acao-detalhe">
                                        <button class="btn" id="btn-acao-cor" data-toggle="modal" data-target="#myModalDeleteArte<?= $rows->pdarteId;?>"> <i class="fa fa-trash"></i></button>
                                        <div class="modal fade" id="myModalDeleteArte<?= $rows->pdarteId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <h3>Excluir registro</h3>
                                                   <h2>Deseja mesmo excluir este registro?</h2>
                                                </div>
                                                <div class="modal-footer  text-center">
                                                    <a href="../Controller/delete-arte.php?param=<?= $rows->pdarteId;?>">
                                                    <button class="btn btn-default"><i class="fa fa-save"></i> Sim excluir</button></a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Não cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                        <button class="btn" id="btn-acao-cor" data-toggle="modal" data-target="#myModalEditarPedido<?= $rows->pdarteId;?>"> <i class="fa fa-edit"></i></button>
                                        <div class="modal fade" id="myModalEditarPedido<?= $rows->pdarteId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3>Editar  pedido</h3>
                                                    <form action="../Controller/update-arte.php?param=<?= $rows->pdarteId;?>" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-edit"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" class="form-control"
                                                            name="arttipo" value="<?= $rows->arttipo;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <textarea type="text" class="form-control" 
                                                            name="artdescrition"><?= $rows->artdescrition;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" class="form-control" 
                                                            name="artentreg" value="<?= $rows->artentreg;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-asterisk"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="number" class="form-control"
                                                            name="artvalue" value="<?= $rows->artvalue;?>">
                                                        </div>
                                                    </div>
                                                    </div>
                                                        </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-default"><i class="fa fa-save"></i> Salvar Alterações</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar Alterações</button>
                                            </div>
                                            </div>
                                        </div>
                                        </form>
                                     </div>
									</div>
                                    </td>
                                        <td id="arte-arte"><?= $rows->arttipo;?></td>
                                        <td id="desc-arte"><?= $rows->artdescrition;?></td>
                                        <td id="data-arte"><?= $rows->artentreg;?></td>
                                        <td id="valor-arte">R$ <?= @number_format($rows->artvalue, 2, ',', '.');?></td>
                                        <?php if($rows->artestatus == 1){?>
                                        <td>
                                        <button class="btn btn-danger  btn-sm" data-toggle="modal" data-target="#myModalStatus<?= $rows->pdarteId;?>">Não Iníciou</button>
                                        <div class="modal fade" id="myModalStatus<?= $rows->pdarteId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3>Status</h3>
                                                   <form action="../Controller/update-status.php?param=<?= $rows->pdarteId;?>" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="fa fa-edit"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <select type="text" name="artestatus" class="form-control">
                                                                <option></option>
                                                                <option value="1">Não Iníciou</option>
                                                                <option value="2">Em Execução</option>
                                                                <option value="3">Entregue</option>
                                                                <option value="4">Sem Status</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-default"><i class="fa fa-save"></i> Salvar </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                                            </div>
                                            </div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                        </td>
                                        <?php }elseif($rows->artestatus == 2){?>
                                        <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalStatus<?= $rows->pdarteId;?>">Em Execução</button>
                                        <div class="modal fade" id="myModalStatus<?= $rows->pdarteId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3>Status</h3>
                                                   <form action="../Controller/update-status.php?param=<?= $rows->pdarteId;?>" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <select type="text"  name="artestatus" class="form-control">
                                                            <option></option>
                                                                <option value="1">Não Iníciou</option>
                                                                <option value="2">Em Execução</option>
                                                                <option value="3">Entregue</option>
                                                                <option value="4">Sem Status</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-default"><i class="fa fa-save"></i> Salvar </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                                            </div>
                                            </div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                        </td>
                                        <?php }elseif($rows->artestatus == 3){?>
                                        <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModalStatus<?= $rows->pdarteId;?>">Entregue</button>
                                        <div class="modal fade" id="myModalStatus<?= $rows->pdarteId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3>Status</h3>
                                                   <form action="../Controller/update-status.php?param=<?= $rows->pdarteId;?>" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <select type="text"  name="artestatus" class="form-control">
                                                            <option></option>
                                                                <option value="1">Não Iníciou</option>
                                                                <option value="2">Em Execução</option>
                                                                <option value="3">Entregue</option>
                                                                <option value="4">Sem Status</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-default"><i class="fa fa-save"></i> Salvar </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                                            </div>
                                            </div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                        </td>
                                        <?php }else{?>
                                        <td>
                                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModalStatus<?= $rows->pdarteId;?>">Status</button>
                                        <div class="modal fade" id="myModalStatus<?= $rows->pdarteId;?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3>Status</h3>
                                                   <form action="../Controller/update-status.php?param=<?= $rows->pdarteId;?>" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <select type="text" name="artestatus"  class="form-control">
                                                                <option></option>
                                                                <option value="1">Não Iníciou</option>
                                                                <option value="2">Em Execução</option>
                                                                <option value="3">Entregue</option>
                                                                <option value="4">Sem Status</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-default"><i class="fa fa-save"></i> Salvar </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                                            </div>
                                            </div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                        </td>
                                        <?php } ?>
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