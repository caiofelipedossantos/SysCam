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
}