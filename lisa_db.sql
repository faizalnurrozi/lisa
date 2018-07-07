/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : lisa_db

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2018-07-07 10:26:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id_karyawan` varchar(30) NOT NULL,
  `id_jabatan` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('1461505163', '', 'Faizal Nur Rozi', 'Jl Petemon 2 No. 77', '081294307606', 'faizalnurrozi@gmail.com', 'L', 'cirebon', '1995-12-31', '');

-- ----------------------------
-- Table structure for perangkat
-- ----------------------------
DROP TABLE IF EXISTS `perangkat`;
CREATE TABLE `perangkat` (
  `id_perangkat` varchar(30) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_perangkat_kategori` varchar(30) DEFAULT NULL,
  `penggunaan_daya` int(7) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `status` enum('JALAN','BERHENTI') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perangkat
-- ----------------------------
INSERT INTO `perangkat` VALUES ('5B3BC2A206321', 'Perangkat Pertama', '5B3BC2005F0A3', '110', './uploads/cc7f11f720dc29f997608221cd45a94a.jpg', 'JALAN');
INSERT INTO `perangkat` VALUES ('5B3BC2D802927', 'Perangkat Kedua', '5B3BC2005F0A3', '120', './uploads/932b25091831d8435fbcc397bcd1c315.png', 'JALAN');
INSERT INTO `perangkat` VALUES ('5B3BC3091E38E', 'Perangkat Ketiga', '5B3BC1F22DC75', '100', './uploads/02c73014524d2fbae7a37d82d9bc2a57.jpeg', 'JALAN');

