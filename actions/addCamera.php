<?php
session_start();

//Rquisitando arquivo de configuração
require_once '../config.php';
require_once '../classes/camera.php';

//Pegando dados passados por AJAX
$alias = addslashes($_POST['alias']);	
$nome = addslashes($_POST['nome']);
$endereco = addslashes($_POST['endereco']);
$screenshot = addslashes($_POST['screenshot']);
$status = addslashes($_POST['status']);

//Instancia da classe usuario

$camera = new Camera();

$cam = $camera->addCamera($alias, $nome, $endereco, $screenshot, $status);

if($cam == true){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sua câmera foi cadastrada com sucesso!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}else{
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Não foi possivel cadastrar sua câmera!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
