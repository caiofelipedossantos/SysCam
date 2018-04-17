<?php
class Usuario{
    public function verificaLogin($login, $senha){
        //Global de Conexão
        global $pdo;
        $dados = array();

        $sql = $pdo->prepare("SELECT `idusuario`, `nome`,`status`, `tipo` FROM `usuario` WHERE email = ? AND senha = md5(?);");
        $sql->bindValue(1,$login);
        $sql->bindValue(2,$senha);
        $sql->execute();
        if($sql->rowCount() > 0):
            $dados = $sql->fetch();
        endif;
        return $dados;
    }

    public function listUsuario(){
        //Global de Conexão
        global $pdo;
        $dados = array();

        $sql = $pdo->prepare("SELECT `idusuario`, `nome`, `email`, `status` FROM `usuario` WHERE `tipo`= 1");
        $sql->execute();
        if($sql->rowCount() > 0):
            $dados = $sql->fetchAll();
        endif;
        return $dados;
    }

    public function addUsuario($nome, $email, $status, $senha){
        //Global de Conexão
        global $pdo;
        
        $sql = $pdo->prepare("INSERT INTO `usuario`(`nome`, `email`, `status`, `senha`) VALUES (?,?,?,?);");
        $sql->bindValue(1,$nome);
        $sql->bindValue(2,$email);
        $sql->bindValue(3,$status);
        $sql->bindValue(4,$senha);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
}