-- ----------------------------
-- Table structure for perangkat_detail
-- ----------------------------
DROP TABLE IF EXISTS `perangkat_detail`;
CREATE TABLE `perangkat_detail` (
  `id_perangkat_detail` int(7) NOT NULL AUTO_INCREMENT,
  `id_perangkat` varchar(30) DEFAULT NULL,
  `waktu_awal` char(6) DEFAULT NULL,
  `waktu_akhir` char(6) DEFAULT NULL,
  PRIMARY KEY (`id_perangkat_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perangkat_detail
-- ----------------------------
INSERT INTO `perangkat_detail` VALUES ('98', '5B3BC2D802927', '12:00', '23:00');
INSERT INTO `perangkat_detail` VALUES ('99', '5B3BC2D802927', '14:00', '23:00');
INSERT INTO `perangkat_detail` VALUES ('100', '5B3BC2D802927', '15:00', '23:00');
INSERT INTO `perangkat_detail` VALUES ('101', '5B3BC2D802927', '16:00', '23:00');
INSERT INTO `perangkat_detail` VALUES ('102', '5B3BC3091E38E', '02:00', '23:00');
INSERT INTO `perangkat_detail` VALUES ('103', '5B3BC3091E38E', '03:00', '23:00');
INSERT INTO `perangkat_detail` VALUES ('104', '5B3BC3091E38E', '11:00', '23:00');
INSERT INTO `perangkat_detail` VALUES ('105', '5B3BC3091E38E', '12:00', '23:00');
INSERT INTO `perangkat_detail` VALUES ('106', '5B3BC2A206321', '01:00', '23:59');
INSERT INTO `perangkat_detail` VALUES ('107', '5B3BC2A206321', '03:00', '23:00');

-- ----------------------------
-- Table structure for perangkat_kategori
-- ----------------------------
DROP TABLE IF EXISTS `perangkat_kategori`;
CREATE TABLE `perangkat_kategori` (
  `id_perangkat_kategori` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perangkat_kategori
-- ----------------------------
INSERT INTO `perangkat_kategori` VALUES ('5B3BC1F22DC75', 'Ruang Tamu');
INSERT INTO `perangkat_kategori` VALUES ('5B3BC1F9248B7', 'Ruang Tengah');
INSERT INTO `perangkat_kategori` VALUES ('5B3BC2005F0A3', 'Kamar Tidur');
INSERT INTO `perangkat_kategori` VALUES ('5B3BC20709777', 'Kamar Mandi');
INSERT INTO `perangkat_kategori` VALUES ('5B3BC20CA1572', 'Dapur');
INSERT INTO `perangkat_kategori` VALUES ('5B3BC2137E69C', 'Teras');
INSERT INTO `perangkat_kategori` VALUES ('5B3BC21A13808', 'Halaman');

-- ----------------------------
-- Table structure for token_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `token_transaksi`;
CREATE TABLE `token_transaksi` (
  `id_token_transaksi` varchar(30) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `biaya_admin` double DEFAULT NULL,
  `pjj` double DEFAULT NULL,
  `nilai_pjj` double DEFAULT NULL,
  `biaya_materai` double DEFAULT NULL,
  `nilai_token` double DEFAULT NULL,
  `penambahan_daya` double DEFAULT NULL,
  `biaya` double DEFAULT NULL,
  PRIMARY KEY (`id_token_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of token_transaksi
-- ----------------------------
INSERT INTO `token_transaksi` VALUES ('5B3CDFDD8370D', '2018-07-04', '0', '8', '25462.96', '3000', '249537.04', '170.07', '275000');
INSERT INTO `token_transaksi` VALUES ('5B3CDFE84ED76', '2018-07-04', '0', '8', '9259.26', '0', '90740.74', '61.84', '100000');

-- ----------------------------
-- Table structure for transaksi_perangkat
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_perangkat`;
CREATE TABLE `transaksi_perangkat` (
  `id_transaksi_perangkat` int(7) NOT NULL AUTO_INCREMENT,
  `id_token_transaksi` varchar(30) DEFAULT NULL,
  `id_perangkat` varchar(30) DEFAULT NULL,
  `waktu_awal` char(6) DEFAULT NULL,
  `waktu_akhir` char(6) DEFAULT NULL,
  `penambahan_daya` double DEFAULT NULL,
  `penggunaan_daya` double DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_perangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_perangkat
-- ----------------------------
INSERT INTO `transaksi_perangkat` VALUES ('2', '5B3CDFDD8370D', null, null, null, '170.07', null);
INSERT INTO `transaksi_perangkat` VALUES ('3', '5B3CDFE84ED76', null, null, null, '61.84', null);
INSERT INTO `transaksi_perangkat` VALUES ('8', null, '5B3BC3091E38E', '02:00', '04:00', null, '0.2');
INSERT INTO `transaksi_perangkat` VALUES ('9', null, '5B3BC3091E38E', '03:00', '05:00', null, '0.2');
INSERT INTO `transaksi_perangkat` VALUES ('10', null, '5B3BC3091E38E', '11:00', '11:30', null, '0.05');
INSERT INTO `transaksi_perangkat` VALUES ('11', null, '5B3BC3091E38E', '12:00', '12:30', null, '0.05');
INSERT INTO `transaksi_perangkat` VALUES ('12', null, '5B3BC2D802927', '12:00', '13:00', null, '0.12');
INSERT INTO `transaksi_perangkat` VALUES ('13', null, '5B3BC2D802927', '14:00', '15:00', null, '0.12');
INSERT INTO `transaksi_perangkat` VALUES ('14', null, '5B3BC2D802927', '15:00', '16:00', null, '0.12');
INSERT INTO `transaksi_perangkat` VALUES ('15', null, '5B3BC2D802927', '16:00', '17:00', null, '0.12');
INSERT INTO `transaksi_perangkat` VALUES ('16', null, '5B3BC2D802927', '12:00', '23:00', null, '1.32');
INSERT INTO `transaksi_perangkat` VALUES ('17', null, '5B3BC2D802927', '14:00', '23:00', null, '1.08');
INSERT INTO `transaksi_perangkat` VALUES ('18', null, '5B3BC2D802927', '15:00', '23:00', null, '0.96');
INSERT INTO `transaksi_perangkat` VALUES ('19', null, '5B3BC2D802927', '16:00', '23:00', null, '0.84');
INSERT INTO `transaksi_perangkat` VALUES ('20', null, '5B3BC3091E38E', '02:00', '23:00', null, '2.1');
INSERT INTO `transaksi_perangkat` VALUES ('21', null, '5B3BC3091E38E', '03:00', '23:00', null, '2');
INSERT INTO `transaksi_perangkat` VALUES ('22', null, '5B3BC3091E38E', '11:00', '23:00', null, '1.2');
INSERT INTO `transaksi_perangkat` VALUES ('23', null, '5B3BC3091E38E', '12:00', '23:00', null, '1.1');
INSERT INTO `transaksi_perangkat` VALUES ('24', null, '5B3BC2A206321', '01:00', '23:59', null, '2.52816666663');
INSERT INTO `transaksi_perangkat` VALUES ('25', null, '5B3BC2A206321', '03:00', '23:00', null, '2.2');
INSERT INTO `transaksi_perangkat` VALUES ('26', null, '5B3BC2D802927', '12:00', '23:00', null, '1.32');
INSERT INTO `transaksi_perangkat` VALUES ('27', null, '5B3BC2D802927', '14:00', '23:00', null, '1.08');
INSERT INTO `transaksi_perangkat` VALUES ('28', null, '5B3BC2D802927', '15:00', '23:00', null, '0.96');
INSERT INTO `transaksi_perangkat` VALUES ('29', null, '5B3BC2D802927', '16:00', '23:00', null, '0.84');
INSERT INTO `transaksi_perangkat` VALUES ('30', null, '5B3BC3091E38E', '02:00', '23:00', null, '2.1');
INSERT INTO `transaksi_perangkat` VALUES ('31', null, '5B3BC3091E38E', '03:00', '23:00', null, '2');
INSERT INTO `transaksi_perangkat` VALUES ('32', null, '5B3BC3091E38E', '11:00', '23:00', null, '1.2');
INSERT INTO `transaksi_perangkat` VALUES ('33', null, '5B3BC3091E38E', '12:00', '23:00', null, '1.1');
INSERT INTO `transaksi_perangkat` VALUES ('34', null, '5B3BC2A206321', '01:00', '23:59', null, '2.52816666663');
INSERT INTO `transaksi_perangkat` VALUES ('35', null, '5B3BC2A206321', '03:00', '23:00', null, '2.2');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `usernames` varchar(50) NOT NULL,
  `passwords` varchar(50) NOT NULL,
  `status_user` enum('ADMIN','KEPALA_DIVISI','KARYAWAN') NOT NULL,
  PRIMARY KEY (`usernames`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1461505163', 'e3488b1f1a8aa4b5da82840400cb12b0', 'ADMIN');
SET FOREIGN_KEY_CHECKS=1;
