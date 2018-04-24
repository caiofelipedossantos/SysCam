<?php
session_start();

//Rquisitando arquivo de configuração
require_once '../config.php';
require_once '../classes/acesso.php';

//Pegando dados passados por AJAX
$acessoNome = addslashes($_POST['acessoNome']);	
$acessoCamera = addslashes($_POST['acessoCamera']);
$dataInicio = addslashes($_POST['dataInicio']);
$dataFim = addslashes($_POST['dataFim']);

//Instancia da classe usuario

$acesso = new Acesso();
//echo $acessoNome . "   " . $acessoCamera . "   " . $dataInicio . "   " . $dataFim;
$ace = $acesso->addAcesso($acessoNome,$acessoCamera,$dataInicio,$dataFim);

if($ace == true){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Acesso cadastrado com sucesso!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}else{
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Não foi possivel cadastrar seu acesso!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
