<?php
class Camera{
    public function listCamera(){
        global $pdo;
        $slq;
        $dados = array();

        $sql = $pdo->prepare("SELECT `idcamera`,`alias`, `nome`, `endereco`, `screenshot`, `status`,`data_cadastro` FROM `camera`;");
        $sql->execute();
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
        }
        return $dados;
    }
}