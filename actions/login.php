<?php
session_start();

//Rquisitando arquivo de configuração
require_once '../config.php';
require_once '../classes/usuario.php';

//Pegando dados passados por AJAX
$login = addslashes($_POST['login']);	
$senha = addslashes($_POST['senha']);

//Instancia da classe usuario

$usuario = new Usuario();

$user = $usuario->verificaLogin($login,$senha);

if ($user != null) {
    if ($user['status'] != 0) {
        $_SESSION['dados'] = $user;
        if($user['tipo'] == 0){
            echo '<script type="text/javascript">window.location.href = "index.php";</script>';
        }else{
            echo '<script type="text/javascript">window.location.href = "usuario.php";</script>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Falha ao efetuar login. Usuário desativado.</div>';
    }
} else {
    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Falha ao efetuar login. Usuário ou Senha Inválidos.</div>';
}
