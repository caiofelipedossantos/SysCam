<?php
session_start();
if(isset($_SESSION['dados']) && !empty($_SESSION['dados'])){
 /** Chamada do template de Cabeçario */
 include_once 'parts/header.php';

 require_once 'config.php';
 require_once 'classes/camera.php';
 require_once 'classes/usuario.php';
 require_once 'classes/acesso.php';
 ?>
    <div id="tabs" class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="assets/images/logo.png" alt="Nobre Velórios" class="img-fluid">
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="#accessListView" ><i class="fa fa-lock"></i> Acessos</a>
                    </li>
                    <li>
                        <a href="#camListView" ><i class="fa fa-camera"></i> Câmeras</a>
                    </li>
                    <li>
                        <a href="#userListView"><i class="fa fa-user"></i> Usuários</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="fa fa-align-center"></i>
                            </button>
                        </div>
                        <a href="sair.php" class="btn btn-secondary">Sair</a>
                    </div>
                </nav>

                <section id="camListView" class="row-section">
                    <?php
                        $camera = new Camera();
                        $cam = $camera->listCamera();
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-10 offset-md-1 row-block">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <h2>Câmeras</h2>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="actionButton">
                                            <button type="button" id="addCameraButton" class="btn btn-success" data-toggle="modal" data-target="#AddCamera" ><span><i class="fa fa-plus"></i></span> Câmera</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 offset-md-1 row-block">
                                <div class="row">
                                    <?php
                                        if($cam != null){
                                            foreach($cam as $c){
                                    ?>
                                                <div class="col-md-6 mt-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="<?php echo $c['screenshot']; ?>">
                                                        <div class="card-block">
                                                            <h4 class="card-title"><?php echo $c['nome']; ?></h4>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <?php 
                                                                        if($c['status'] == 1){
                                                                            echo '<span class="badge badge-success">Ativa</span>';
                                                                        }else{
                                                                            echo '<span class="badge badge-danger">Desativada</span>';
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button class="btn btn-info btn-sm" 
                                                                            data-toggle="modal" 
                                                                            data-target="#cameraLive" 
                                                                            data-alias="<?php echo $c['alias'] ?>" 
                                                                            data-nome="<?php echo $c['nome'] ?>"
                                                                        >Ver</button>
                                                                        <button class="btn btn-danger btn-sm" 
                                                                            data-toggle="modal" 
                                                                            data-target="#editCamera"
                                                                            data-id="<?php echo $c['idcamera'] ?>"
                                                                            data-nome="<?php echo $c['nome'] ?>" 
                                                                            data-status="<?php echo $c['status'] ?>"
                                                                        >Editar</button>
                                                                    </div>
                                                                </div>
                                                            </div>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                            <div class="col-md-12 mt-4">
                                                <div class="alert alert-dark" role="alert">Não há câmeras cadastradas.</div>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="userListView" class="row-section">
                    <?php
                        $usuario = new Usuario();
                        $user = $usuario->listUsuario();
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-10 offset-md-1 row-block">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <h2>Usuários</h2>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="actionButton">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUsuario" ><span><i class="fa fa-plus"></i></span> Usuário</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 offset-md-1 row-block">
                                <div class="row">
                                    <?php
                                        if($user != null){
                                            foreach($user as $u){
                                    ?>
                                                <div class="col-md-3 mt-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="assets/images/user.png">
                                                        <div class="card-block">
                                                            <h4 class="card-title"><?php echo $u['nome']; ?></h4>
                                                        </div>
                                                        <div class="card-footer">
                                                            <span>
                                                                <?php 
                                                                    if($u['status'] == 1){
                                                                        echo '<span class="badge badge-success">Ativa</span>';
                                                                    }else{
                                                                        echo '<span class="badge badge-danger">Desativada</span>';
                                                                    }
                                                                ?>
                                                            </span>
                                                            <button class="btn btn-info float-right btn-sm" 
                                                            data-toggle="modal" 
                                                            data-target="#editUsuario" 
                                                            data-id="<?php echo $u['idusuario'] ?>" 
                                                            data-nome="<?php echo $u['nome'] ?>"
                                                            data-status="<?php echo $u['status'] ?>"
                                                            data-email="<?php echo $u['email'] ?>"
                                                            >Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                            <div class="col-md-12 mt-4">
                                                <div class="alert alert-dark" role="alert">Não há usuários cadastrados.</div>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="accessListView" class="row-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-10 offset-md-1 row-block">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <h2>Acessos</h2>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="actionButton">
                                            <button type="button" id="addAcesso" class="btn btn-success" data-toggle="modal" data-target="#addAcessoModal" ><span><i class="fa fa-plus"></i></span> Acesso</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 offset-md-1 row-block">
                                <div id="accordion">
                                <?php
                                    $acesso = new Acesso();
                                    $ace = $acesso->listAcessos();
                                    if($ace != null){
                                        foreach ($ace as $aces) {
                                ?>
                                    
                                            <div class="border-0 mt-3">
                                                <div class="card-header" id="headerCam_<?php echo $aces['nome'];?>">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h3><i class="fa fa-user" ></i>&nbsp;&nbsp;<?php echo $aces['nome'];?>&nbsp;&nbsp;<span class="badge badge-secondary"></span></h3>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <button class="btn btn-primary" data-toggle="collapse" data-target="#accessCam_<?php echo $aces['nome'];?>" aria-expanded="true" aria-controls="collapseOne">
                                                            Ver
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="accessCam_<?php echo $aces['nome'];?>" class="collapse" aria-labelledby="headerCam_<?php echo $aces['nome'];?>" data-parent="#accordion">
                                                    <div class="card-body">
                                                    <?php
                                                            $cam_acess = explode(',',$aces['cameras']);
                                                            foreach($cam_acess as $cams){
                                                                $temp = explode('#',$cams);
                                                    ?>
                                                                <div class="col-md-4 mt-4">
                                                                    <div class="card">
                                                                        <img class="card-img-top" src="<?php echo $temp[2];?>">
                                                                        <div class="card-block">
                                                                            <h4 class="card-title"><?php echo $temp[1];?></h4>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <?php
                                                                                if($temp[3]== 1 && $temp[4] <= date("Y-m-d H:i") && $temp[5] >= date("Y-m-d H:i") ){
                                                                                    echo '<span class="badge badge-success">Liberada</span>';
                                                                                }else{
                                                                                    echo '<span class="badge badge-danger">Bloqueada</span>';
                                                                                }
                                                                            ?>
                                                                                
                                                                                <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" 
                                                                                data-target="#removeAcesso" 
                                                                                data-idacessoremoveuser="<?php echo $aces['idusuario'];?>"
                                                                                data-idacessoremovecam="<?php echo $temp[0];?>">Remover</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    <?php
                                                            }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }else{
                                        echo '
                                        <div class="alert alert-dark" role="alert">
                                            Não há acessos cadastrados!
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- MODALS -->
        <div class="modal fade" id="cameraLive" tabindex="-1" role="dialog" aria-labelledby="CameraLive" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CameraLive"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Add Camera -->
        <div class="modal fade" id="AddCamera" tabindex="-1" role="dialog" aria-labelledby="addCamera" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Câmera</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div id="result"></div>
                        <form id="formAddCamera" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="camDiponivel">Câmeras Disponiveis</label>
                                    <select class="custom-select mr-sm-2" id="camDiponivel">
                                        <option selected>Selecione</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="camAlias">Alias</label>
                                    <input type="text" class="form-control" name="alias" id="camAlias" placeholder="Alias" readonly required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="camNome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="camNome" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="camNome">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="camEndereco" placeholder="Endereço" readonly required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="camScreenshot">Screenshot</label>
                                    <input type="text" class="form-control" name="screenshot" id="screenshot" placeholder="Screenshot" readonly required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="camStatus">Status</label>
                                    <select class="custom-select mr-sm-2" name="status" id="statusAddCamera">
                                        <option value="0">Desativado</option>
                                        <option selected value="1">Ativado</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
                                        
        <!-- EDIT CAMERA -->
        <div class="modal fade" id="editCamera" tabindex="-1" role="dialog" aria-labelledby="editCamera" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div id="resultEditCam"></div>
                        <form id="formEditCamera" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="editCamId" id="editCamId">
                                    <label for="editCamNome">Nome</label>
                                    <input type="text" class="form-control" name="editCamNome" id="editCamNome" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="editCamStatus">Status</label>
                                    <select class="custom-select mr-sm-2" name="editCamStatus" id="editCamStatus">
                                        <option value="0">Desativado</option>
                                        <option selected value="1">Ativado</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button id="delCamera" type="button" class="btn btn-danger float-right">Apagar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- USUARIO -->
        <!-- EDIT -->
        <div class="modal fade" id="editUsuario" tabindex="-1" role="dialog" aria-labelledby="editUsuario" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div id="resultEditUser"></div>
                        <form id="formeditUsuario" method="POST">
                            <input type="hidden" class="form-control" name="idUsuario" id="idUsuario">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nomeUsuario">Nome</label>
                                    <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="senhaUsuario">Senha</label>
                                    <input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario" placeholder="Senha">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="statusUsuario">Status</label>
                                    <select class="custom-select mr-sm-2" name="statusUsuario" id="statusUsuario">
                                        <option value="0">Desativado</option>
                                        <option selected value="1">Ativado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="emailUsuario">E-mail</label>
                                    <input type="email" class="form-control" name="emailUsuario" id="emailUsuario" placeholder="E-mail" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- ADD -->
        <div class="modal fade" id="addUsuario" tabindex="-1" role="dialog" aria-labelledby="addUsuario" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div id="resultAddUser"></div>
                        <form id="formAddUsuario" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="addNomeUsuario">Nome</label>
                                    <input type="text" class="form-control" name="addNomeUsuario" id="addNomeUsuario" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="addSenhaUsuario">Senha</label>
                                    <input type="password" class="form-control" name="addSenhaUsuario" id="addSenhaUsuario" placeholder="Senha" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="addStatusUsuario">Status</label>
                                    <select class="custom-select mr-sm-2" name="addStatusUsuario" id="addStatusUsuario">
                                        <option value="0">Desativado</option>
                                        <option selected value="1">Ativado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="addEmailUsuario">E-mail</label>
                                    <input type="email" class="form-control" name="addEmailUsuario" id="addEmailUsuario" placeholder="E-mail" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

         <!-- Acesso -->
         <div class="modal fade" id="addAcessoModal" tabindex="-1" role="dialog" aria-labelledby="addAcesso" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Acesso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div id="resultAddAcesso"></div>
                        <form id="formAddAcesso" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="acessoNome">Usuários Disponiveis</label>
                                    <?php
                                        if($user != null){
                                    ?>
                                            <select id="selectAcesso" class="custom-select mr-sm-2" name="acessoNome" required>
                                                    <option value="">Selecione</option>
                                    <?php
                                            foreach($user as $us){
                                    ?>
                                                
                                                    <option value="<?php echo $us['idusuario'];?>"><?php echo $us['nome'];?></option>
                                    <?php
                                            }
                                    ?>
                                            </select>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                            <?php
                                if($cam != null){
                            ?>
                                <div class="form-group col-md-12">
                                    <label for="statusUsuario">Câmeras</label>
                                    <br />

                                    <select id="selectCamAcesso" class="custom-select mr-sm-2" name="acessoCamera" required>
                                                    <option value="">Selecione</option>
                                    <?php
                                    foreach($cam as $ca){
                                    ?>
                                        <option value="<?php echo $ca['idcamera'];?>"><?php echo $ca['nome'];?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="dataInicio">Data e Hora Inicio Inicio</label>
                                    <div class="col-10">
                                        <?php
                                            date_default_timezone_set('America/Sao_Paulo');
                                            $date = date("Y-m-d");
                                            $time = date("H:i");
                                        ?>
                                        <input class="form-control" type="datetime-local" name="dataInicio" value="<?php echo $date."T".$time;?>" id="dataInicio">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="dataInicio">Data e Hora Inicio Fim</label>
                                    <div class="col-10">
                                        <input class="form-control" type="datetime-local" name="dataFim" id="dataFim">
                                    </div>
                                </div>
                            <?php
                                }else{
                                    echo '
                                    <div class="alert alert-dark" role="alert">
                                        Não há câmeras cadastradas!
                                    </div>';
                                }
                            ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- REMOVE ACESSO -->
        <div class="modal fade" id="removeAcesso" tabindex="-1" role="dialog" aria-labelledby="removeAcessoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeAcessoLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="resultRemoveAcess"></div>
                    <form id="formRemoveAcess">
                        <input type="hidden" name="idUserRemoveAcess" id="idUserRemoveAcess" />
                        <input type="hidden" name="idCamRemoveAcess" id="idCamRemoveAcess" />
                        <h4>Deseja remover está câmera?</h4>
                        <button type="submit" class="btn btn-danger float-right">Sim</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </div>
 <?php
 /** Chamada do template de Rodapé */
 include_once 'parts/footer.php';
}else{
    header("Location: login.php");
}
?>