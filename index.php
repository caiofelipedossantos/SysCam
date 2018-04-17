<?php
session_start();
if(isset($_SESSION['dados']) && !empty($_SESSION['dados'])){
 /** Chamada do template de Cabeçario */
 include_once 'parts/header.php';

 require_once 'config.php';
 require_once 'classes/camera.php';
 require_once 'classes/usuario.php';
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
                                                            <span>
                                                                <?php 
                                                                    if($c['status'] == 1){
                                                                        echo '<span class="badge badge-success">Ativa</span>';
                                                                    }else{
                                                                        echo '<span class="badge badge-danger">Desativada</span>';
                                                                    }
                                                                ?>
                                                            </span>
                                                            <button class="btn btn-info float-right btn-sm" data-toggle="modal" data-target="#cameraLive" data-alias="<?php echo $c['alias'] ?>" data-nome="<?php echo $c['nome'] ?>">Ver</button>
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
                                            <button type="button" id="addCameraButton" class="btn btn-success" data-toggle="modal" data-target="#AddCamera" ><span><i class="fa fa-plus"></i></span> Usuário</button>
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
                                                <div class="col-md-6 mt-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
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
                                                            <!--<button class="btn btn-info float-right btn-sm" data-toggle="modal" data-target="#cameraLive" data-alias="<?php echo $c['alias'] ?>" data-nome="<?php echo $c['nome'] ?>">Ver</button>-->
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
                                    <select class="custom-select mr-sm-2" name="status" id="camDiponivel">
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
 <?php
 /** Chamada do template de Rodapé */
 include_once 'parts/footer.php';
}else{
    header("Location: login.php");
}
?>