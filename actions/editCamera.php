<?php
session_start();

//Rquisitando arquivo de configuração
require_once '../config.php';
require_once '../classes/camera.php';

//Pegando dados passados por AJAX
$id = addslashes($_POST['editCamId']);	
$nome = addslashes($_POST['editCamNome']);
$status = addslashes($_POST['editCamStatus']);

//Instancia da classe camera

$camera = new Camera();

$cam = $camera->editCamera($id, $nome, $status);

if($cam == true){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Câmera alterada com sucesso!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}else{
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Não foi possivel alterar a sua câmera!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}