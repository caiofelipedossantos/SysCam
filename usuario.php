<?php
session_start();
if(isset($_SESSION['dados']) && !empty($_SESSION['dados'])){
 /** Chamada do template de Cabeçario */
 include_once 'parts/header.php';

 require_once 'config.php';
 require_once 'classes/acesso.php';
 ?>
    <div class="wrapper">
            <!-- Page Content Holder -->
            <div id="contentUser">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <img class="mb-4" src="assets/images/logo.png" alt="" width="100%" height="80">
                        </div>
                        <a href="sair.php" class="btn btn-secondary">Sair</a>
                    </div>
                </nav>

                <section class="row-section">
                    <div class="container">
                        <div class="row">
                        <?php
                            $user_acess = new Acesso();
                            $acess = $user_acess->viewAcess($_SESSION['dados']['idusuario']);
                            if($acess != null){
                                foreach($acess as $ace){
                                    
                        ?>
                                <div class="col-md-3 mt-4">
                                    <div class="card">
                                        <img class="card-img-top" src="<?php echo $ace['screenshot']; ?>">
                                        <div class="card-block">
                                            <h4 class="card-title"><?php echo $ace['nome']; ?></h4>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <?php
                                                    if($ace['status'] == 1){
                                                        echo '<span class="badge badge-success">Liberada</span>';
                                                    }else{
                                                        echo '<span class="badge badge-danger">Não Liberada</span>';
                                                    }
                                                ?>
                                                    
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button class="btn btn-info btn-sm" 
                                                            data-toggle="modal" 
                                                            data-target="#cameraLive" 
                                                            data-alias="<?php echo $ace['alias']; ?>" 
                                                            data-nome="<?php echo $ace['nome']; ?>"
                                                            >Ver</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </div> 
        </div>

        <!-- MODAL LIVE -->
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