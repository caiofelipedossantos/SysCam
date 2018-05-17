<?php
session_start();

//Rquisitando arquivo de configuração
require_once '../config.php';
require_once '../classes/usuario.php';

//Pegando dados passados por AJAX
$id = addslashes($_POST['idUserRemove']);	

//Instancia da classe usuario

$usuario = new Usuario();

$user = $usuario->deleteUsuario($id);

if($user == true){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Usuário deletado com sucesso!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}else{
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Não foi possivel deletar o usuário!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}