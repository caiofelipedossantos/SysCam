<?php
//Rquisitando arquivo de configuração
require_once '../config.php';

//Pegando dados passados por AJAX
$login = $_POST['login'];	
$senha = $_POST['senha'];

//Global de Conexão
global $pdo;
$dados = array();

$sql = $pdo->prepare("SELECT `idusuario`, `nome`, `email`, `status`, `senha`, `tipo`, `data_cadastro` FROM `usuario` WHERE email = ? AND senha = md5(?);");
$sql->bindValue(1,$login);
$sql->bindValue(2,$senha);
$sql->execute();
if($sql->rowCount() > 0):
    $dados = $sql->fetch();
    echo $dados['nome'];
endif;