<?php
session_start();
if(isset($_SESSION['dados']) && !empty($_SESSION['dados'])){
 /** Chamada do template de Cabeçario */
 include_once 'parts/header.php';

 require_once 'config.php';
 require_once 'classes/camera.php';
 ?>
    <div class="wrapper">
            <!-- Page Content Holder -->
            <div id="contentUser">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <img src="assets/images/logo.png" alt="Nobre Velórios" height="80" width="auto">
                        </div>
                        <a href="sair.php" class="btn btn-secondary">Sair</a>
                    </div>
                </nav>

                <section class="row-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 mt-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://g1.ipcamlive.com/player/snapshot.php?alias=5acf7bc678018">
                                    <div class="card-block">
                                        <h4 class="card-title">Câmera 1</h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="badge badge-success">Disponivel</span>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button class="btn btn-info btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#cameraLive" 
                                                        data-alias="" 
                                                        data-nome=""
                                                        >Ver</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://g1.ipcamlive.com/player/snapshot.php?alias=5acf7bc678018">
                                    <div class="card-block">
                                        <h4 class="card-title">Câmera 3</h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="badge badge-success">Liberada</span>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button class="btn btn-info btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#cameraLive" 
                                                        data-alias="" 
                                                        data-nome=""
                                                        >Ver</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://g1.ipcamlive.com/player/snapshot.php?alias=5acf7bc678018">
                                    <div class="card-block">
                                        <h4 class="card-title">Câmera 4</h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="badge badge-danger">Não Liberada</span>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button class="btn btn-info btn-sm disabled" 
                                                        data-toggle="modal" 
                                                        data-target="#cameraLive" 
                                                        data-alias="" 
                                                        data-nome=""
                                                        disable
                                                        >Ver</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div> 
        </div>
 <?php
 /** Chamada do template de Rodapé */
 include_once 'parts/footer.php';
}else{
    header("Location: login.php");
}
?>