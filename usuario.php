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
                                            <input type="hidden" id="start" value="<?php echo $ace['data_inicio'];?>" />
                                            <input type="hidden" id="end" value="<?php echo $ace['data_fim'];?>" />
                                            <input type="hidden" id="today" value="<?php echo date("Y-m-d H:i:s");?>" />
                                            <div class="progress" style="height: 15px;">
                                                
                                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <script>
                                                var temp;
                                                var ini = document.getElementById('start').value;
                                                var fim = document.getElementById('end').value;
                                                var ago = document.getElementById('today').value;
                                                ini = ini.split("-");
                                                temp = ini[2].split(':');

                                                var start = new Date(ini[0], ini[1] - 1, ini[2],17,23,00), // Jan 1, 2015
                                                end = new Date(2018, 3, 24,17,25,00), // June 24, 2015
                                                today = new Date(), // April 23, 2015
                                                p = Math.round(((today - start) / (end - start)) * 100) + '%';
                                                console.log(temp);
                                            // Update the progress bar
                                             //$('.bar').css("width", p).after().append(p);
                                            </script>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <?php
                                                    if($ace['status'] == 1 && date("Y-m-d H:i") >= $ace['data_inicio'] && date("Y-m-d H:i") <= $ace['data_fim']){
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