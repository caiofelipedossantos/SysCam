<?php
class Usuario{
    public function verificaLogin($login, $senha){
        //Global de Conex達o
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
        //Global de Conex達o
        global $pdo;
        $dados = array();

        $sql = $pdo->prepare("SELECT `idusuario`, `nome`, `status` FROM `usuario` WHERE `tipo`= 1");
        $sql->execute();
        if($sql->rowCount() > 0):
            $dados = $sql->fetchAll();
        endif;
        return $dados;
    }

    public function addUsuario($nome, $status, $senha){
            //Global de Conex達o
            global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO `usuario`(`nome`, `status`, `senha`) VALUES (?,?,?);");
            $sql->bindValue(1,$nome);
            $sql->bindValue(2,$status);
            $sql->bindValue(3,md5($senha));
            if($sql->execute()){
                return true;
            }else{
                return false;
            }
    }

    public function editUsuario($id, $nome, $senha, $status){
        //Global de Conex達o
        global $pdo;
        
        if($senha == null){
            $sql = $pdo->prepare("UPDATE `usuario` SET `nome` = ?, `status` = ? WHERE `usuario`.`idusuario` = ?;");
            $sql->bindValue(1,$nome);
            $sql->bindValue(2,$status);
            $sql->bindValue(3,$id);
            if($sql->execute()){
                return true;
            }else{
                return false;
            }
        }else{
            $sql = $pdo->prepare("UPDATE `usuario` SET `nome` = ?, `status` = ?, `senha` = md5(?) WHERE `usuario`.`idusuario` = ?;");
            $sql->bindValue(1,$nome);
            $sql->bindValue(2,$status);
            $sql->bindValue(3,$senha);
            $sql->bindValue(4,$id);
            if($sql->execute()){
                return true;
            }else{
                return false;
            }
        }
        
    }
    
    public function deleteUsuario($id){
        //Global de Conexão
            global $pdo;
            
            $sql = $pdo->prepare("DELETE FROM `usuario` WHERE `idusuario` = ?;");
            $sql->bindValue(1,$id);
            if($sql->execute()){
                return true;
            }else{
                return false;
            }
    }
}