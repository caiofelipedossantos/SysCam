<?php
class Usuario{
    public function verificaLogin($login, $senha){
        //Global de Conexão
        global $pdo;
        $dados = array();

        $sql = $pdo->prepare("SELECT `idusuario`, `nome`,`status`, `tipo` FROM `usuario` WHERE nome = ? AND senha = md5(?);");
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
            $sql->bindValue(4,md5($senha));
            if($sql->execute()){
                return true;
            }else{
                return false;
            }
    }

    public function editUsuario($id, $nome, $senha, $status, $email){
        //Global de Conexão
        global $pdo;
        
        if($senha == null){
            $sql = $pdo->prepare("UPDATE `usuario` SET `nome` = ?, `email` = ?, `status` = ? WHERE `usuario`.`idusuario` = ?;");
            $sql->bindValue(1,$nome);
            $sql->bindValue(2,$email);
            $sql->bindValue(3,$status);
            $sql->bindValue(4,$id);
            if($sql->execute()){
                return true;
            }else{
                return false;
            }
        }else{
            $sql = $pdo->prepare("UPDATE `usuario` SET `nome` = ?, `email` = ?, `status` = ?, `senha` = md5(?) WHERE `usuario`.`idusuario` = ?;");
            $sql->bindValue(1,$nome);
            $sql->bindValue(2,$email);
            $sql->bindValue(3,$status);
            $sql->bindValue(4,$senha);
            $sql->bindValue(5,$id);
            if($sql->execute()){
                return true;
            }else{
                return false;
            }
        }
        
    }
}