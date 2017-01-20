/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : sscom

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2016-11-29 00:19:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_title` varchar(500) DEFAULT NULL,
  `contact_name` varchar(500) DEFAULT NULL,
  `contact_email` varchar(200) DEFAULT NULL,
  `description` varchar(20) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact
-- ----------------------------

-- ----------------------------
-- Table structure for info
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `infoId` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) DEFAULT '',
  `twitter` varchar(255) DEFAULT '',
  `google` varchar(255) DEFAULT '',
  `youtube` varchar(255) DEFAULT '',
  `phone` varchar(255) DEFAULT '',
  `address` text CHARACTER SET utf8,
  `email` varchar(255) DEFAULT '',
  `title` text,
  `metakeywords` text,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`infoId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES ('1', ' ', '1111', ' ', ' ', ' +0511.3740.119', '48 Phạm Đình Hổ, Phường Hòa Minh, Quận Liên Chiểu, TP Đà Nẵng.', 'tuvan.sscom@gmail.com', null, null, null);

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `memberId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile` text,
  `resourceId` int(11) DEFAULT NULL,
  PRIMARY KEY (`memberId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'Mark Whilberg', 'CEO', '2016-11-07', '272 Linden Avenue, Winter Park', 'mark.whilberg@mail.com', '+149 75 23 222 35', '<p>Founded by Kevin Smith back in 2000, Renovate has established itself as one of the greatest and prestigous providers of construction focused interior renovation services and building.</p>\r\n\r\n<p>We provide a professional renovation and installation serv</p>\r\n', '53');
INSERT INTO `member` VALUES ('5', ' PHILIP BROWER', 'CO-FOUNDER', '1990-11-19', '272 Linden Avenue, Winter Park', 'philip.brower@mail.com', '+149 75 23 222 35', '<p>Founded by Kevin Smith back in 2000, Renovate has established itself as one of th greatest and prestigous providers of construction focused interior renovation services and building.</p>\r\n\r\n<p>We provide a professional renovation and installation&nbsp;</p>\r\n', '54');
INSERT INTO `member` VALUES ('7', ' PHILIP BROWER - 2', 'CO-FOUNDER', '1990-11-19', '272 Linden Avenue, Winter Park', 'philip.brower@mail.com', '+149 75 23 222 35', '<p>Founded by Kevin Smith back in 2000, Renovate has established itself as one of th greatest and prestigous providers of construction focused interior renovation services and building.</p>\r\n\r\n<p>We provide a professional renovation and installation&nbsp;</p>\r\n', '56');
INSERT INTO `member` VALUES ('6', 'Mark Whilberg - 2', 'CEO', '2016-11-07', '272 Linden Avenue, Winter Park', 'mark.whilberg@mail.com', '+149 75 23 222 35', '<p>Founded by Kevin Smith back in 2000, Renovate has established itself as one of the greatest and prestigous providers of construction focused interior renovation services and building.</p>\r\n\r\n<p>We provide a professional renovation and installation serv</p>\r\n', '55');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `parent` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`menuId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '5', '1');
INSERT INTO `menu` VALUES ('1', '6', '2');
INSERT INTO `menu` VALUES ('1', '7', '3');
INSERT INTO `menu` VALUES ('2', '8', '4');
INSERT INTO `menu` VALUES ('2', '9', '5');
INSERT INTO `menu` VALUES ('2', '10', '7');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_10_19_165437_sessions', '2');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `resourceId` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  PRIMARY KEY (`newsId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('4', '39', '1', '2016-11-29 00:03:47', '24');
INSERT INTO `news` VALUES ('3', '39', '1', '2016-11-28 00:03:52', '2');
INSERT INTO `news` VALUES ('5', '39', '1', '2016-11-21 22:36:27', '0');
INSERT INTO `news` VALUES ('6', '39', '1', '2016-11-17 00:03:56', '2');
INSERT INTO `news` VALUES ('7', '52', '1', '2005-11-16 00:00:00', '2');

