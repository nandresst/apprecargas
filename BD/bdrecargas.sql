/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733 (5.7.33)
 Source Host           : localhost:3306
 Source Schema         : bdrecargas

 Target Server Type    : MySQL
 Target Server Version : 50733 (5.7.33)
 File Encoding         : 65001

 Date: 25/12/2022 18:02:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_cliente_ns
-- ----------------------------
DROP TABLE IF EXISTS `tb_cliente_ns`;
CREATE TABLE `tb_cliente_ns`  (
  `PlayerID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Apellidos` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Dni` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Celular` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PlayerID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_cliente_ns
-- ----------------------------
INSERT INTO `tb_cliente_ns` VALUES (1, 'Raul Jose', 'Ponce Marca', '46455884', NULL);
INSERT INTO `tb_cliente_ns` VALUES (2, 'Marco Antonio', 'Linares Dias', '44780087', NULL);

-- ----------------------------
-- Table structure for tb_operador_ns
-- ----------------------------
DROP TABLE IF EXISTS `tb_operador_ns`;
CREATE TABLE `tb_operador_ns`  (
  `OperadorID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Nombres` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Apellidos` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Usuario` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Contrasenia` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`OperadorID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_operador_ns
-- ----------------------------
INSERT INTO `tb_operador_ns` VALUES (1, 'Operador', 'Daniel Alex', 'Ponce Rojas', 'dponce', 'dponce', 1);
INSERT INTO `tb_operador_ns` VALUES (2, 'Supervisor', 'Alberto Joel', 'Peralta Valdivia', 'aperalta', 'aperalta', 1);

-- ----------------------------
-- Table structure for tb_recarga_ns
-- ----------------------------
DROP TABLE IF EXISTS `tb_recarga_ns`;
CREATE TABLE `tb_recarga_ns`  (
  `RecargaID` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoVoucher` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `BancoVoucher` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NroOperacionVoucher` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `FechaHoraVoucher` datetime NOT NULL,
  `MontoVoucher` decimal(10, 2) NOT NULL,
  `OperadorID` int(11) NOT NULL,
  `PlayerID` int(11) NOT NULL,
  `FechaHoraRegistro` datetime NOT NULL,
  `Observacion` varchar(400) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Medio` tinyint(4) NULL DEFAULT NULL,
  `MedioInfo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`RecargaID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_recarga_ns
-- ----------------------------
INSERT INTO `tb_recarga_ns` VALUES (1, 'cod', '1', '987', '2022-12-24 10:11:00', 20.00, 1, 1, '2022-12-24 13:15:54', NULL, 1, '988776335');
INSERT INTO `tb_recarga_ns` VALUES (2, 'VO-923882', '2', 'OP-7655325', '2022-12-21 13:14:00', 40.00, 1, 1, '2022-12-24 13:17:59', NULL, 2, NULL);
INSERT INTO `tb_recarga_ns` VALUES (3, 'VO9888', '3', 'OP8766', '2022-12-16 08:50:00', 40.00, 1, 2, '2022-12-24 13:48:51', NULL, 3, 'alberto@gmail.com');
INSERT INTO `tb_recarga_ns` VALUES (4, 'VO999', '3', 'OP444', '2022-11-09 10:53:00', 16.00, 1, 2, '2022-12-24 13:51:19', NULL, 2, NULL);
INSERT INTO `tb_recarga_ns` VALUES (5, 'vo-87665', '3', 'OP-24241', '2022-12-31 08:55:00', 150.00, 2, 1, '2022-12-24 13:52:38', '', 1, '988772233');
INSERT INTO `tb_recarga_ns` VALUES (6, 'VO34567', '3', 'OP-xxx', '2022-12-02 11:27:00', 240.00, 1, 1, '2022-12-24 14:27:36', 'Falta Regularizar Nro de Operacion', 3, 'lukaro@gmail.com');
INSERT INTO `tb_recarga_ns` VALUES (7, 'VO9111', '2', 'OP-7688', '2022-12-15 19:44:00', 175.00, 1, 1, '2022-12-24 21:43:17', 'Sin Observaciones', 1, '988776655');
INSERT INTO `tb_recarga_ns` VALUES (9, 'VO-1111', '2', 'OP-71212', '2022-12-14 18:21:00', 490.00, 2, 1, '2022-12-25 20:18:36', 'Ninguna', 1, '98899999');
INSERT INTO `tb_recarga_ns` VALUES (10, 'Vrrty-77', '5', 'OP333', '2022-12-21 20:19:00', 230.00, 2, 1, '2022-12-25 21:15:48', 'PARA BANDO PICHINCHA', 1, '922779866');
INSERT INTO `tb_recarga_ns` VALUES (12, 'VO91111', '2', 'OP-45454545', '2022-12-08 19:47:00', 11.00, 2, 2, '2022-12-25 22:46:11', 'Sin Observaciones 2', 2, '9999999');
INSERT INTO `tb_recarga_ns` VALUES (13, 'VO0909', '5', 'OP-666', '2022-12-16 20:49:00', 110.00, 2, 1, '2022-12-25 22:46:57', 'OBS', 3, 'CORREO@HOTMAIL.COM');
INSERT INTO `tb_recarga_ns` VALUES (14, 'VO999', '3', 'OP-7655325', '2022-12-16 20:53:00', 22.00, 2, 1, '2022-12-25 22:50:49', '', 1, '');

-- ----------------------------
-- Procedure structure for sp_autenticar_login
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_autenticar_login`;
delimiter ;;
CREATE PROCEDURE `sp_autenticar_login`(vusuario varchar(40), vcontrasenia varchar(40))
BEGIN
			
			if(vusuario in (select Usuario from tb_operador_ns)) then 
						if(vusuario in (select Usuario from tb_operador_ns where Contrasenia=vcontrasenia and Estado=1)) then
							select OperadorID, Nombres, Apellidos, Tipo, "bienvenido" mensaje from tb_operador_ns where Usuario=vusuario and Contrasenia=vcontrasenia;
						else
							select 0 OperadorID, '' Nombres, '' Apellidos, '' Tipo, "Contrasenia incorrecta" Mensaje;
						end if;
			else
					select 0 OperadorID, '' Nombres, '' Apellidos, '' Tipo, "Usuario no Existe" Mensaje;
			end if;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_lista_recargas_cliente_ns
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_lista_recargas_cliente_ns`;
delimiter ;;
CREATE PROCEDURE `sp_lista_recargas_cliente_ns`(vplayerid int)
BEGIN
		select 
					(select Nombres from tb_cliente_ns where PlayerID=r.PlayerID) Nombres,
					(select Apellidos from tb_cliente_ns where PlayerID=r.PlayerID) Apellidos,
					(select Dni from tb_cliente_ns where PlayerID=r.PlayerID) Dni,
					 r.*
					 from tb_recarga_ns r where PlayerID=vplayerid
					order by RecargaID DESC limit 200; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_lista_recargas_general_ns
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_lista_recargas_general_ns`;
delimiter ;;
CREATE PROCEDURE `sp_lista_recargas_general_ns`()
BEGIN
		select 
					(select Nombres from tb_cliente_ns where PlayerID=r.PlayerID) Nombres,
					(select Apellidos from tb_cliente_ns where PlayerID=r.PlayerID) Apellidos,
					(select Dni from tb_cliente_ns where PlayerID=r.PlayerID) Dni,
					 r.*
					 from tb_recarga_ns r 		
		order by RecargaID DESC limit 200;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
