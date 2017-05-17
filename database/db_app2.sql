/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_app2

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-17 13:47:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('Admin', '1', '1494406650');
INSERT INTO `auth_assignment` VALUES ('Author', '3', '1494406650');
INSERT INTO `auth_assignment` VALUES ('Management', '2', '1494406650');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('Admin', '1', 'สำหรับการดูแลระบบ', null, null, '1494406650', '1494406650');
INSERT INTO `auth_item` VALUES ('Author', '1', 'สำหรับการเขียนบันทึกข้อมูล frontend', null, null, '1494406649', '1494406649');
INSERT INTO `auth_item` VALUES ('Management', '1', 'สำหรับจัดการข้อมูลผู้ใช้งานและบทความ', null, null, '1494406650', '1494406650');
INSERT INTO `auth_item` VALUES ('ManageUser', '1', 'สำหรับจัดการข้อมูลผู้ใช้งาน', null, null, '1494406649', '1494406649');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('Admin', 'Management');
INSERT INTO `auth_item_child` VALUES ('Management', 'Author');
INSERT INTO `auth_item_child` VALUES ('Management', 'ManageUser');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1494405956');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1494405960');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1494406208');

-- ----------------------------
-- Table structure for sys_department
-- ----------------------------
DROP TABLE IF EXISTS `sys_department`;
CREATE TABLE `sys_department` (
  `dep_id` smallint(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(200) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_department
-- ----------------------------
INSERT INTO `sys_department` VALUES ('0001', 'OPD');
INSERT INTO `sys_department` VALUES ('0002', 'IPD');
INSERT INTO `sys_department` VALUES ('0003', 'การพยาบาล');
INSERT INTO `sys_department` VALUES ('0004', 'เวชกิจฉุกเฉิน');
INSERT INTO `sys_department` VALUES ('0005', 'ทันตกรรม');
INSERT INTO `sys_department` VALUES ('0006', 'เวชศาสตร์ครอบครัว');
INSERT INTO `sys_department` VALUES ('0007', 'ชันสูตร');
INSERT INTO `sys_department` VALUES ('0008', 'X-ray');
INSERT INTO `sys_department` VALUES ('0009', 'กลุ่มการบริหารจัดการ');
INSERT INTO `sys_department` VALUES ('0010', 'แพทย์');
INSERT INTO `sys_department` VALUES ('0011', 'เภสัชกรรม');
INSERT INTO `sys_department` VALUES ('0012', 'เวชระเบียน/งานประกัน');
INSERT INTO `sys_department` VALUES ('0013', 'NCD');

-- ----------------------------
-- Table structure for sys_line
-- ----------------------------
DROP TABLE IF EXISTS `sys_line`;
CREATE TABLE `sys_line` (
  `id` tinyint(1) NOT NULL,
  `line_token` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_line
-- ----------------------------
INSERT INTO `sys_line` VALUES ('0', 'zFzYHRn0nwL3ot6Go4GTvlAaD42aUv4EAi4m2TIP4Yo');

-- ----------------------------
-- Table structure for sys_pname
-- ----------------------------
DROP TABLE IF EXISTS `sys_pname`;
CREATE TABLE `sys_pname` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL DEFAULT '',
  `sex` char(1) NOT NULL,
  `marrystatus` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`sex`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of sys_pname
-- ----------------------------
INSERT INTO `sys_pname` VALUES ('1', 'Miss', '2', null);
INSERT INTO `sys_pname` VALUES ('2', 'Mr.', '1', null);
INSERT INTO `sys_pname` VALUES ('3', 'Mrs.', '2', null);
INSERT INTO `sys_pname` VALUES ('4', 'คุณ', '2', null);
INSERT INTO `sys_pname` VALUES ('5', 'คุณหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('6', 'จ.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('7', 'จ.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('8', 'จ.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('9', 'จ.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('10', 'จ.ส.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('11', 'จ.ส.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('12', 'จ.ส.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('13', 'จ.ส.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('14', 'จ.ส.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('15', 'จ.ส.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('16', 'จ.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('17', 'จ.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('18', 'จ่าอากาศตรีหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('19', 'จ่าอากาศตรี', '1', null);
INSERT INTO `sys_pname` VALUES ('20', 'จ่าอากาศโทหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('21', 'จ่าอากาศโท', '1', null);
INSERT INTO `sys_pname` VALUES ('22', 'จ่าอากาศเอกหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('23', 'จ่าอากาศเอก', '1', null);
INSERT INTO `sys_pname` VALUES ('24', 'ด.ช.', '1', null);
INSERT INTO `sys_pname` VALUES ('25', 'ด.ญ.', '2', null);
INSERT INTO `sys_pname` VALUES ('26', 'ด.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('27', 'ด.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('28', 'ดร.', '1', null);
INSERT INTO `sys_pname` VALUES ('29', 'ท.พ.', '1', null);
INSERT INTO `sys_pname` VALUES ('30', 'น.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('31', 'น.ต.พ.ญ.', '2', null);
INSERT INTO `sys_pname` VALUES ('32', 'น.ต.ม.ล.', '1', null);
INSERT INTO `sys_pname` VALUES ('33', 'น.ต.ม.ล.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('34', 'น.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('35', 'น.พ.', '1', null);
INSERT INTO `sys_pname` VALUES ('36', 'น.ส.', '2', null);
INSERT INTO `sys_pname` VALUES ('37', 'น.อ.พิเศษ', '1', null);
INSERT INTO `sys_pname` VALUES ('38', 'น.อ.พิเศษหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('39', 'นช', '1', null);
INSERT INTO `sys_pname` VALUES ('40', 'นนส.', '1', null);
INSERT INTO `sys_pname` VALUES ('41', 'นนส.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('42', 'นรจ.', '1', null);
INSERT INTO `sys_pname` VALUES ('43', 'นรจ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('44', 'นรต.', '1', null);
INSERT INTO `sys_pname` VALUES ('45', 'นรต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('46', 'นักเรียนจ่าอากาศหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('47', 'นักเรียนจ่าอากาศ', '1', null);
INSERT INTO `sys_pname` VALUES ('48', 'นักเรียนนายเรืออากาศ', '1', null);
INSERT INTO `sys_pname` VALUES ('49', 'นักเรียนนายเรืออากาศหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('50', 'นาง', '2', null);
INSERT INTO `sys_pname` VALUES ('51', 'นาย', '1', null);
INSERT INTO `sys_pname` VALUES ('52', 'นาวาโท', '1', null);
INSERT INTO `sys_pname` VALUES ('53', 'นาวาโทหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('54', 'นาวาอากาศตรี', '1', null);
INSERT INTO `sys_pname` VALUES ('55', 'นาวาอากาศตรีหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('56', 'นาวาอากาศโท', '1', null);
INSERT INTO `sys_pname` VALUES ('57', 'นาวาอากาศโทหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('58', 'นาวาอากาศเอก', '1', null);
INSERT INTO `sys_pname` VALUES ('59', 'นาวาอากาศเอกหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('60', 'นาวาเอก', '1', null);
INSERT INTO `sys_pname` VALUES ('61', 'นาวาเอกหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('62', 'บาทหลวง', '1', null);
INSERT INTO `sys_pname` VALUES ('63', 'พ.จ.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('64', 'พ.จ.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('65', 'พ.จ.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('66', 'พ.จ.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('67', 'พ.จ.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('68', 'พ.จ.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('69', 'พ.ญ.', '2', null);
INSERT INTO `sys_pname` VALUES ('70', 'พ.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('71', 'พ.ต.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('72', 'พ.ต.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('73', 'พ.ต.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('74', 'พ.ต.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('75', 'พ.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('76', 'พ.ต.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('77', 'พ.ต.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('78', 'พ.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('79', 'พ.ท.น.พ.', '1', null);
INSERT INTO `sys_pname` VALUES ('80', 'พ.ท.น.พ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('81', 'พ.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('82', 'พ.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('83', 'พ.อ.พิเศษ', '1', null);
INSERT INTO `sys_pname` VALUES ('84', 'พ.อ.พิเศษหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('85', 'พ.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('86', 'พระ', '1', null);
INSERT INTO `sys_pname` VALUES ('87', 'พระครู', '1', null);
INSERT INTO `sys_pname` VALUES ('88', 'พระครูใบฎีกา', '1', null);
INSERT INTO `sys_pname` VALUES ('89', 'พระครูปลัด', '1', null);
INSERT INTO `sys_pname` VALUES ('90', 'พระปริยัติ', '1', null);
INSERT INTO `sys_pname` VALUES ('91', 'พระมหา', '1', null);
INSERT INTO `sys_pname` VALUES ('92', 'พระสมุห์', '1', null);
INSERT INTO `sys_pname` VALUES ('93', 'พระอธิการ', '1', null);
INSERT INTO `sys_pname` VALUES ('94', 'พล.ต', '1', null);
INSERT INTO `sys_pname` VALUES ('95', 'พล.ต.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('96', 'พล.ต.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('97', 'พล.ตหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('98', 'พล.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('99', 'พล.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('100', 'พล.ร.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('101', 'พล.ร.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('102', 'พล.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('103', 'พล.อ.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('104', 'พล.อ.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('105', 'พล.อ.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('106', 'พล.อ.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('107', 'พล.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('108', 'พล.อ.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('109', 'พล.อ.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('110', 'พลตำรวจ', '1', null);
INSERT INTO `sys_pname` VALUES ('111', 'พลตำรวจสมัคร', '1', null);
INSERT INTO `sys_pname` VALUES ('112', 'พลตำรวจสมัครหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('113', 'พลตำรวจสำรอง', '1', null);
INSERT INTO `sys_pname` VALUES ('114', 'พลตำรวจสำรองพิเศษ', '1', null);
INSERT INTO `sys_pname` VALUES ('115', 'พลตำรวจสำรองพิเศษหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('116', 'พลตำรวจสำรองหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('117', 'พลตำรวจหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('118', 'พลทหาร', '1', null);
INSERT INTO `sys_pname` VALUES ('119', 'พลทหารหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('120', 'พลฯทหารเรือ', '1', null);
INSERT INTO `sys_pname` VALUES ('121', 'พลฯทหารเรือหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('122', 'พลฯทหารอากาศ', '1', null);
INSERT INTO `sys_pname` VALUES ('123', 'พลฯทหารอากาศหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('124', 'พันจ่าอากาศตรีหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('125', 'พันจ่าอากาศตรี', '1', null);
INSERT INTO `sys_pname` VALUES ('126', 'พันจ่าอากาศโทหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('127', 'พันจ่าอากาศโท', '1', null);
INSERT INTO `sys_pname` VALUES ('128', 'พันจ่าอากาศเอกหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('129', 'พันจ่าอากาศเอก', '1', null);
INSERT INTO `sys_pname` VALUES ('130', 'ม.จ.', '1', null);
INSERT INTO `sys_pname` VALUES ('131', 'ม.ร.ว.', '1', null);
INSERT INTO `sys_pname` VALUES ('132', 'ม.ล.', '1', null);
INSERT INTO `sys_pname` VALUES ('133', 'แม่ชี', '2', null);
INSERT INTO `sys_pname` VALUES ('134', 'ร.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('135', 'ร.ต.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('136', 'ร.ต.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('137', 'ร.ต.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('138', 'ร.ต.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('139', 'ร.ต.ม.ล.', '1', null);
INSERT INTO `sys_pname` VALUES ('140', 'ร.ต.ม.ล.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('141', 'ร.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('142', 'ร.ต.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('143', 'ร.ต.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('144', 'ร.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('145', 'ร.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('146', 'ร.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('147', 'ร.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('148', 'เรืออากาศตรี', '1', null);
INSERT INTO `sys_pname` VALUES ('149', 'เรืออากาศตรีหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('150', 'เรืออากาศโท', '1', null);
INSERT INTO `sys_pname` VALUES ('151', 'เรืออากาศโทหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('152', 'เรืออากาศเอก', '1', null);
INSERT INTO `sys_pname` VALUES ('153', 'เรืออากาศเอกหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('154', 'ว่าที่ น.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('155', 'ว่าที่ น.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('156', 'ว่าที่ น.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('157', 'ว่าที่ น.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('158', 'ว่าที่ พ.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('159', 'ว่าที่ พ.ต.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('160', 'ว่าที่ พ.ต.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('161', 'ว่าที่ พ.ต.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('162', 'ว่าที่ พ.ต.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('163', 'ว่าที่ พ.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('164', 'ว่าที่ พ.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('165', 'ว่าที่ พ.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('166', 'ว่าที่ พ.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('167', 'ว่าที่ พ.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('168', 'ว่าที่ ร.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('169', 'ว่าที่ ร.ต.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('170', 'ว่าที่ ร.ต.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('171', 'ว่าที่ ร.ต.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('172', 'ว่าที่ ร.ต.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('173', 'ว่าที่ ร.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('174', 'ว่าที่ ร.ต.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('175', 'ว่าที่ ร.ต.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('176', 'ว่าที่ ร.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('177', 'ว่าที่ ร.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('178', 'ว่าที่ ร.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('179', 'ว่าที่ ร.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('180', 'ว่าที่นาวาอากาศตรีหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('181', 'ว่าที่นาวาอากาศตรี', '1', null);
INSERT INTO `sys_pname` VALUES ('182', 'ว่าที่เรืออากาศตรีหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('183', 'ว่าที่เรืออากาศตรี', '1', null);
INSERT INTO `sys_pname` VALUES ('184', 'ว่าที่เรืออากาศโท', '1', null);
INSERT INTO `sys_pname` VALUES ('185', 'ว่าที่เรืออากาศโทหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('186', 'ว่าที่เรืออากาศเอก', '1', null);
INSERT INTO `sys_pname` VALUES ('187', 'ว่าที่เรืออากาศเอกหญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('188', 'ศจ.น.พ.', '1', null);
INSERT INTO `sys_pname` VALUES ('189', 'ส.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('190', 'ส.ต.ต.', '1', null);
INSERT INTO `sys_pname` VALUES ('191', 'ส.ต.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('192', 'ส.ต.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('193', 'ส.ต.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('194', 'ส.ต.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('195', 'ส.ต.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('196', 'ส.ต.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('197', 'ส.ท.', '1', null);
INSERT INTO `sys_pname` VALUES ('198', 'ส.ท.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('199', 'ส.อ.', '1', null);
INSERT INTO `sys_pname` VALUES ('200', 'ส.อ.หญิง', '2', null);
INSERT INTO `sys_pname` VALUES ('201', 'สามเณร', '1', null);
INSERT INTO `sys_pname` VALUES ('202', 'หม่อม', '2', null);
INSERT INTO `sys_pname` VALUES ('203', 'อาสาสมัครทหารพราน', '1', null);
INSERT INTO `sys_pname` VALUES ('204', 'อาสาสมัครทหารพราน หญิง', '2', null);

-- ----------------------------
-- Table structure for sys_sex
-- ----------------------------
DROP TABLE IF EXISTS `sys_sex`;
CREATE TABLE `sys_sex` (
  `sex` int(11) NOT NULL,
  `sexname` varchar(10) NOT NULL,
  PRIMARY KEY (`sex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_sex
-- ----------------------------
INSERT INTO `sys_sex` VALUES ('1', 'ชาย');
INSERT INTO `sys_sex` VALUES ('2', 'หญิง');

-- ----------------------------
-- Table structure for sys_status_work
-- ----------------------------
DROP TABLE IF EXISTS `sys_status_work`;
CREATE TABLE `sys_status_work` (
  `sta_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sta_name` varchar(200) NOT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_status_work
-- ----------------------------
INSERT INTO `sys_status_work` VALUES ('1', 'แจ้งเรื่องแล้ว');
INSERT INTO `sys_status_work` VALUES ('2', 'กำลังดำเนินงาน');
INSERT INTO `sys_status_work` VALUES ('3', 'รอวัสดุ/เครม/จัดซื้อ');
INSERT INTO `sys_status_work` VALUES ('4', 'เสร็จสิ้นกระบวนการ');

-- ----------------------------
-- Table structure for sys_user_status
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_status`;
CREATE TABLE `sys_user_status` (
  `sta_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `sta_code` char(2) NOT NULL,
  `sta_name` varchar(200) NOT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user_status
-- ----------------------------
INSERT INTO `sys_user_status` VALUES ('1', '0', 'ADMIN');
INSERT INTO `sys_user_status` VALUES ('2', '1', 'USER');
INSERT INTO `sys_user_status` VALUES ('3', '88', 'ยกเลิก');
INSERT INTO `sys_user_status` VALUES ('4', '99', 'รออนุมัติ');

-- ----------------------------
-- Table structure for tb_computer
-- ----------------------------
DROP TABLE IF EXISTS `tb_computer`;
CREATE TABLE `tb_computer` (
  `item_id` int(4) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_barnd` varchar(200) DEFAULT NULL,
  `item_ip` varchar(15) DEFAULT NULL,
  `item_own` varchar(255) DEFAULT NULL,
  `item_reg` date DEFAULT NULL,
  `d_update` datetime NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_computer
-- ----------------------------
INSERT INTO `tb_computer` VALUES ('1', '', 'Welfare 2', null, '192.168.1.34', 'มุกวี่ริน  จิตรไมตรี', '2559-10-01', '2016-10-12 03:19:28');
INSERT INTO `tb_computer` VALUES ('2', '', 'Welfare 4', null, '192.168.1.33', 'น.ส.ศิริพร  แซ่เฮง', '2559-10-01', '2016-10-12 03:18:06');
INSERT INTO `tb_computer` VALUES ('3', '', 'Welfare 5', null, '192.168.1.38', 'น.ส.ปราณี  ไกรเกริกเกรียรติ', '2559-10-01', '2016-10-12 03:18:45');
INSERT INTO `tb_computer` VALUES ('4', '', 'Card 1', null, '192.168.1.35', 'นางนันณภัชสรณ์  พึ่งอินทร์', '2559-10-01', '2016-10-14 11:48:49');
INSERT INTO `tb_computer` VALUES ('5', '', 'Card 2', null, '192.168.1.36', 'นายอดิศักดิ์  บูชาพุทธบุญ', '2559-10-01', '2016-10-12 03:24:50');
INSERT INTO `tb_computer` VALUES ('6', '', 'ITCenter 1', 'Acer', '192.168.1.8', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-18 01:41:25');
INSERT INTO `tb_computer` VALUES ('7', '', 'OPD 1', null, '192.168.1.60', 'นายจงศักดิ์  อินตา', '2559-10-01', '2016-10-12 03:41:58');
INSERT INTO `tb_computer` VALUES ('8', '', 'OPD 2', null, '192.168.1.61', 'นายจงศักดิ์  อินตา', '2559-10-01', '2016-10-12 03:43:25');
INSERT INTO `tb_computer` VALUES ('9', '', 'OPD 3', null, '192.168.1.62', 'นายจงศักดิ์  อินตา', '2559-10-01', '2016-10-12 03:44:41');
INSERT INTO `tb_computer` VALUES ('10', '', 'NCD 1', 'Acer  M2630G', '192.168.1.63', 'นายจงศักด์  อินตา', '2559-10-01', '2016-10-19 10:06:13');
INSERT INTO `tb_computer` VALUES ('11', '', 'Backup_IT 6', null, '192.168.1.216', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-12 03:48:51');
INSERT INTO `tb_computer` VALUES ('12', '', 'ER 1', null, '192.168.1.65', 'นางศรุตยา  กาญจนอังกูร', '2559-10-01', '2016-10-13 08:48:04');
INSERT INTO `tb_computer` VALUES ('13', '', 'ER 2', null, '192.168.1.68', 'นางศรุตยา  กาญจนอังกูร', '2559-10-01', '2016-10-13 08:48:59');
INSERT INTO `tb_computer` VALUES ('14', '', 'LR 1 ', null, '192.168.1.80', 'นางสาวชญานิษฐ์  ถิ่นวนา', '2559-10-01', '2016-10-13 08:52:24');
INSERT INTO `tb_computer` VALUES ('15', '', 'IPD 1', 'Asus', '192.168.1.66', 'นางอนงค์  แปงมูล', '2559-10-01', '2016-10-17 03:49:05');
INSERT INTO `tb_computer` VALUES ('16', '', 'IPD 2', 'Acer  MC605', '192.168.1.87', 'นางอนงค์  แปงมูล', '2559-10-01', '2016-10-17 03:49:49');
INSERT INTO `tb_computer` VALUES ('17', '', 'IPD 3', 'Acer  M2630G', '192.168.1.246', 'นางอนงค์  แปงมูล', '2559-10-01', '2016-10-17 03:50:28');
INSERT INTO `tb_computer` VALUES ('18', '', 'Nurse 1', 'Asus', '192.168.1.168', 'นางลัดดา  คำสัตย์', '2559-10-01', '2016-10-17 02:47:11');
INSERT INTO `tb_computer` VALUES ('19', '', 'Nurse 2', 'Acer  MC605', '192.168.1.69', 'นายเจษฎา  ทองนพคุณ', '2559-10-01', '2016-10-17 03:59:11');
INSERT INTO `tb_computer` VALUES ('20', '', 'Nurse 3', 'Acer  MC605', '192.168.1.92', 'นายประสงค์  สิทธิกุลประเสริฐ', '2559-10-01', '2016-10-17 03:37:49');
INSERT INTO `tb_computer` VALUES ('21', '', 'Dents 1', null, '192.168.1.89', 'ทันตแพทย์อรรจน์  สุขเสริฐ์', '2559-10-01', '2016-10-14 11:14:27');
INSERT INTO `tb_computer` VALUES ('22', '', 'Dents 2', 'Acer  MC2630G', '192.168.1.90', 'ทันตแพทย์ปวิณ  จันทร์ผา', '2559-10-01', '2016-10-17 02:04:11');
INSERT INTO `tb_computer` VALUES ('23', '', 'Dents 3', 'Acer M2630G', '192.168.1.91', 'ทันตแพทย์ขวัญเทพ  ชาวกงจักร์', '2559-10-01', '2016-10-17 02:05:07');
INSERT INTO `tb_computer` VALUES ('24', '', 'HA 1', null, '192.168.1.130', 'น.ส.ชญานิษฐ์  ถิ่นวนา', '2559-10-01', '2016-10-14 08:57:33');
INSERT INTO `tb_computer` VALUES ('25', '', 'LABS 1', null, '192.168.1.133', 'นางเอี่ยม  เศรษฐสุวรกุล', '2559-10-01', '2016-10-14 11:18:11');
INSERT INTO `tb_computer` VALUES ('26', '', 'LABS 2', null, '192.168.1.134', 'นางเอี่ยม  เศรษฐสุวรกุล', '2559-10-01', '2016-10-14 11:18:28');
INSERT INTO `tb_computer` VALUES ('27', '', 'X-ray 1', null, '192.168.1.126', 'นายสมชาติ  ชุมนุมอาสา', '2559-10-01', '2016-10-14 10:31:25');
INSERT INTO `tb_computer` VALUES ('28', '', 'Health 1', 'HP  P6-2361L', '192.168.1.151', 'นางจรัสศรี  วิศวกลกาล', '2559-10-01', '2016-10-17 02:07:05');
INSERT INTO `tb_computer` VALUES ('29', '', 'Health 2', 'HP  P6-2361L', '192.168.1.152', 'นางศิริกาย  ชัยยา', '2559-10-01', '2016-10-17 02:07:58');
INSERT INTO `tb_computer` VALUES ('30', '', 'Health 3', 'HP  P6-2361L', '192.168.1.153', 'นางชไมพร  จอมไพรวัลย์', '2559-10-01', '2016-10-17 02:08:54');
INSERT INTO `tb_computer` VALUES ('31', '', 'Health 4', 'Acer  MC605', '192.168.1.154', 'นางวัชรา  เกตุแก้ว', '2559-10-01', '2016-10-17 02:11:15');
INSERT INTO `tb_computer` VALUES ('32', '', 'Health 5', 'Acer  MC605', '192.168.1.155', 'นางพัชรา  เกตุแก้ว', '2559-10-01', '2016-10-17 02:12:08');
INSERT INTO `tb_computer` VALUES ('33', '', 'Backup_IT 2', 'Acer  M2630G', '192.168.1.202', 'นางสุดาวรรณ  เตชะตา', '2559-10-01', '2016-10-17 01:36:51');
INSERT INTO `tb_computer` VALUES ('34', '', 'PT 1', 'Acer  M2630G', '192.168.1.162', 'น.ส.มัลลิกา  แซ่ตั้ง', '2559-10-01', '2016-10-17 02:52:56');
INSERT INTO `tb_computer` VALUES ('35', '', 'ITCenter', 'Asus', '192.168.1.245', 'นางรัตนา  มีมิตรภาพ', '2559-10-01', '2016-10-17 02:13:26');
INSERT INTO `tb_computer` VALUES ('36', '', 'Thaimed 1', 'Acer  M2630G', '192.168.1.161', 'น.ส.ลักษณ์  อินสุขิน', '2559-10-01', '2016-10-17 02:48:51');
INSERT INTO `tb_computer` VALUES ('37', '', 'Sanit 1', 'Acer  MC605', '192.168.1.156', 'นายสมชาย  พฤกษชาติกุล', '2559-10-01', '2016-10-17 02:15:31');
INSERT INTO `tb_computer` VALUES ('38', '', 'Sanit 2', 'Acer  MC605', '192.168.1.157', 'นางสาวยศยา  จุฬารักษ์', '2559-10-01', '2016-10-17 02:16:45');
INSERT INTO `tb_computer` VALUES ('39', '', 'Sanit 3', 'Lenovo  H530', '192.168.1.158', 'นางสาววรรณา  แสงจันทร์อำไพ', '2559-10-01', '2016-10-17 02:17:55');
INSERT INTO `tb_computer` VALUES ('40', '', 'Sanit 4', 'Acer  M2630G', '192.168.1.159', 'นางรัตนา  มีมิตรภาพ', '2559-10-01', '2016-10-17 02:19:18');
INSERT INTO `tb_computer` VALUES ('41', '', 'Sanit 5', 'Acer  M2630G', '192.168.1.160', 'น.ส.นฤมล  ไพรสูงส่ง', '2559-10-01', '2016-10-17 02:20:40');
INSERT INTO `tb_computer` VALUES ('42', '', 'Doctor 1', null, '192.168.1.186', 'แพทย์หญิงธนพร  ธำรงจิรพัฒน์', '2559-10-01', '2016-10-14 11:15:26');
INSERT INTO `tb_computer` VALUES ('43', '', 'Doctor 2', null, '192.168.1.182', 'นายแพทย์จักรี  คมสาคร', '2559-10-01', '2016-10-13 10:45:05');
INSERT INTO `tb_computer` VALUES ('44', '', 'Doctor 3', null, '192.168.1.183', 'นายแพทย์ปวรุตน์  จรรยาประเสริฐ์', '2559-10-01', '2016-10-14 11:16:33');
INSERT INTO `tb_computer` VALUES ('45', '', 'ITCenter 1', null, '192.168.1.211', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 10:56:24');
INSERT INTO `tb_computer` VALUES ('46', '', 'ITCenter 3', null, '192.168.1.37', 'นายธนากรณ์  ใจเรื่อน', '2559-10-01', '2016-10-13 11:01:18');
INSERT INTO `tb_computer` VALUES ('47', '', 'ITCenter_backup 1', null, '192.168.1.215', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 11:08:16');
INSERT INTO `tb_computer` VALUES ('48', '', 'ITCenter_backup 2', null, '192.168.1.216', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 11:09:50');
INSERT INTO `tb_computer` VALUES ('49', '', 'ITCenter_backup 3', null, '192.168.1.217', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 11:11:23');
INSERT INTO `tb_computer` VALUES ('50', '', 'Fire Wall Server', null, '192.168.1.218', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 11:22:17');
INSERT INTO `tb_computer` VALUES ('51', '', 'Backup_IT 2', null, '192.168.1.212', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 11:28:18');
INSERT INTO `tb_computer` VALUES ('52', '', 'Backup_IT 3', null, '192.168.1.211', 'ว่าที่ร้อยตรีทวีศักดิ์  วิศวกลกาล', '2559-10-01', '2016-10-13 01:12:56');
INSERT INTO `tb_computer` VALUES ('53', '', 'Backup_IT 4', null, '192.168.1.204', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 01:16:21');
INSERT INTO `tb_computer` VALUES ('54', '', 'Backup_IT 5', null, '-', 'ว่าที่ร้อบตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 01:59:57');
INSERT INTO `tb_computer` VALUES ('55', '', 'Backup_IT 8', null, '192.168.1.228', 'นางแสงระวี  ตะวังทัน', '2559-10-01', '2016-10-14 09:01:13');
INSERT INTO `tb_computer` VALUES ('56', '', 'Backup_IT 9', null, '192.168.1.229', 'นายวสันต์  จันละ', '2559-10-01', '2016-10-14 09:01:37');
INSERT INTO `tb_computer` VALUES ('57', '', 'Server Mrecord', null, '192.168.1.2', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 02:20:49');
INSERT INTO `tb_computer` VALUES ('58', '', 'Server Hosxp', null, '192.168.1.5', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลการ', '2559-10-01', '2016-10-13 02:22:11');
INSERT INTO `tb_computer` VALUES ('59', '', 'Server Backup Hosxp', null, '192.168.1.6', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 02:23:34');
INSERT INTO `tb_computer` VALUES ('60', '', 'WEB Server', null, '192.168.1.219', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 02:26:18');
INSERT INTO `tb_computer` VALUES ('61', '', 'Server Remote', null, '192.168.1.25', 'ว่าที่ร้อยตรีทวีพันธ์  วิศวกลกาล', '2559-10-01', '2016-10-13 02:27:24');
INSERT INTO `tb_computer` VALUES ('62', '', 'Manager 1', null, '192.168.1.59', 'นางอรทัย  พรหมใจดี', '2559-10-01', '2016-10-13 02:44:40');
INSERT INTO `tb_computer` VALUES ('63', '', 'Manager 2 ', null, '192.168.1.40', 'นางณัฐชานันท์  ศิริ', '2559-10-01', '2016-10-13 02:46:10');
INSERT INTO `tb_computer` VALUES ('64', '', 'Manager 3', null, '192.168.1.42', 'นางพรพรรณ  ศิริพงษ์', '2559-10-01', '2016-10-13 02:50:55');
INSERT INTO `tb_computer` VALUES ('65', '', 'Nurse 4', 'Asus', '192.168.1.43', 'นางบัณชญา  วงค์ศิริกุล', '2559-10-01', '2016-10-18 08:21:32');
INSERT INTO `tb_computer` VALUES ('66', '', 'Manager 5', null, '192.168.1.144', 'นางรัชนี  ภัทรพิพัฒน์กานต์', '2559-10-01', '2016-10-13 03:11:47');
INSERT INTO `tb_computer` VALUES ('67', '', 'Manager 6 ', null, '192.168.1.46', 'นายกฤษฎา  ชุมภูบาง', '2559-10-01', '2016-10-13 03:13:25');
INSERT INTO `tb_computer` VALUES ('68', '', 'Manager 7', null, '192.168.1.47', 'นางวาสนา  วงศ์มิตร', '2559-10-01', '2016-10-13 03:15:26');
INSERT INTO `tb_computer` VALUES ('69', '', 'Manager 8', null, '192.168.1.48', 'น.ส.ราตรี  ชอบจำเรียง', '2559-10-01', '2016-10-13 03:17:12');
INSERT INTO `tb_computer` VALUES ('70', '', 'Manager 9', null, '192.168.1.49', 'น.ส.สายทิพย์  วงศ์มิตร', '2559-10-01', '2016-10-13 03:18:47');
INSERT INTO `tb_computer` VALUES ('71', '', 'Manager 10', null, '192.168.1.180', 'น.ส.ปุณญณุส  ปัตตังเว', '2559-10-01', '2016-10-13 03:19:44');
INSERT INTO `tb_computer` VALUES ('72', '', 'Cash 1', null, '192.168.1.49', 'น.ส.นภัสวรรณ  รัตณี', '2559-10-01', '2016-10-13 03:20:54');
INSERT INTO `tb_computer` VALUES ('73', '', 'Pharms 1', 'Asus', '192.168.1.102', 'นายธนวันต์  วนาภรณ์', '2559-10-01', '2016-10-18 01:39:15');
INSERT INTO `tb_computer` VALUES ('74', '', 'Pharms 3', null, '192.168.1.108', 'นายอาทิตย์  จิรพงศธรกุล', '2559-10-01', '2016-10-14 11:31:41');
INSERT INTO `tb_computer` VALUES ('75', '', 'Disp 1', 'Asus', '192.168.1.106', 'นางสายพิณ  คำภีระ', '2559-10-01', '2016-10-17 03:46:06');
INSERT INTO `tb_computer` VALUES ('76', '', 'Pharm 1', 'Acer MC605', '192.168.1.105', 'นายณัฐภูมินทร์  วีระพันธ์', '2559-10-01', '2016-10-17 03:58:00');
INSERT INTO `tb_computer` VALUES ('77', '', 'Server  Remode', 'Canon  LBP6200d', '192.168.1.25', 'นายธนากรณ์  ใจเรือน', '2559-10-01', '2016-10-19 10:38:52');
INSERT INTO `tb_computer` VALUES ('79', '', 'Welfare 4', 'HP LaserJet 1536dnf MFP', '192.168.1.33', 'น.ส.มุกวี่รินตร์  จิตรไมตรี', '2559-10-01', '2016-10-19 10:34:48');
INSERT INTO `tb_computer` VALUES ('80', '', 'Welfare 2', 'HP  ScanJet G3010', '192.168.1.34', 'น.ส.ศิริพร  แซ่เฮง', '2559-10-01', '2016-10-19 10:36:59');
INSERT INTO `tb_computer` VALUES ('81', '', 'Card 1', 'HP LaserJet P1102w', '192.168.1.35', 'น.ส.นันณภัชสรณ์  พึ่งอินทร์', '2559-10-01', '2016-10-19 10:41:20');
INSERT INTO `tb_computer` VALUES ('82', '', 'Card 2', 'HP  LaserJet 1020', '192.168.1.36', 'นายอดิศักดิ์  บูชาพุทธบุญ', '2559-10-01', '2016-10-19 10:43:07');
INSERT INTO `tb_computer` VALUES ('83', '', 'Manager 2', 'Richo  Aficio sp 3500SF', '192.168.1.40', 'นางณัฐชานันท์  ศิริ', '2559-10-01', '2016-10-19 10:44:51');
INSERT INTO `tb_computer` VALUES ('84', '', 'Manager 3', 'HP  LaserJet P1105', '192.168.1.42', 'นางพรพรรณ  ศิริพงษ์', '2259-10-01', '2016-10-19 10:54:51');
INSERT INTO `tb_computer` VALUES ('85', '', 'Manager 6', 'HP  LaserJet 1020', '192.168.1.46', 'นายกฤษฎา  ชุมภูบาง', '2559-10-01', '2016-10-19 11:13:20');
INSERT INTO `tb_computer` VALUES ('86', '', 'Manager 7', 'Richo  Aficio SG 3110DN', '192.168.1.47', 'นางวาสนา  วงศ์มิตร', '2559-10-01', '2016-10-19 11:15:04');
INSERT INTO `tb_computer` VALUES ('87', '', 'OPD 1', 'Brother HL-L2360D', '192.168.1.60', 'นายจงศักดิ์  อินตา', '2559-10-01', '2016-10-19 11:19:00');
INSERT INTO `tb_computer` VALUES ('88', '', 'OPD 3', 'Brother HL-L2360D', '192.168.1.62', 'นางศินีนา๔  หมื่นตาบุตร', '2559-10-01', '2016-10-19 11:21:37');
INSERT INTO `tb_computer` VALUES ('89', '', 'NCD 1', 'HP LAserJet P1006', '192.168.1.63', 'นายจงศักดิ์  อินตา', '2559-10-01', '2016-10-19 11:22:44');
INSERT INTO `tb_computer` VALUES ('90', '', 'LR 1', 'HP LaserJet P1102', '192.168.1.80', 'น.ส.ชญานิษฐ์  ถิ่นวนา', '2559-10-01', '2016-10-19 11:54:54');
INSERT INTO `tb_computer` VALUES ('91', '', 'IPD 1', 'Brother  HL-L2360D', '192.168.1.66', 'นางอนงค์  แปงมูล', '2559-10-01', '2016-10-19 01:15:41');
INSERT INTO `tb_computer` VALUES ('92', '', 'IPD 2', 'HP  LaserJet 1015', '192.168.1.87', 'นางอนงค์  แปงมูล', '2559-10-01', '2016-10-19 01:17:18');
INSERT INTO `tb_computer` VALUES ('93', '', 'Nurse 2', 'Canon  LBP6200d', '192.168.1.69', 'นายประสงค์  สิทธิกุลประเสริฐ', '2559-10-01', '2016-10-19 01:22:10');
INSERT INTO `tb_computer` VALUES ('94', '', 'Dents 1', 'HP  LaserJet P1102', '192.168.1.89', 'ทันตแพทย์อรรจน์  สุขเสริฐ', '2559-10-01', '2016-10-19 01:26:51');
INSERT INTO `tb_computer` VALUES ('95', '', 'Dents 3', 'HP  LaserJet  P1102', '192.168.1.91', 'ทันตแพทย์ขวัญเทพ  ชาวกงจักร์', '2559-10-01', '2016-10-19 01:32:02');
INSERT INTO `tb_computer` VALUES ('96', '', 'LAB 1', 'HP LaserJet P1102w', '192.168.1.133', 'นางเอี่ยม  เศรษฐสุวรกุล', '2559-10-01', '2016-10-19 01:48:11');
INSERT INTO `tb_computer` VALUES ('97', '', 'X-ray 1', 'HP  LaserJet 1015', '192.168.1.126', 'นายสมชาติ  ชุมนุมอาสา', '2559-10-01', '2016-10-19 01:49:25');
INSERT INTO `tb_computer` VALUES ('98', '', 'Healths 3', 'HP  LaserJet  P1102', '192.168.1.153', 'นางชไมพร  จอมไพรวัลย์', '2559-10-01', '2016-10-19 01:51:09');
INSERT INTO `tb_computer` VALUES ('99', '', 'Healths 4', 'Richo Aficio sp 3110DN', '192.168.1.154', 'นางวัชรา  ชมภูบาง', '2559-10-01', '2016-10-19 01:52:55');
INSERT INTO `tb_computer` VALUES ('100', '', 'Sanit 1', 'HP  LaserJet  P1102', '192.168.1.156', 'นายสมชาย  พฤกษชาติกุล', '2559-10-01', '2016-10-19 01:54:31');
INSERT INTO `tb_computer` VALUES ('101', '', 'Thaimed 1', 'Bhother HL-L2360D', '192.168.1.161', 'น.ส.ลักษณ์  อินสุขิน', '2559-10-01', '2016-10-19 01:56:11');
INSERT INTO `tb_computer` VALUES ('102', '', 'ITCenter ', 'Bhother  HL-L2360D', '192.168.1.245', 'นางรัตนา  มีมิตรภาพ', '2559-10-01', '2016-10-19 01:58:08');
INSERT INTO `tb_computer` VALUES ('103', '', 'Doctor 1', 'HP  LaserJet  P1102', '192.168.1.186', 'แพทย์หญิงธนพร   ธำรงจิรพัฒน์', '2559-10-01', '2016-10-19 02:00:05');
INSERT INTO `tb_computer` VALUES ('104', '', 'Doctor 2', 'Bhother  HL-L2360D', '192.168.1.182', 'นายแพทย์จักรี  คมสาคร', '2559-10-01', '2016-10-19 02:01:22');
INSERT INTO `tb_computer` VALUES ('105', '', 'Doctor 3', 'HP  LaserJet P1102', '192.168.1.183', 'นายปวรุตน์  จรรยาประเสริฐ์', '2559-10-01', '2016-10-19 02:03:17');
INSERT INTO `tb_computer` VALUES ('106', '', 'Spare', 'HP  LaserJet', '', 'นายธนากรณ์  ใจเรือน', '2559-10-01', '2016-10-19 02:04:43');
INSERT INTO `tb_computer` VALUES ('107', '', 'Spare ', 'Brother  HL-L2360D', '', 'นายธรนากรณ์  ใจเรือน', '2559-10-01', '2016-10-19 02:05:51');
INSERT INTO `tb_computer` VALUES ('108', '', 'Spare', 'HP  LaserJet M1105  MFP', '', 'นายธนากรณ์  ใจเรือน', '2559-10-01', '2016-10-19 02:07:32');
INSERT INTO `tb_computer` VALUES ('109', '', 'ttt', 'ttt', '', 'ttt', '0000-00-00', '2017-04-20 20:40:18');

-- ----------------------------
-- Table structure for tb_work
-- ----------------------------
DROP TABLE IF EXISTS `tb_work`;
CREATE TABLE `tb_work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_code` varchar(25) DEFAULT NULL,
  `work_date` date NOT NULL,
  `work_title` varchar(250) NOT NULL,
  `item_id` tinyint(1) DEFAULT NULL,
  `work_user_text` longtext,
  `user_id` tinyint(1) NOT NULL,
  `dep_id` tinyint(1) NOT NULL,
  `sta_id` tinyint(1) DEFAULT '0',
  `work_user_id` tinyint(1) DEFAULT NULL,
  `work_text` longtext,
  `work_end_date` date DEFAULT NULL,
  `d_update` datetime NOT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_work
-- ----------------------------
INSERT INTO `tb_work` VALUES ('1', '60/1', '2017-05-10', 'test1', '3', '<p>test</p>\r\n', '1', '1', '2', '2', '', null, '2017-05-10 21:40:56');
INSERT INTO `tb_work` VALUES ('2', '60/2', '2017-05-10', 'test2', '2', '<p>test</p>\r\n', '2', '3', '1', null, null, null, '2017-05-10 21:41:52');
INSERT INTO `tb_work` VALUES ('3', '60/3', '2017-05-10', 'test3', '2', '<p>ddddddd</p>\r\n', '3', '4', '1', null, null, null, '2017-05-10 21:42:20');
INSERT INTO `tb_work` VALUES ('4', '60/4', '2017-05-10', 'test4', '29', '<p>test</p>\r\n', '3', '4', '1', null, null, null, '2017-05-10 21:43:09');
INSERT INTO `tb_work` VALUES ('5', '60/4', '2017-05-11', 'ทดสอบระบบแจ้งซ่อม', '3', '<p>test</p>\r\n', '2', '3', '1', null, null, null, '2017-05-11 10:50:35');
INSERT INTO `tb_work` VALUES ('6', '60/5', '2017-05-11', 'ทดสอบระบบแจ้งซ่อม', '2', '<p>aaaaaaaaaaaaaaaaaaa</p>\r\n', '3', '1', '1', null, null, null, '2017-05-11 10:51:28');
INSERT INTO `tb_work` VALUES ('7', '60/6', '2017-05-11', 'ทดสอบระบบแจ้งซ่อม', '3', '<p>aaaaaaaaaaaa</p>\r\n', '3', '1', '1', null, null, null, '2017-05-11 10:57:33');
INSERT INTO `tb_work` VALUES ('8', '60/7', '2017-05-11', 'ทดสอบระบบแจ้งซ่อม', '3', '<p>กกกกกกกกกกกกกกกกกกกก</p>\r\n', '3', '1', '1', null, null, null, '2017-05-11 11:01:39');
INSERT INTO `tb_work` VALUES ('9', '60/7', '2017-05-11', 'ทดสอบระบบแจ้งซ่อม', '3', '<p>กกกกกกกกกกกกกกกกกกกก</p>\r\n', '3', '1', '1', null, null, null, '2017-05-11 11:02:53');
INSERT INTO `tb_work` VALUES ('10', '60/8', '2017-05-11', 'ทดสอบระบบ', '3', '<h1><strong>ทดสอบระบบแจ้งซ่อมออนไลน์</strong></h1>\r\n', '3', '3', '2', '2', '<p>รับทราบ กำลังดำเนินงาน</p>\r\n', null, '2017-05-11 13:02:39');
INSERT INTO `tb_work` VALUES ('11', '60/66', '2017-05-11', 'ทดสอบระบบแจ้งซ่อม', '4', '<p>fffffffffffffffffffff</p>\r\n', '3', '3', '1', null, null, null, '2017-05-11 19:32:39');
INSERT INTO `tb_work` VALUES ('12', '444', '2017-05-17', '4444', '3', '<p>4444444444444</p>\r\n', '2', '4', '1', null, null, null, '2017-05-17 12:04:01');
INSERT INTO `tb_work` VALUES ('13', '60/3', '2017-05-17', 'hghjkl../', null, '<p>fffffffffffffff</p>\r\n', '2', '3', '1', null, null, null, '2017-05-17 13:41:28');
INSERT INTO `tb_work` VALUES ('14', '60/3', '2017-05-17', 'hghjkl../', null, '<p>fffffffffffffff</p>\r\n', '2', '3', '1', null, null, null, '2017-05-17 13:42:10');
INSERT INTO `tb_work` VALUES ('15', '60/3', '2017-05-17', 'hghjkl../', null, '<p>fffffffffffffff</p>\r\n', '2', '3', '1', null, null, null, '2017-05-17 13:45:39');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pname` tinyint(1) DEFAULT NULL,
  `fname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dep_id` tinyint(1) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `sta_id` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'user1', 'GBG6JSBTGLd3t2um15onE7dvq0LRERm_', '$2y$13$Qzl61LV25GzV1aQYf5B1heMjsFR9p8pD.cPyYoG2UQK.6wRUIY2W2', null, '4', 'null', 'null', '1', 'user@localhost.com', '4', '10', '1494405993', '1494405993', '1');
INSERT INTO `user` VALUES ('2', 'admin', 'hNwlkttkmrBwdlgn3XJtq5WhPS8n6Bse', '$2y$13$GsSERPJjVctbVm/DSi3dg.HkgZ5Ooaay35pxu80bOradvgOVpGKGi', null, '51', 'admin', 'admin', '1', 'admin@localhost.com', '3', '10', '1494406009', '1494406009', '0');
INSERT INTO `user` VALUES ('3', 'user2', '8RrDOrVf1o2AXrEG87BgcVi7xZfF0NMM', '$2y$13$utCVt7qTl5qjQo0/iBCKy./kVTu9lj5.6eIW.8UbSdwbd0NzSV5TC', null, '4', 'null', 'null', '1', 'user2@localhost.com', '1', '10', '1494406053', '1494406053', '1');
INSERT INTO `user` VALUES ('4', 'user', 'sDyK8p9vqsit7mnu20e4sET5iGOdqNgA', '$2y$13$csQT.akdTgnSF1Seudd1P.8qGN.s.G79bHhYI7HGvmTy7JWNXC2ZO', null, '4', 'user', 'tester', '2', 'user3@localhost.com', '1', '10', '1494482436', '1494482436', '1');
