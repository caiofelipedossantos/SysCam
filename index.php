<?php
session_start();
if(isset($_SESSION['dados']) && !empty($_SESSION['dados'])){
 /** Chamada do template de Cabeçario */
 include_once 'parts/header.php';

 require_once 'config.php';
 require_once 'classes/camera.php';
 ?>
    <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="assets/images/logo.png" alt="Nobre Velórios" class="img-fluid">
                </div>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#menu" >Câmeras</a>
                    </li>
                    <li>
                        <a href="#menu">Usuários</a>
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

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <section class="row-section">
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
                                            <button type="button" class="btn btn-success"><span><i class="fa fa-plus"></i></span> Câmera</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 offset-md-1 row-block">
                                <div class="row">
                                    <?php
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
 <?php
 /** Chamada do template de Rodapé */
 include_once 'parts/footer.php';
}else{
    header("Location: login.php");
}
?>