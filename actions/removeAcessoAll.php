<?php
session_start();

//Rquisitando arquivo de configuração
require_once '../config.php';
require_once '../classes/acesso.php';

//Pegando dados passados por AJAX
$acessoUser = addslashes($_POST['idUserRemoveAcessAll']);	

//Instancia da classe Acesso

$acesso = new Acesso();
$ace = $acesso->removeAcessoAll($acessoUser);

if($ace == true){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Acesso removido com sucesso!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}else{
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Não foi possivel remover seu acesso!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}