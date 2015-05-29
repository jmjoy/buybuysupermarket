-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-05-29 16:08:12
-- 服务器版本： 5.6.24-0ubuntu2-log
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buybuy`
--

-- --------------------------------------------------------

--
-- 表的结构 `by_address`
--

CREATE TABLE IF NOT EXISTS `by_address` (
`id` bigint(20) unsigned NOT NULL COMMENT '主键',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户的ID',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `zipcode` char(6) NOT NULL DEFAULT '' COMMENT '邮政编码',
  `area_ids` varchar(64) NOT NULL DEFAULT '' COMMENT '地区的ID序列',
  `area_names` varchar(128) NOT NULL DEFAULT '' COMMENT '地区的名称序列',
  `area_detail` varchar(64) NOT NULL DEFAULT '' COMMENT '详细地址',
  `is_del` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否删除',
  `modify_time` datetime DEFAULT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收货地址表';

-- --------------------------------------------------------

--
-- 表的结构 `by_admin`
--

CREATE TABLE IF NOT EXISTS `by_admin` (
`id` tinyint(3) unsigned NOT NULL COMMENT '主键',
  `name` varchar(8) NOT NULL DEFAULT '' COMMENT '管理员账号',
  `password` char(40) NOT NULL DEFAULT '' COMMENT '密码'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `by_admin`
--

INSERT INTO `by_admin` (`id`, `name`, `password`) VALUES
(1, 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785');

-- --------------------------------------------------------

--
-- 表的结构 `by_area`
--

CREATE TABLE IF NOT EXISTS `by_area` (
`id` int(10) unsigned NOT NULL COMMENT '逐渐',
  `name` varchar(16) NOT NULL DEFAULT '' COMMENT '地区名称',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上一级地区ID',
  `deepth` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '第几级'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='地区表';

-- --------------------------------------------------------

--
-- 表的结构 `by_category`
--

CREATE TABLE IF NOT EXISTS `by_category` (
`id` mediumint(8) unsigned NOT NULL COMMENT '主键',
  `name` varchar(8) NOT NULL DEFAULT '' COMMENT '分类名称',
  `remark` tinytext COMMENT '备注',
  `pic_path` varchar(64) NOT NULL DEFAULT '' COMMENT '图标路径',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上一级分类ID',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '第几级分类'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

--
-- 转存表中的数据 `by_category`
--

INSERT INTO `by_category` (`id`, `name`, `remark`, `pic_path`, `parent_id`, `depth`) VALUES
(1, '一级分类A', '', '2015/0529/55680fa724080.jpg', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `by_commodity`
--

CREATE TABLE IF NOT EXISTS `by_commodity` (
`id` bigint(20) NOT NULL COMMENT '主键',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '商品名称',
  `remark` tinytext COMMENT '商品备注',
  `one_cate_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '第一级分类的ID',
  `two_cate_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '第二级分类的ID',
  `three_cate_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '第三级分类的ID',
  `cate_names` varchar(64) NOT NULL DEFAULT '' COMMENT '分类名称序列',
  `is_del` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否删除',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `modify_time` datetime DEFAULT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品表';

-- --------------------------------------------------------

--
-- 表的结构 `by_commodity_type`
--

CREATE TABLE IF NOT EXISTS `by_commodity_type` (
`id` bigint(20) unsigned NOT NULL COMMENT '主键',
  `commodity_id` bigint(20) unsigned NOT NULL COMMENT '商品的ID',
  `type_name` varchar(64) NOT NULL DEFAULT '' COMMENT '商品详细类型名称',
  `price` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '这个类型的价格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品的详细类型表';

-- --------------------------------------------------------

--
-- 表的结构 `by_user`
--

CREATE TABLE IF NOT EXISTS `by_user` (
`id` int(10) unsigned NOT NULL COMMENT '主键',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `nickname` varchar(8) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `password` char(40) NOT NULL DEFAULT '' COMMENT '密码',
  `create_time` datetime DEFAULT NULL,
  `last_time` datetime DEFAULT NULL,
  `last_ip` varchar(64) NOT NULL DEFAULT '' COMMENT '最后登录的IP',
  `default_address` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '默认收货地址',
  `gender` enum('secret','male','female') NOT NULL DEFAULT 'secret' COMMENT '性别'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `by_address`
--
ALTER TABLE `by_address`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `by_admin`
--
ALTER TABLE `by_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `by_area`
--
ALTER TABLE `by_area`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `by_category`
--
ALTER TABLE `by_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `by_commodity`
--
ALTER TABLE `by_commodity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `by_commodity_type`
--
ALTER TABLE `by_commodity_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `by_user`
--
ALTER TABLE `by_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `phone` (`phone`), ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `by_address`
--
ALTER TABLE `by_address`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- AUTO_INCREMENT for table `by_admin`
--
ALTER TABLE `by_admin`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `by_area`
--
ALTER TABLE `by_area`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '逐渐';
--
-- AUTO_INCREMENT for table `by_category`
--
ALTER TABLE `by_category`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `by_commodity`
--
ALTER TABLE `by_commodity`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- AUTO_INCREMENT for table `by_commodity_type`
--
ALTER TABLE `by_commodity_type`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- AUTO_INCREMENT for table `by_user`
--
ALTER TABLE `by_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
