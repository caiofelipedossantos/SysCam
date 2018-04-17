-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 17-Abr-2018 às 05:05
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syscam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `camera`
--

DROP TABLE IF EXISTS `camera`;
CREATE TABLE IF NOT EXISTS `camera` (
  `idcamera` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcamera`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `camera`
--

INSERT INTO `camera` (`idcamera`, `nome`, `alias`, `endereco`, `screenshot`, `status`, `data_cadastro`) VALUES
(1, 'Vídeo de Teste', '5abd19476ade9', 'rtsp://wowzaec2demo.streamlock.net/vod/mp4:BigBuckBunny_115k.mov', 'http://g1.ipcamlive.com/player/snapshot.php?alias=5abd19476ade9', '1', '2018-04-17 03:30:35'),
(2, 'Câmera 1', '5acf7bc678018', 'rtsp://201.30.189.21:554/user=admin&password=admin&channel=1&stream=0.sdp?real_stream--rtp-caching=100', 'http://g1.ipcamlive.com/player/snapshot.php?alias=5acf7bc678018', '1', '2018-04-17 03:30:52'),
(3, 'Câmera 2', '5ad1087752257', 'rtsp://201.30.189.20:554/user=admin&password=&channel=1&stream=0.sdp?real_stream--rtp-caching=100', 'http://g1.ipcamlive.com/player/snapshot.php?alias=5ad1087752257', '1', '2018-04-17 03:31:01'),
(4, 'Câmera 3', '5ad108c187750', 'rtsp://201.30.189.19:554/user=admin&password=&channel=1&stream=0.sdp?real_stream--rtp-caching=100', 'http://g1.ipcamlive.com/player/snapshot.php?alias=5ad108c187750', '1', '2018-04-17 03:31:11'),
(5, 'Câmera 4', '5ad1091c76da4', 'rtsp://201.30.189.22:554/user=admin&password=&channel=1&stream=0.sdp?real_stream--rtp-caching=100', 'http://g1.ipcamlive.com/player/snapshot.php?alias=5ad1091c76da4', '1', '2018-04-17 03:31:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `senha` varchar(32) NOT NULL,
  `tipo` char(1) NOT NULL DEFAULT '1',
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `status`, `senha`, `tipo`, `data_cadastro`) VALUES
(1, 'Administrador', 'caio@w3connect.com.br', '1', '21232f297a57a5a743894a0e4a801fc3', '0', '2018-04-15 04:00:51'),
(3, 'Usuário', 'user@user.com.br', '1', 'ee11cbb19052e40b07aac0ca060c23ee', '1', '2018-04-17 04:48:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_camera`
--

DROP TABLE IF EXISTS `usuario_camera`;
CREATE TABLE IF NOT EXISTS `usuario_camera` (
  `usuario_idusuario` int(11) NOT NULL,
  `camera_idcamera` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `data_inicio` timestamp NOT NULL,
  `data_fim` timestamp NOT NULL,
  PRIMARY KEY (`usuario_idusuario`,`camera_idcamera`),
  KEY `fk_usuario_has_camera_camera1_idx` (`camera_idcamera`),
  KEY `fk_usuario_has_camera_usuario_idx` (`usuario_idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuario_camera`
--
ALTER TABLE `usuario_camera`
  ADD CONSTRAINT `fk_usuario_has_camera_camera1` FOREIGN KEY (`camera_idcamera`) REFERENCES `camera` (`idcamera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_camera_usuario` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
