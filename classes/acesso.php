<?php

class Acesso{
    public function listAcessos(){
        global $pdo;
        $dados = array();
        /*$sql = $pdo->prepare("
            SELECT user.nome, cam.idcamera,cam.nome,usercam.status,usercam.data_inicio,usercam.data_fim FROM usuario as user
            INNER JOIN usuario_camera AS usercam ON (user.idusuario = usercam.usuario_idusuario)
            INNER JOIN camera AS cam ON (cam.idcamera = usercam.camera_idcamera);
            ");*/
            $sql= $pdo->prepare("
            SELECT user.idusuario,user.nome, GROUP_CONCAT(cam.idcamera,'#',cam.nome,'#',cam.screenshot,'#',usercam.status,'#',usercam.data_inicio,'#',usercam.data_fim) AS cameras 
            FROM usuario as user
            INNER JOIN usuario_camera AS usercam ON (user.idusuario = usercam.usuario_idusuario)
            INNER JOIN camera AS cam ON (cam.idcamera = usercam.camera_idcamera)
            GROUP BY user.nome;
            ");
        $sql->execute();
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
        }
        return $dados;
    }

    public function viewAcess($id){
        global $pdo;
        $dados = array();
        $sql= $pdo->prepare("
        SELECT cam.alias,cam.nome,cam.screenshot,usercam.status,usercam.data_inicio,usercam.data_fim, DATEDIFF(usercam.data_fim, usercam.data_inicio) AS temporestante FROM usuario as user
        INNER JOIN usuario_camera AS usercam ON (user.idusuario = usercam.usuario_idusuario)
        INNER JOIN camera AS cam ON (cam.idcamera = usercam.camera_idcamera)
        WHERE user.idusuario = ?;
        ");
        $sql->bindValue(1,$id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
        }
        return $dados;
    }

    public function addAcesso($acessoNome,$acessoCamera,$dataInicio,$dataFim){
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO `usuario_camera` (`usuario_idusuario`, `camera_idcamera`, `data_inicio`, `data_fim`) VALUES (?, ?, ?, ?);");
        $sql->bindValue(1,$acessoNome);
        $sql->bindValue(2,$acessoCamera);
        $sql->bindValue(3,$dataInicio);
        $sql->bindValue(4,$dataFim);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function removeAcesso($acessoNome,$acessoCamera){
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM `usuario_camera` WHERE `usuario_idusuario` = ? AND `camera_idcamera` = ?;");
        $sql->bindValue(1,$acessoNome);
        $sql->bindValue(2,$acessoCamera);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
}