-- ----------------------------
-- Table structure for newstrans
-- ----------------------------
DROP TABLE IF EXISTS `newstrans`;
CREATE TABLE `newstrans` (
  `newsTransId` int(11) NOT NULL AUTO_INCREMENT,
  `newsTitle` text NOT NULL,
  `newsSlug` text NOT NULL,
  `newsContent` text,
  `newsId` int(11) NOT NULL,
  `newsSummary` text NOT NULL,
  `locale` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`newsTransId`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newstrans
-- ----------------------------
INSERT INTO `newstrans` VALUES ('7', 'WHAT A DIFFERENCE A FEW MONTHS MAKE', 'what-a-difference-a-few-months-make', '<blockquote>&quot;Paetos dignissim at cursus elefeind norma . Pellentesque accumsan tempus etos ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo.&quot;</blockquote>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.</p>\r\n\r\n<h3>LACUS MODEM ELEMENTUM</h3>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida. Pellentesque accumsan, ex in tempus ullamcorper terminal. Setis lacus suscipit tortor ergat vitae metus.</p>\r\n\r\n<h4>GRAVIDA TERMINAL ETOS</h4>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Terminal gravida est novum elementum modest ornare. Suspendisse novum etos metro vehicula est gravida ornare non&nbsp;<a href=\"http://localhost/reno/post.html#\">mattis velit rutrum</a>&nbsp;modest. Morbi suspendisse tortor velim. Novum elementum in tempus&nbsp;<a href=\"http://localhost/reno/post.html#\">pellentesque accumsan</a>&nbsp;est ullamcorper.</p>\r\n', '4', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.', 'vn');
INSERT INTO `newstrans` VALUES ('8', ' Signs You Need Drain Repair Services', 'signs-you-need-drain-repair-services', '<blockquote>&quot;Paetos dignissim at cursus elefeind norma . Pellentesque accumsan tempus etos ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo.&quot;</blockquote>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.</p>\r\n\r\n<h3>LACUS MODEM ELEMENTUM</h3>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida. Pellentesque accumsan, ex in tempus ullamcorper terminal. Setis lacus suscipit tortor ergat vitae metus.</p>\r\n\r\n<h4>GRAVIDA TERMINAL ETOS</h4>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Terminal gravida est novum elementum modest ornare. Suspendisse novum etos metro vehicula est gravida ornare non&nbsp;<a href=\"http://localhost/reno/post.html#\">mattis velit rutrum</a>&nbsp;modest. Morbi suspendisse tortor velim. Novum elementum in tempus&nbsp;<a href=\"http://localhost/reno/post.html#\">pellentesque accumsan</a>&nbsp;est ullamcorper.</p>\r\n', '4', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.', 'en');
INSERT INTO `newstrans` VALUES ('9', 'WHAT A DIFFERENCE A FEW MONTHS MAKE', 'what-a-difference-a-few-months-make', '<blockquote>&quot;Paetos dignissim at cursus elefeind norma . Pellentesque accumsan tempus etos ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo.&quot;</blockquote>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.</p>\r\n\r\n<h3>LACUS MODEM ELEMENTUM</h3>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida. Pellentesque accumsan, ex in tempus ullamcorper terminal. Setis lacus suscipit tortor ergat vitae metus.</p>\r\n\r\n<h4>GRAVIDA TERMINAL ETOS</h4>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Terminal gravida est novum elementum modest ornare. Suspendisse novum etos metro vehicula est gravida ornare non&nbsp;<a href=\"http://localhost/reno/post.html#\">mattis velit rutrum</a>&nbsp;modest. Morbi suspendisse tortor velim. Novum elementum in tempus&nbsp;<a href=\"http://localhost/reno/post.html#\">pellentesque accumsan</a>&nbsp;est ullamcorper.</p>\r\n', '5', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.', 'vn');
INSERT INTO `newstrans` VALUES ('10', ' Signs You Need Drain Repair Services', 'signs-you-need-drain-repair-services', '<blockquote>&quot;Paetos dignissim at cursus elefeind norma . Pellentesque accumsan tempus etos ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo.&quot;</blockquote>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.</p>\r\n\r\n<h3>LACUS MODEM ELEMENTUM</h3>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida. Pellentesque accumsan, ex in tempus ullamcorper terminal. Setis lacus suscipit tortor ergat vitae metus.</p>\r\n\r\n<h4>GRAVIDA TERMINAL ETOS</h4>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Terminal gravida est novum elementum modest ornare. Suspendisse novum etos metro vehicula est gravida ornare non&nbsp;<a href=\"http://localhost/reno/post.html#\">mattis velit rutrum</a>&nbsp;modest. Morbi suspendisse tortor velim. Novum elementum in tempus&nbsp;<a href=\"http://localhost/reno/post.html#\">pellentesque accumsan</a>&nbsp;est ullamcorper.</p>\r\n', '5', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.', 'en');
INSERT INTO `newstrans` VALUES ('11', 'WHAT A DIFFERENCE A FEW MONTHS MAKE', 'what-a-difference-a-few-months-make', '<blockquote>&quot;Paetos dignissim at cursus elefeind norma . Pellentesque accumsan tempus etos ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo.&quot;</blockquote>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.</p>\r\n\r\n<h3>LACUS MODEM ELEMENTUM</h3>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida. Pellentesque accumsan, ex in tempus ullamcorper terminal. Setis lacus suscipit tortor ergat vitae metus.</p>\r\n\r\n<h4>GRAVIDA TERMINAL ETOS</h4>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Terminal gravida est novum elementum modest ornare. Suspendisse novum etos metro vehicula est gravida ornare non&nbsp;<a href=\"http://localhost/reno/post.html#\">mattis velit rutrum</a>&nbsp;modest. Morbi suspendisse tortor velim. Novum elementum in tempus&nbsp;<a href=\"http://localhost/reno/post.html#\">pellentesque accumsan</a>&nbsp;est ullamcorper.</p>\r\n', '6', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.', 'vn');
INSERT INTO `newstrans` VALUES ('12', ' Signs You Need Drain Repair Services', 'signs-you-need-drain-repair-services', '<blockquote>&quot;Paetos dignissim at cursus elefeind norma . Pellentesque accumsan tempus etos ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo.&quot;</blockquote>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.</p>\r\n\r\n<h3>LACUS MODEM ELEMENTUM</h3>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida. Pellentesque accumsan, ex in tempus ullamcorper terminal. Setis lacus suscipit tortor ergat vitae metus.</p>\r\n\r\n<h4>GRAVIDA TERMINAL ETOS</h4>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Terminal gravida est novum elementum modest ornare. Suspendisse novum etos metro vehicula est gravida ornare non&nbsp;<a href=\"http://localhost/reno/post.html#\">mattis velit rutrum</a>&nbsp;modest. Morbi suspendisse tortor velim. Novum elementum in tempus&nbsp;<a href=\"http://localhost/reno/post.html#\">pellentesque accumsan</a>&nbsp;est ullamcorper.</p>\r\n', '6', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.', 'en');
INSERT INTO `newstrans` VALUES ('5', 'WHAT A DIFFERENCE A FEW MONTHS MAKE', 'what-a-difference-a-few-months-make', '<blockquote>&quot;Paetos dignissim at cursus elefeind norma . Pellentesque accumsan tempus etos ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo.&quot;</blockquote>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.</p>\r\n\r\n<h3>LACUS MODEM ELEMENTUM</h3>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida. Pellentesque accumsan, ex in tempus ullamcorper terminal. Setis lacus suscipit tortor ergat vitae metus.</p>\r\n\r\n<h4>GRAVIDA TERMINAL ETOS</h4>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Terminal gravida est novum elementum modest ornare. Suspendisse novum etos metro vehicula est gravida ornare non&nbsp;<a href=\"http://localhost/reno/post.html#\">mattis velit rutrum</a>&nbsp;modest. Morbi suspendisse tortor velim. Novum elementum in tempus&nbsp;<a href=\"http://localhost/reno/post.html#\">pellentesque accumsan</a>&nbsp;est ullamcorper.</p>\r\n', '3', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.', 'vn');
INSERT INTO `newstrans` VALUES ('6', ' Signs You Need Drain Repair Services', 'signs-you-need-drain-repair-services', '<blockquote>&quot;Paetos dignissim at cursus elefeind norma . Pellentesque accumsan tempus etos ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo.&quot;</blockquote>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.</p>\r\n\r\n<h3>LACUS MODEM ELEMENTUM</h3>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida. Pellentesque accumsan, ex in tempus ullamcorper terminal. Setis lacus suscipit tortor ergat vitae metus.</p>\r\n\r\n<h4>GRAVIDA TERMINAL ETOS</h4>\r\n\r\n<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Terminal gravida est novum elementum modest ornare. Suspendisse novum etos metro vehicula est gravida ornare non&nbsp;<a href=\"http://localhost/reno/post.html#\">mattis velit rutrum</a>&nbsp;modest. Morbi suspendisse tortor velim. Novum elementum in tempus&nbsp;<a href=\"http://localhost/reno/post.html#\">pellentesque accumsan</a>&nbsp;est ullamcorper.</p>\r\n', '3', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque accumsan est in tempus etos ullamcorper, sem quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse gravida ornare non mattis velit rutrum modest. Morbi suspendisse a tortor velim pellentesque uter justo magna gravida.', 'en');
INSERT INTO `newstrans` VALUES ('13', 'SIGNS YOU NEED DRAIN REPAIR SERVICES', 'signs-you-need-drain-repair-services', '<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque mode accumsan est in tempus, etos at ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse est gravida ornare. Non mattis morbi suspendisse velit rutrum modest a tortor velim pellentesque uter justo magna gravida.</p>\r\n', '7', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque mode accumsan est in tempus, etos at ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse est gravida ornare. Non mattis morbi suspendisse velit rutrum modest a tortor velim pellentesque uter justo magna gravida.', 'vn');
INSERT INTO `newstrans` VALUES ('14', 'WHAT A DIFFERENCE A FEW MONTHS MAKE', 'what-a-difference-a-few-months-make', '<p>Paetos dignissim at cursus elefeind norma arcu. Pellentesque mode accumsan est in tempus, etos at ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse est gravida ornare. Non mattis morbi suspendisse velit rutrum modest a tortor velim pellentesque uter justo magna gravida.</p>\r\n', '7', 'Paetos dignissim at cursus elefeind norma arcu. Pellentesque mode accumsan est in tempus, etos at ullamcorper quam suscipit lacus maecenas tortor. Erates vitae node metus. Suspendisse est gravida ornare. Non mattis morbi suspendisse velit rutrum modest a tortor velim pellentesque uter justo magna gravida.', 'en');

-- ----------------------------
-- Table structure for page
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `resourceId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('5', '0', '1');
INSERT INTO `page` VALUES ('6', '0', '1');

-- ----------------------------
-- Table structure for pagetrans
-- ----------------------------
DROP TABLE IF EXISTS `pagetrans`;
CREATE TABLE `pagetrans` (
  `pageTransId` int(11) NOT NULL AUTO_INCREMENT,
  `pageTitle` text NOT NULL,
  `pageSlug` text NOT NULL,
  `pageContent` text NOT NULL,
  `pageId` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  PRIMARY KEY (`pageTransId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pagetrans
-- ----------------------------
INSERT INTO `pagetrans` VALUES ('7', 'Ngành nghề', 'nganh-nghe', '<ul class=\"list margin-top-20\">\r\n                    <li class=\"template-bullet\">Tư vấn, thiết kế và lập dự toán các công trình dân dụng, công nghiệp, giao thông, thủy lợi, hạ tầng kỹ thuật.</li>\r\n                    <li class=\"template-bullet\">Thiết kế kiến trúc, kết cấu, nội thất, ngoại thất công trình.</li>\r\n                    <li class=\"template-bullet\">Quản lý dự án, giám sát kĩ thuật xây dựng các công trình dân dụng, công nghiệp, giao thông thủy lợi, hạ tầng kĩ thuật và bảo vệ môi trường.</li>\r\n                    <li class=\"template-bullet\">Thi công công trình dân dụng, công nghiệp, giao thông, thủy lợi, thủy điện, hạ tầng kỹ thuật.</li>                   \r\n                </ul>', '5', 'vn');
INSERT INTO `pagetrans` VALUES ('8', 'Careers', 'careers', '<ul class=\"list margin-top-20\">\r\n                    <li class=\"template-bullet\">Consultation, design and make estimate for civil, industrial works, traffic, irrigation, technical infrastructure.</li>\r\n                    <li class=\"template-bullet\">Designing architecture, structure, interior, exterior of works.</li>\r\n                    <li class=\"template-bullet\">Managing projects, supervising construction techniques of civil and industrial works.</li>\r\n                    <li class=\"template-bullet\">Constructing civil, industrial works, traffic, irrigation, technical infrastructure.</li>                   \r\n                </ul>', '5', 'en');
INSERT INTO `pagetrans` VALUES ('9', 'Đối Tác', 'doi-tac', '<ul class=\"list margin-top-20\">\r\n	<li class=\"template-bullet\">Tổng công ty sông Đà</li>\r\n	<li class=\"template-bullet\">Công ty CP thủy điện Sông Đà 3</li>\r\n	<li class=\"template-bullet\">Công ty CP thủy điện Sông Đà 3 – Đăk Lô</li>\r\n	<li class=\"template-bullet\">Tập đoàn BLF Ấn Độ</li>                   \r\n	<li class=\"template-bullet\">Cty B FOURESS - Ấn Độ </li>\r\n	<li class=\"template-bullet\">Tập đoàn Sungroup</li>\r\n	<li class=\"template-bullet\">Tập đoàn VinCom</li>\r\n	<li class=\"template-bullet\">Tập đoàn FLC</li>\r\n	<li class=\"template-bullet\">Công ty TNHH ARECA</li>\r\n</ul>', '6', 'vn');
INSERT INTO `pagetrans` VALUES ('10', 'Partner', 'partner', '<ul class=\"list margin-top-20\">\r\n	<li class=\"template-bullet\">Song Da Corporation</li>\r\n	<li class=\"template-bullet\">Song Da 3 Hydroelectric Joint Stock Company</li>\r\n	<li class=\"template-bullet\">Song Da 3 Hydroelectric Joint Stock Company – Dak Lo</li>\r\n	<li class=\"template-bullet\">BLF Group – India</li>                   \r\n	<li class=\"template-bullet\">B FOURESS COMPANY LIMITED - India</li>\r\n	<li class=\"template-bullet\">Sun Group</li>\r\n	<li class=\"template-bullet\">VinCom Group</li>\r\n	<li class=\"template-bullet\">FLC Group</li>\r\n	<li class=\"template-bullet\">ARECA Joint Stock Company</li>\r\n</ul>', '6', 'en');

-- ----------------------------
-- Table structure for partner
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `partnerId` int(11) NOT NULL AUTO_INCREMENT,
  `partnerName` varchar(255) NOT NULL,
  `partnerEmail` varchar(255) DEFAULT NULL,
  `partnerPhone` varchar(255) DEFAULT NULL,
  `partnerAddress` varchar(255) DEFAULT NULL,
  `partnerSite` varchar(255) DEFAULT NULL,
  `resourceId` int(11) DEFAULT NULL,
  PRIMARY KEY (`partnerId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partner
-- ----------------------------
INSERT INTO `partner` VALUES ('12', 'Tập đoàn FLC', '', '', '', '', null);
INSERT INTO `partner` VALUES ('13', 'Công ty TNHH ARECA', '', '', '', '', null);
INSERT INTO `partner` VALUES ('10', 'Tập đoàn Sungroup', '', '', '', '', null);
INSERT INTO `partner` VALUES ('11', 'Tập đoàn VinCom', '', '', '', '', null);
INSERT INTO `partner` VALUES ('5', 'Tổng công ty sông Đà', '', '', '', '', null);
INSERT INTO `partner` VALUES ('6', 'Công ty CP thủy điện Sông Đà 3', '', '', '', '', null);
INSERT INTO `partner` VALUES ('7', 'Công ty CP thủy điện Sông Đà 3 – Đăk Lô', '', '', '', '', null);
INSERT INTO `partner` VALUES ('8', 'Tập đoàn BLF Ấn Độ', '', '', '', '', null);
INSERT INTO `partner` VALUES ('9', 'Cty B FOURESS - Ấn Độ (B FOURESS COMPANY LIMITED)', '', '', '', '', null);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `projectId` int(11) NOT NULL AUTO_INCREMENT,
  `projectCatId` int(11) NOT NULL,
  `resourceId` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`projectId`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('32', '7', '26', '1');
INSERT INTO `project` VALUES ('33', '7', '27', '1');
INSERT INTO `project` VALUES ('34', '7', '28', '1');
INSERT INTO `project` VALUES ('35', '7', '29', '1');
INSERT INTO `project` VALUES ('37', '5', null, '1');
INSERT INTO `project` VALUES ('38', '5', null, '1');
INSERT INTO `project` VALUES ('36', '5', null, '1');
INSERT INTO `project` VALUES ('39', '6', '30', '1');
INSERT INTO `project` VALUES ('40', '6', '31', '1');
INSERT INTO `project` VALUES ('41', '6', '32', '1');
INSERT INTO `project` VALUES ('42', '8', null, '1');
INSERT INTO `project` VALUES ('43', '8', null, '1');
INSERT INTO `project` VALUES ('44', '8', null, '1');
INSERT INTO `project` VALUES ('45', '8', null, '1');
INSERT INTO `project` VALUES ('46', '8', null, '1');
INSERT INTO `project` VALUES ('47', '9', null, '1');
INSERT INTO `project` VALUES ('48', '9', null, '1');
INSERT INTO `project` VALUES ('49', '9', null, '1');
INSERT INTO `project` VALUES ('50', '9', null, '1');
INSERT INTO `project` VALUES ('51', '9', null, '1');
INSERT INTO `project` VALUES ('52', '9', '36', '1');
INSERT INTO `project` VALUES ('53', '10', '33', '1');
INSERT INTO `project` VALUES ('54', '10', '34', '1');
INSERT INTO `project` VALUES ('55', '10', '35', '1');

-- ----------------------------
-- Table structure for projectcategory
-- ----------------------------
DROP TABLE IF EXISTS `projectcategory`;
CREATE TABLE `projectcategory` (
  `projectCatId` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`projectCatId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projectcategory
-- ----------------------------
INSERT INTO `projectcategory` VALUES ('5', '1', '0');
INSERT INTO `projectcategory` VALUES ('6', '1', '0');
INSERT INTO `projectcategory` VALUES ('7', '1', '0');
INSERT INTO `projectcategory` VALUES ('8', '1', '0');
INSERT INTO `projectcategory` VALUES ('9', '1', '0');
INSERT INTO `projectcategory` VALUES ('10', '1', '0');
INSERT INTO `projectcategory` VALUES ('1', '1', '1');
INSERT INTO `projectcategory` VALUES ('2', '1', '1');

-- ----------------------------
-- Table structure for projectcategorytrans
-- ----------------------------
DROP TABLE IF EXISTS `projectcategorytrans`;
CREATE TABLE `projectcategorytrans` (
  `projectCatTransId` int(11) NOT NULL AUTO_INCREMENT,
  `projectCatName` varchar(255) DEFAULT NULL,
  `projectCatSlug` varchar(255) DEFAULT NULL,
  `projectCatDescription` text,
  `projectCatId` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  PRIMARY KEY (`projectCatTransId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projectcategorytrans
-- ----------------------------
INSERT INTO `projectcategorytrans` VALUES ('3', 'Tên Danh Mục Dự Án', 'ten-danh-muc-du-an', '<h4>T&ecirc;n Danh Mục Dự &Aacute;n</h4>\r\n', '3', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('4', 'Project Category Name', 'project-category-name', '<h4>Project Category Name</h4>\r\n', '3', 'en');
INSERT INTO `projectcategorytrans` VALUES ('7', 'Nhà ở', 'nha-o', '<p>Nh&agrave; ở</p>\r\n', '5', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('8', 'House', 'house', '<p>House</p>\r\n', '5', 'en');
INSERT INTO `projectcategorytrans` VALUES ('9', 'Biệt thự', 'biet-thu', '<p>Biệt thự</p>\r\n', '6', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('10', 'Villa', 'villa', '<p>Villa</p>\r\n', '6', 'en');
INSERT INTO `projectcategorytrans` VALUES ('11', 'Khách sạn', 'khach-san', '<p>Kh&aacute;ch sạn</p>\r\n', '7', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('12', 'Hotel', 'hotel', '<p>Hotel</p>\r\n', '7', 'en');
INSERT INTO `projectcategorytrans` VALUES ('13', ' Nhà ở & biệt thự', 'nha-o-biet-thu', '<p>Nh&agrave; ở &amp; biệt thự</p>\r\n', '8', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('14', 'House & Villa', 'house-villa', '<p>House &amp; Villa</p>\r\n', '8', 'en');
INSERT INTO `projectcategorytrans` VALUES ('15', 'Văn phòng & Khách sạn', 'van-phong-khach-san', '<p>Văn ph&ograve;ng &amp; Kh&aacute;ch sạn</p>\r\n', '9', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('16', 'Office & Hotel', 'office-hotel', '<p>Office &amp; Hotel</p>\r\n', '9', 'en');
INSERT INTO `projectcategorytrans` VALUES ('17', 'Nhà máy sản xuất', 'nha-may-san-xuat', '<p>Nh&agrave; m&aacute;y sản xuất</p>\r\n', '10', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('18', 'Factory', 'factory', '<p>Factory</p>\r\n', '10', 'en');
INSERT INTO `projectcategorytrans` VALUES ('19', 'THIẾT KẾ MẪU', 'thiet-ke-mau', '<p>THIẾT KẾ MẪU</p>\r\n', '1', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('20', 'SAMPLE DESIGN', 'sample-design', '<p>Sample design</p>\r\n', '1', 'en');
INSERT INTO `projectcategorytrans` VALUES ('21', 'CÔNG TRÌNH', 'cong-trinh', '<p>C&ocirc;ng tr&igrave;nh</p>\r\n', '2', 'vn');
INSERT INTO `projectcategorytrans` VALUES ('22', 'CONSTRUCTED WORKS', 'constructed-works', '<p>Constructed works</p>\r\n', '2', 'en');

-- ----------------------------
-- Table structure for projecttrans
-- ----------------------------
DROP TABLE IF EXISTS `projecttrans`;
CREATE TABLE `projecttrans` (
  `projectTransId` int(11) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(255) NOT NULL,
  `projectSlug` varchar(255) NOT NULL,
  `projectSummary` text,
  `projectDescription` text,
  `projectId` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  PRIMARY KEY (`projectTransId`),
  KEY `projectId` (`projectId`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projecttrans
-- ----------------------------
INSERT INTO `projecttrans` VALUES ('51', 'Tên Dự Án11', 'ten-du-an11', 'Tên Dự Án11', '<h4>T&ecirc;n Dự &Aacute;n11</h4>\r\n', '31', 'vn');
INSERT INTO `projecttrans` VALUES ('52', 'Project Name', 'project-name', 'Project Name', '<h4>Project Name</h4>\r\n', '31', 'en');
INSERT INTO `projecttrans` VALUES ('53', 'Văn phòng làm việc tư nhân chị Lộc', 'van-phong-lam-viec-tu-nhan-chi-loc', 'Văn phòng làm việc tư nhân chị Lộc', '<p>Văn ph&ograve;ng l&agrave;m việc tư nh&acirc;n chị Lộc</p>\r\n', '32', 'vn');
INSERT INTO `projecttrans` VALUES ('54', 'Office of Ms. Loc', 'office-of-ms-loc', 'Office of Ms. Loc', '<p>Office of Ms. Loc</p>\r\n', '32', 'en');
INSERT INTO `projecttrans` VALUES ('55', 'Khách sạn Anh Được', 'khach-san-anh-duoc', 'Khách sạn Anh Được', '<p>Kh&aacute;ch sạn Anh Được</p>\r\n', '33', 'vn');
INSERT INTO `projecttrans` VALUES ('56', 'Hotel of Mr. Duoc', 'hotel-of-mr-duoc', 'Hotel of Mr. Duoc', '<p>Hotel of Mr. Duoc</p>\r\n', '33', 'en');
INSERT INTO `projecttrans` VALUES ('57', 'Khách sạn 9 Điểm', 'khach-san-9-diem', 'Khách sạn 9 Điểm', '<p>Kh&aacute;ch sạn 9 Điểm</p>\r\n', '34', 'vn');
INSERT INTO `projecttrans` VALUES ('58', '9 Point Hotel', '9-point-hotel', '9 Point Hotel', '<p>9 Point Hotel</p>\r\n', '34', 'en');
INSERT INTO `projecttrans` VALUES ('59', 'Khách sạn Hương Biển', 'khach-san-huong-bien', 'Khách sạn Hương Biển', '<p>Kh&aacute;ch sạn Hương Biển</p>\r\n', '35', 'vn');
INSERT INTO `projecttrans` VALUES ('60', 'Huong Bien Hotel', 'huong-bien-hotel', 'Huong Bien Hotel', '<p>Huong Bien Hotel</p>\r\n', '35', 'en');
INSERT INTO `projecttrans` VALUES ('61', 'Nhà phố 5x20', 'nha-pho-5x20', 'Nhà phố 5x20', '<p>Nh&agrave; phố 5x20</p>\r\n', '36', 'vn');
INSERT INTO `projecttrans` VALUES ('62', 'City house 5x20', 'city-house-5x20', 'City house 5x20', '<p>City house 5x20</p>\r\n', '36', 'en');
INSERT INTO `projecttrans` VALUES ('63', 'Nhà phố 8x20', 'nha-pho-8x20', 'Nhà phố 8x20', '<p>Nh&agrave; phố 8x20</p>\r\n', '37', 'vn');
INSERT INTO `projecttrans` VALUES ('64', 'City house 8x20', 'city-house-8x20', 'City house 8x20', '<p>City house 8x20</p>\r\n', '37', 'en');
INSERT INTO `projecttrans` VALUES ('65', 'Nhà ở kết hợp kinh doanh', 'nha-o-ket-hop-kinh-doanh', 'Nhà ở kết hợp kinh doanh', '<p>Nh&agrave; ở kết hợp kinh doanh</p>\r\n', '38', 'vn');
INSERT INTO `projecttrans` VALUES ('66', 'Accommodation and business house', 'accommodation-and-business-house', 'Accommodation and business house', '<p>Accommodation and business house</p>\r\n', '38', 'en');
INSERT INTO `projecttrans` VALUES ('67', 'Biệt thự cổ điển', 'biet-thu-co-dien', 'Biệt thự cổ điển', '<p>Biệt thự cổ điển</p>\r\n', '39', 'vn');
INSERT INTO `projecttrans` VALUES ('68', 'Classic villa', 'classic-villa', 'Classic villa', '<p>Classic villa</p>\r\n', '39', 'en');
INSERT INTO `projecttrans` VALUES ('69', 'Biệt thự tân cổ điển', 'biet-thu-tan-co-dien', 'Biệt thự tân cổ điển', '<p>Biệt thự t&acirc;n cổ điển</p>\r\n', '40', 'vn');
INSERT INTO `projecttrans` VALUES ('70', 'Neoclassical villa', 'neoclassical-villa', 'Neoclassical villa', '<p>Neoclassical villa</p>\r\n', '40', 'en');
INSERT INTO `projecttrans` VALUES ('71', 'Biệt thự hiện đại', 'biet-thu-hien-dai', 'Biệt thự hiện đại', '<p>Biệt thự hiện đại</p>\r\n', '41', 'vn');
INSERT INTO `projecttrans` VALUES ('72', 'Modern villa', 'modern-villa', 'Modern villa', '<p>Modern villa</p>\r\n', '41', 'en');
INSERT INTO `projecttrans` VALUES ('73', 'Biệt thự anh Long', 'biet-thu-anh-long', 'Biệt thự anh Long', '<p>Biệt thự anh Long</p>\r\n', '42', 'vn');
INSERT INTO `projecttrans` VALUES ('74', 'Villa of Mr. Long', 'villa-of-mr-long', 'Villa of Mr. Long', '<p>Villa of Mr. Long</p>\r\n', '42', 'en');
INSERT INTO `projecttrans` VALUES ('75', 'Biệt thự chị Xuân', 'biet-thu-chi-xuan', 'Biệt thự chị Xuân', '<p>Biệt thự chị Xu&acirc;n</p>\r\n', '43', 'vn');
INSERT INTO `projecttrans` VALUES ('76', 'Villa of Ms. Xuan', 'villa-of-ms-xuan', 'Villa of Ms. Xuan', '<p>Villa of Ms. Xuan</p>\r\n', '43', 'en');
INSERT INTO `projecttrans` VALUES ('77', 'Nhà anh Hương', 'nha-anh-huong', 'Nhà anh Hương', '<p>Nh&agrave; anh Hương</p>\r\n', '44', 'vn');
INSERT INTO `projecttrans` VALUES ('78', 'House of Mr. Huong', 'house-of-mr-huong', 'House of Mr. Huong', '<p>House of Mr. Huong</p>\r\n', '44', 'en');
INSERT INTO `projecttrans` VALUES ('79', 'Nhà anh Quốc', 'nha-anh-quoc', 'Nhà anh Quốc', '<p>Nh&agrave; anh Quốc</p>\r\n', '45', 'vn');
INSERT INTO `projecttrans` VALUES ('80', 'House of Mr. Quoc', 'house-of-mr-quoc', 'House of Mr. Quoc', '<p>House of Mr. Quoc</p>\r\n', '45', 'en');
INSERT INTO `projecttrans` VALUES ('81', 'Nhà anh Mai', 'nha-anh-mai', 'Nhà anh Mai', '<p>Nh&agrave; anh Mai</p>\r\n', '46', 'vn');
INSERT INTO `projecttrans` VALUES ('82', 'House of Mr. Mai', 'house-of-mr-mai', 'House of Mr. Mai', '<p>House of Mr. Mai</p>\r\n', '46', 'en');
INSERT INTO `projecttrans` VALUES ('83', 'Khách sạn Princess', 'khach-san-princess', 'Khách sạn Princess', '<p>Kh&aacute;ch sạn Princess</p>\r\n', '47', 'vn');
INSERT INTO `projecttrans` VALUES ('84', 'Princess Hotel', 'princess-hotel', 'Princess Hotel', '<p>Princess Hotel</p>\r\n', '47', 'en');
INSERT INTO `projecttrans` VALUES ('85', 'Khách sạn D&C', 'khach-san-dc', 'Khách sạn D&C', '<p>Kh&aacute;ch sạn D&amp;C</p>\r\n', '48', 'vn');
INSERT INTO `projecttrans` VALUES ('86', 'D&C Hotel', 'dc-hotel', 'D&C Hotel', '<p>D&amp;C Hotel</p>\r\n', '48', 'en');
INSERT INTO `projecttrans` VALUES ('87', 'Khách sạn Kiều Dung', 'khach-san-kieu-dung', 'Khách sạn Kiều Dung', '<p>Kh&aacute;ch sạn Kiều Dung</p>\r\n', '49', 'vn');
INSERT INTO `projecttrans` VALUES ('88', 'Kieu Dung Hotel', 'kieu-dung-hotel', 'Kieu Dung Hotel', '<p>Kieu Dung Hotel</p>\r\n', '49', 'en');
INSERT INTO `projecttrans` VALUES ('89', 'Khách sạn 1-8', 'khach-san-1-8', 'Khách sạn 1-8', '<p>Kh&aacute;ch sạn 1-8</p>\r\n', '50', 'vn');
INSERT INTO `projecttrans` VALUES ('90', '1-8 Hotel', '1-8-hotel', '1-8 Hotel', '<p>1-8 Hotel</p>\r\n', '50', 'en');
INSERT INTO `projecttrans` VALUES ('91', 'Khách sạn anh Bình', 'khach-san-anh-binh', 'Khách sạn anh Bình', '<p>Kh&aacute;ch sạn anh B&igrave;nh</p>\r\n', '51', 'vn');
INSERT INTO `projecttrans` VALUES ('92', 'Hotel of Mr. Binh', 'hotel-of-mr-binh', 'Hotel of Mr. Binh', '<p>Hotel of Mr. Binh</p>\r\n', '51', 'en');
INSERT INTO `projecttrans` VALUES ('93', 'Khu phức hợp trụ sở làm việc, nghà nghỉ chuyên gia và nhà ở công nhân viên Công ty thủy điện Sông Đà 3 – Đăk Lô', 'khu-phuc-hop-tru-so-lam-viec-ngha-nghi-chuyen-gia-va-nha-o-cong-nhan-vien-cong-ty-thuy-dien-song-da-3-dak-lo', 'Khu phức hợp trụ sở làm việc, nghà nghỉ chuyên gia và nhà ở công nhân viên Công ty thủy điện Sông Đà 3 – Đăk Lô', '<p>Khu phức hợp trụ sở l&agrave;m việc, ngh&agrave; nghỉ chuy&ecirc;n gia v&agrave; nh&agrave; ở c&ocirc;ng nh&acirc;n vi&ecirc;n C&ocirc;ng ty thủy điện S&ocirc;ng Đ&agrave; 3 &ndash; Đăk L&ocirc;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/mat-bang-san-vuon-canh-quan-2.png\" style=\"height:226px; width:320px\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/nha-lam-viec-song-da-view01-final-pa2-1.jpeg\" style=\"height:183px; width:320px\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/nha-lam-viec-song-da-view01-final-pa2.jpeg\" style=\"height:183px; width:320px\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/nha-lam-viec-song-da-view02-final-pa2-4.png\" style=\"height:201px; width:320px\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/nha-lam-viec-song-da-view03-final-pa2.jpeg\" style=\"height:160px; width:320px\" /></p>\r\n', '52', 'vn');
INSERT INTO `projecttrans` VALUES ('94', 'Complex of office, experts’ houses and accommodation for staffs of Song Da 3 Hydroelectric Joint Stock Company – Dak Lo', 'complex-of-office-experts-houses-and-accommodation-for-staffs-of-song-da-3-hydroelectric-joint-stock-company-dak-lo', 'Complex of office, experts’ houses and accommodation for staffs of Song Da 3 Hydroelectric Joint Stock Company – Dak Lo', '<p>Complex of office, experts&rsquo; houses and accommodation for staffs of Song Da 3 Hydroelectric Joint Stock Company &ndash; Dak Lo</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/mat-bang-san-vuon-canh-quan-2.png\" style=\"height:226px; width:320px\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/nha-lam-viec-song-da-view01-final-pa2-1.jpeg\" style=\"height:183px; width:320px\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/nha-lam-viec-song-da-view01-final-pa2.jpeg\" style=\"height:183px; width:320px\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/nha-lam-viec-song-da-view02-final-pa2-4.png\" style=\"height:201px; width:320px\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/uploads/images/nha-lam-viec-song-da-view03-final-pa2.jpeg\" style=\"height:160px; width:320px\" /></p>\r\n', '52', 'en');
INSERT INTO `projecttrans` VALUES ('95', 'Nhà máy thủy sản bắc trung nam Đà Nẵng', 'nha-may-thuy-san-bac-trung-nam-da-nang', 'Nhà máy thủy sản bắc trung nam Đà Nẵng', '<p>Nh&agrave; m&aacute;y thủy sản bắc trung nam Đ&agrave; Nẵng</p>\r\n', '53', 'vn');
INSERT INTO `projecttrans` VALUES ('96', 'Bac Trung Nam Fishery Factory – Da Nang', 'bac-trung-nam-fishery-factory-da-nang', 'Bac Trung Nam Fishery Factory – Da Nang', '<p>Bac Trung Nam Fishery Factory &ndash; Da Nang</p>\r\n', '53', 'en');
INSERT INTO `projecttrans` VALUES ('97', 'Thủy điện Đăk Lô', 'thuy-dien-dak-lo', 'Thủy điện Đăk Lô', '<p>Thủy điện Đăk L&ocirc;</p>\r\n', '54', 'vn');
INSERT INTO `projecttrans` VALUES ('98', 'Dak Lo Hydroelectric Plant', 'dak-lo-hydroelectric-plant', 'Dak Lo Hydroelectric Plant', '<p>Dak Lo Hydroelectric Plant</p>\r\n', '54', 'en');
INSERT INTO `projecttrans` VALUES ('99', 'Thủy Điện Tô Buông', 'thuy-dien-to-buong', 'Thủy Điện Tô Buông', '<p>Thủy Điện T&ocirc; Bu&ocirc;ng</p>\r\n', '55', 'vn');
INSERT INTO `projecttrans` VALUES ('100', 'To Buong Hydroelectric Plant', 'to-buong-hydroelectric-plant', 'To Buong Hydroelectric Plant', '<p>To Buong Hydroelectric Plant</p>\r\n', '55', 'en');

-- ----------------------------
-- Table structure for resources
-- ----------------------------
DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `resourceId` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`resourceId`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of resources
-- ----------------------------
INSERT INTO `resources` VALUES ('1', '/uploads/images/pn2v2.jpg', 'pn2v2.jpg');
INSERT INTO `resources` VALUES ('2', '/uploads/images/pn4v1.jpg', 'pn4v1.jpg');
INSERT INTO `resources` VALUES ('3', '/uploads/images/pn2v1.jpg', 'pn2v1.jpg');
INSERT INTO `resources` VALUES ('4', '/uploads/images/pn4v1.jpg', 'pn4v1.jpg');
INSERT INTO `resources` VALUES ('5', '/uploads/images/pshcv2.jpg', 'pshcv2.jpg');
INSERT INTO `resources` VALUES ('6', '/uploads/images/pn2v2.jpg', 'pn2v2.jpg');
INSERT INTO `resources` VALUES ('7', '/uploads/images/pkv3.jpg', 'pkv3.jpg');
INSERT INTO `resources` VALUES ('8', '/uploads/images/pkv2.jpg', 'pkv2.jpg');
INSERT INTO `resources` VALUES ('9', '/uploads/images/pn1v1.jpg', 'pn1v1.jpg');
INSERT INTO `resources` VALUES ('10', '/uploads/images/pn2v1.jpg', 'pn2v1.jpg');
INSERT INTO `resources` VALUES ('11', '/uploads/images/pn3v1.jpg', 'pn3v1.jpg');
INSERT INTO `resources` VALUES ('12', '/uploads/images/pn2v1.jpg', 'pn2v1.jpg');
INSERT INTO `resources` VALUES ('13', '/uploads/images/pvsv1.jpg', 'pvsv1.jpg');
INSERT INTO `resources` VALUES ('14', '/uploads/images/bista-0.png', 'bista-0.png');
INSERT INTO `resources` VALUES ('15', '/uploads/images/brainsell.png', 'brainsell.png');
INSERT INTO `resources` VALUES ('16', '/uploads/images/14646664-1300008946690704-1235672740-o.jpg', '14646664-1300008946690704-1235672740-o.jpg');
INSERT INTO `resources` VALUES ('17', '/uploads/images/brainsell.png', 'brainsell.png');
INSERT INTO `resources` VALUES ('18', '/uploads/images/14646664-1300008946690704-1235672740-o.jpg', '14646664-1300008946690704-1235672740-o.jpg');
INSERT INTO `resources` VALUES ('19', '/uploads/images/bista-0.png', 'bista-0.png');
INSERT INTO `resources` VALUES ('20', '/uploads/images/bista-0.png', 'bista-0.png');
INSERT INTO `resources` VALUES ('21', '/uploads/images/pkv2.jpg', 'pkv2.jpg');
INSERT INTO `resources` VALUES ('22', '/uploads/images/pkv3.jpg', 'pkv3.jpg');
INSERT INTO `resources` VALUES ('23', '/uploads/images/pn3v2.jpg', 'pn3v2.jpg');
INSERT INTO `resources` VALUES ('24', '/uploads/images/pn1v1.jpg', 'pn1v1.jpg');
INSERT INTO `resources` VALUES ('25', '/uploads/images/pn3v2.jpg', 'pn3v2.jpg');
INSERT INTO `resources` VALUES ('26', '/uploads/images/chiloc-pa2-web.jpg', 'chiloc-pa2-web.jpg');
INSERT INTO `resources` VALUES ('27', '/uploads/images/khach-san-aduoc-web.jpg', 'khach-san-aduoc-web.jpg');
INSERT INTO `resources` VALUES ('28', '/uploads/images/ks-9-diem-web.jpg', 'ks-9-diem-web.jpg');
INSERT INTO `resources` VALUES ('29', '/uploads/images/ksan-huong-bien-web.jpg', 'ksan-huong-bien-web.jpg');
INSERT INTO `resources` VALUES ('30', '/uploads/images/mau-biet-thu-nha-vuon-1-tang-dep-7x145m.jpg', 'mau-biet-thu-nha-vuon-1-tang-dep-7x145m.jpg');
INSERT INTO `resources` VALUES ('31', '/uploads/images/thiet-ke-biet-thu-2-tang-1.jpg', 'thiet-ke-biet-thu-2-tang-1.jpg');
INSERT INTO `resources` VALUES ('32', '/uploads/images/nha-dep-2-tang.jpg', 'nha-dep-2-tang.jpg');
INSERT INTO `resources` VALUES ('33', '/uploads/images/dsc01245.JPG', 'dsc01245.JPG');
INSERT INTO `resources` VALUES ('34', '/uploads/images/dsc01257.JPG', 'dsc01257.JPG');
INSERT INTO `resources` VALUES ('35', '/uploads/images/dsc01797.JPG', 'dsc01797.JPG');
INSERT INTO `resources` VALUES ('36', '/uploads/images/nha-lam-viec-song-da-view03-final-pa2.jpeg', 'nha-lam-viec-song-da-view03-final-pa2.jpeg');
INSERT INTO `resources` VALUES ('37', '/uploads/images/XcYE1i7so2.jpg', 'XcYE1i7so2.jpg');
INSERT INTO `resources` VALUES ('38', '/uploads/images/X6DKRxfq5k.jpg', 'X6DKRxfq5k.jpg');
INSERT INTO `resources` VALUES ('39', '/uploads/images/TmC5vMXOr2.jpg', 'TmC5vMXOr2.jpg');
INSERT INTO `resources` VALUES ('40', '/uploads/images/YXatRca9x3.jpg', 'YXatRca9x3.jpg');
INSERT INTO `resources` VALUES ('41', '/uploads/images/AQagF7ZGWr.jpg', 'AQagF7ZGWr.jpg');
INSERT INTO `resources` VALUES ('42', '/uploads/images/xzvcCRAu2t.png', 'xzvcCRAu2t.png');
INSERT INTO `resources` VALUES ('43', '/uploads/images/oJmrsSJNXc.png', 'oJmrsSJNXc.png');
INSERT INTO `resources` VALUES ('44', '/uploads/images/PNEiDTXok3.jpg', 'PNEiDTXok3.jpg');
INSERT INTO `resources` VALUES ('45', '/uploads/images/8hikdqlbEr.jpg', '8hikdqlbEr.jpg');
INSERT INTO `resources` VALUES ('46', '/uploads/images/gTkkOwXMCj.png', 'gTkkOwXMCj.png');
INSERT INTO `resources` VALUES ('47', '/uploads/images/mkTxDSy5M8.png', 'mkTxDSy5M8.png');
INSERT INTO `resources` VALUES ('48', '/uploads/images/WlFT2DNeH8.png', 'WlFT2DNeH8.png');
INSERT INTO `resources` VALUES ('49', '/uploads/images/gMzQJuPrtr.png', 'gMzQJuPrtr.png');
INSERT INTO `resources` VALUES ('50', '/uploads/images/wynm5746WE.png', 'wynm5746WE.png');
INSERT INTO `resources` VALUES ('51', '/uploads/images/HLtfP1rp9t.png', 'HLtfP1rp9t.png');
INSERT INTO `resources` VALUES ('52', '/uploads/images/cYjm1liSEa.jpg', 'cYjm1liSEa.jpg');
INSERT INTO `resources` VALUES ('53', '/uploads/images/Od1jhTcsQe.png', 'Od1jhTcsQe.png');
INSERT INTO `resources` VALUES ('54', '/uploads/images/qqlyPRi3eS.png', 'qqlyPRi3eS.png');
INSERT INTO `resources` VALUES ('55', '/uploads/images/V04FeYZeXU.png', 'V04FeYZeXU.png');
INSERT INTO `resources` VALUES ('56', '/uploads/images/9wFAloK0XX.png', '9wFAloK0XX.png');

-- ----------------------------
-- Table structure for seo
-- ----------------------------
DROP TABLE IF EXISTS `seo`;
CREATE TABLE `seo` (
  `title` text CHARACTER SET latin1,
  `metakeyword` text CHARACTER SET latin1,
  `description` text CHARACTER SET latin1,
  `locale` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `seoId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`seoId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seo
-- ----------------------------
INSERT INTO `seo` VALUES ('SSCOM CONSTRUCTION AND CONSULTANT DESIGN JOINT STOCK COMPANY', 'construction, consultant design', 'SSCOM CONSTRUCTION AND CONSULTANT DESIGN JOINT STOCK COMPANY', 'en', '1');
INSERT INTO `seo` VALUES ('CÔNG TY C? PH?N XÂY D?NG VÀ T? V?N THI?T K? SSCOM', 'xây d?ng, t? v?n, thi?t k?', 'CÔNG TY C? PH?N XÂY D?NG VÀ T? V?N THI?T K? SSCOM', 'vn', '2');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `sliderId` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  `resourceId` int(11) NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`sliderId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('3', '1', '37', '', '1');
INSERT INTO `slider` VALUES ('4', '1', '38', '', '1');
INSERT INTO `slider` VALUES ('5', '1', '40', '', '2');
INSERT INTO `slider` VALUES ('6', '0', '41', '', '2');

-- ----------------------------
-- Table structure for upload
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `uploadId` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uploadId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of upload
-- ----------------------------
INSERT INTO `upload` VALUES ('3', '/uploads/images/mat-bang-san-vuon-canh-quan-2.png', 'mat-bang-san-vuon-canh-quan-2.png');
INSERT INTO `upload` VALUES ('2', '/uploads/images/nha-lam-viec-song-da-view01-final-pa2-1.jpeg', 'nha-lam-viec-song-da-view01-final-pa2-1.jpeg');
INSERT INTO `upload` VALUES ('4', '/uploads/images/nha-lam-viec-song-da-view01-final-pa2.jpeg', 'nha-lam-viec-song-da-view01-final-pa2.jpeg');
INSERT INTO `upload` VALUES ('5', '/uploads/images/nha-lam-viec-song-da-view02-final-pa2-4.png', 'nha-lam-viec-song-da-view02-final-pa2-4.png');
INSERT INTO `upload` VALUES ('6', '/uploads/images/nha-lam-viec-song-da-view03-final-pa2.jpeg', 'nha-lam-viec-song-da-view03-final-pa2.jpeg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@admin.admin', '$2y$10$Yp.24NLzak/08Szf1ImUnOEEOnsZwitaIVJBDArr8fC5wQRSA1yeS', '1', 'rr2k40cwfVIwWAOPUZKCWVyVWX2yNwZYAdh3zlpP0hJuq71vn60BE5TfDM29', '2016-08-18 19:25:44', '2016-09-27 15:53:11');
INSERT INTO `users` VALUES ('2', 'hoang', 'hoanglc1989@gmail.com', '$2y$10$OSPf5DC2bq9M8AN6DD9JK.E4nfxoj46mby1U91xIMNp5qE1cfuI9a', '1', 'eIHABvcAu7ow2xDt1ILoffIQI6683tJUmI9EVAuOgV0MhywZnM80rQ4vb8gZ', '2016-09-30 14:20:06', '2016-10-30 18:00:34');
