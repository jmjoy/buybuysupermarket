-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: buybuy
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `by_address`
--

DROP TABLE IF EXISTS `by_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `by_address` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户的ID',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `zipcode` char(6) NOT NULL DEFAULT '' COMMENT '邮政编码',
  `area_ids` varchar(64) NOT NULL DEFAULT '' COMMENT '地区的ID序列',
  `area_names` varchar(128) NOT NULL DEFAULT '' COMMENT '地区的名称序列',
  `area_detail` varchar(64) NOT NULL DEFAULT '' COMMENT '详细地址',
  `is_del` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否删除',
  `modify_time` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收货地址表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `by_address`
--

LOCK TABLES `by_address` WRITE;
/*!40000 ALTER TABLE `by_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `by_area`
--

DROP TABLE IF EXISTS `by_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `by_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '逐渐',
  `name` varchar(16) NOT NULL DEFAULT '' COMMENT '地区名称',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上一级地区ID',
  `deepth` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '第几级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='地区表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `by_area`
--

LOCK TABLES `by_area` WRITE;
/*!40000 ALTER TABLE `by_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `by_category`
--

DROP TABLE IF EXISTS `by_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `by_category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(8) NOT NULL DEFAULT '' COMMENT '分类名称',
  `remark` tinytext COMMENT '备注',
  `pic_path` varchar(64) NOT NULL DEFAULT '' COMMENT '图标路径',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上一级分类ID',
  `deepth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '第几级分类',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `by_category`
--

LOCK TABLES `by_category` WRITE;
/*!40000 ALTER TABLE `by_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `by_commodity`
--

DROP TABLE IF EXISTS `by_commodity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `by_commodity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '商品名称',
  `remark` tinytext COMMENT '商品备注',
  `one_cate_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '第一级分类的ID',
  `two_cate_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '第二级分类的ID',
  `three_cate_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '第三级分类的ID',
  `cate_names` varchar(64) NOT NULL DEFAULT '' COMMENT '分类名称序列',
  `is_del` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否删除',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `modify_time` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `by_commodity`
--

LOCK TABLES `by_commodity` WRITE;
/*!40000 ALTER TABLE `by_commodity` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_commodity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `by_commodity_type`
--

DROP TABLE IF EXISTS `by_commodity_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `by_commodity_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `commodity_id` bigint(20) unsigned NOT NULL COMMENT '商品的ID',
  `type_name` varchar(64) NOT NULL DEFAULT '' COMMENT '商品详细类型名称',
  `price` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '这个类型的价格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品的详细类型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `by_commodity_type`
--

LOCK TABLES `by_commodity_type` WRITE;
/*!40000 ALTER TABLE `by_commodity_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_commodity_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `by_user`
--

DROP TABLE IF EXISTS `by_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `by_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `nickname` varchar(8) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `create_time` datetime DEFAULT NULL,
  `last_time` datetime DEFAULT NULL,
  `last_ip` varchar(64) NOT NULL DEFAULT '' COMMENT '最后登录的IP',
  `default_address` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '默认收货地址',
  `gender` enum('secret','male','female') NOT NULL DEFAULT 'secret' COMMENT '性别',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `by_user`
--

LOCK TABLES `by_user` WRITE;
/*!40000 ALTER TABLE `by_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `by_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-13 14:24:06
