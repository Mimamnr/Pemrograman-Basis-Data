/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - db_karyawan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_karyawan` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `db_karyawan`;

/*Table structure for table `tb_karyawan` */

DROP TABLE IF EXISTS `tb_karyawan`;

CREATE TABLE `tb_karyawan` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `kode_jabatan` int(1) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `gaji` int(100) DEFAULT NULL,
  `gaji_bersih` int(100) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `kode_divisi` int(1) NOT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_karyawan` */

insert  into `tb_karyawan`(`no`,`nik`,`nama_karyawan`,`kode_jabatan`,`jabatan`,`gaji`,`gaji_bersih`,`tgl_masuk`,`kode_divisi`,`divisi`) values 
(30,'10121001','Alfonso',1,'Technical Support',5000000,4950000,'2001-01-01',1,'Staff'),
(31,'10121002','Bambang',2,'Accounting',4500000,4455000,'2002-02-02',2,'Umum'),
(32,'10121003','Cecep',1,'Technical Support',5000000,4950000,'2003-03-03',2,'Umum'),
(33,'10121004','Dono',2,'Accounting',4500000,4455000,'2004-04-04',1,'Staff');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `level` enum('admin','user','superuser') DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`no`,`nik`,`nama_karyawan`,`level`,`password`) values 
(9,'admin','admin','admin','admin'),
(10,'user','user','user','user');

/* Trigger structure for table `tb_karyawan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_divisi_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_divisi_insert` BEFORE INSERT ON `tb_karyawan` FOR EACH ROW 
BEGIN
    IF NEW.kode_divisi = 1 THEN
        SET NEW.divisi = 'Staff';
    ELSEIF NEW.kode_divisi = 2 THEN
        SET NEW.divisi = 'Umum';
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `tb_karyawan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_jabatan_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_jabatan_insert` BEFORE INSERT ON `tb_karyawan` FOR EACH ROW 
BEGIN
    IF NEW.kode_jabatan = 1 THEN
        SET NEW.jabatan = 'Technical Support';
        Set NEW.gaji = 5000000;
        set NEW.gaji_bersih = NEW.gaji - (NEW.gaji * 0.01);
    ELSEIF NEW.kode_jabatan = 2 THEN
        SET NEW.jabatan = 'Accounting';
        SET NEW.gaji = 4500000;
        SET NEW.gaji_bersih = NEW.gaji - (NEW.gaji * 0.01);
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `tb_karyawan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_jabatan_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_jabatan_update` BEFORE UPDATE ON `tb_karyawan` FOR EACH ROW 
BEGIN
    IF NEW.kode_jabatan = 1 THEN
        SET NEW.jabatan = 'Technical Support';
        Set NEW.gaji = 5000000;
        set NEW.gaji_bersih = NEW.gaji - (NEW.gaji * 0.01);
    ELSEIF NEW.kode_jabatan = 2 THEN
        SET NEW.jabatan = 'Accounting';
        SET NEW.gaji = 4500000;
        SET NEW.gaji_bersih = NEW.gaji - (NEW.gaji * 0.01);
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `tb_karyawan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_divisi_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_divisi_update` BEFORE UPDATE ON `tb_karyawan` FOR EACH ROW 
BEGIN
    IF NEW.kode_divisi = 1 THEN
        SET NEW.divisi = 'Staff';
    ELSEIF NEW.kode_divisi = 2 THEN
        SET NEW.divisi = 'Umum';
    END IF;
END */$$


DELIMITER ;

/* Procedure structure for procedure `gaji_pegawai` */

/*!50003 DROP PROCEDURE IF EXISTS  `gaji_pegawai` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `gaji_pegawai`()
BEGIN
	SELECT nik, nama_karyawan, gaji, gaji_bersih
	FROM tb_karyawan;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
