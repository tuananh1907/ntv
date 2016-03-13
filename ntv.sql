/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : ntv

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2016-03-13 23:44:54
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `alias`
-- ----------------------------
DROP TABLE IF EXISTS `alias`;
CREATE TABLE `alias` (
  `alias_id` int(11) NOT NULL AUTO_INCREMENT,
  `alias_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alias_module` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `language_id` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `langmap_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`alias_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of alias
-- ----------------------------
INSERT INTO `alias` VALUES ('1', 'bai-viet-tieng-viet', 'about', '1', 'vn', '1');
INSERT INTO `alias` VALUES ('2', 'english-post', 'about', '2', 'en', '1');
INSERT INTO `alias` VALUES ('3', 'bai-viet-tieng-viet-thu-2', 'about', '3', 'vn', '2');
INSERT INTO `alias` VALUES ('4', 'english-post-2', 'about', '4', 'en', '2');
INSERT INTO `alias` VALUES ('5', 'bai-viet-tieng-viet-thu-3', 'about', '5', 'vn', '3');
INSERT INTO `alias` VALUES ('6', 'english-post-3', 'about', '6', 'en', '3');
INSERT INTO `alias` VALUES ('7', 'tieu-de-vn-1', 'productcat', '1', 'vn', '4');
INSERT INTO `alias` VALUES ('8', 'english-titile-1', 'productcat', '2', 'en', '4');
INSERT INTO `alias` VALUES ('9', 'tieu-de-tieng-viet-2', 'productcat', '3', 'vn', '5');
INSERT INTO `alias` VALUES ('10', 'english-title-2', 'productcat', '4', 'en', '5');
INSERT INTO `alias` VALUES ('11', 'san-pham-tv-1', 'product', '7', 'vn', '6');
INSERT INTO `alias` VALUES ('12', 'english-produc', 'product', '8', 'en', '6');
INSERT INTO `alias` VALUES ('13', 'san-pham-tv-2', 'product', '9', 'vn', '7');
INSERT INTO `alias` VALUES ('14', 'english-product-2', 'product', '10', 'en', '7');
INSERT INTO `alias` VALUES ('15', 'apple-viet-nam', 'productcat', '5', 'vn', '8');
INSERT INTO `alias` VALUES ('16', 'apple-usa', 'productcat', '6', 'en', '8');
INSERT INTO `alias` VALUES ('17', 'iphone-5', 'product', '11', 'vn', '9');
INSERT INTO `alias` VALUES ('18', 'post-56e11e418f443', 'product', '12', 'en', '9');
INSERT INTO `alias` VALUES ('19', 'nokia-viet-nam', 'productcat', '7', 'vn', '10');
INSERT INTO `alias` VALUES ('20', 'nokia-usa', 'productcat', '8', 'en', '10');
INSERT INTO `alias` VALUES ('21', 'lumia-520-vn', 'product', '13', 'vn', '11');
INSERT INTO `alias` VALUES ('22', 'luima-520-usa', 'product', '14', 'en', '11');
INSERT INTO `alias` VALUES ('23', 'bai-viet-moi-bang-tv', 'news', '15', 'vn', '12');
INSERT INTO `alias` VALUES ('24', 'new-post-by-eng', 'news', '16', 'en', '12');
INSERT INTO `alias` VALUES ('25', 'bai-viet-thu-2-bang-tv', 'news', '17', 'vn', '13');
INSERT INTO `alias` VALUES ('26', '2nd-post-by-eng', 'news', '18', 'en', '13');
INSERT INTO `alias` VALUES ('27', 'bai-viet-thu-3-bang-tv', 'news', '19', 'vn', '14');
INSERT INTO `alias` VALUES ('28', '3rd-post-by-end', 'news', '20', 'en', '14');
INSERT INTO `alias` VALUES ('29', 'xay-old-trafford-o-hcm', 'projectcat', '9', 'vn', '15');
INSERT INTO `alias` VALUES ('30', 'old-trafford-at-hcmc', 'projectcat', '10', 'en', '15');
INSERT INTO `alias` VALUES ('31', 'xay-emiratest-o-hn', 'projectcat', '11', 'vn', '16');
INSERT INTO `alias` VALUES ('32', 'emirates-at-hn', 'projectcat', '12', 'en', '16');
INSERT INTO `alias` VALUES ('33', 'xay-dung-san-tap-carington', 'project', '21', 'vn', '17');
INSERT INTO `alias` VALUES ('34', 'carington-builiding', 'project', '22', 'en', '17');
INSERT INTO `alias` VALUES ('35', 'xay-san-tap-arsenal', 'project', '23', 'vn', '18');
INSERT INTO `alias` VALUES ('36', 'stadium-for-prcatice', 'project', '24', 'en', '18');
INSERT INTO `alias` VALUES ('37', 'mua-henry-tro-lai', 'project', '25', 'vn', '19');
INSERT INTO `alias` VALUES ('38', 'bring-henry-comback', 'project', '26', 'en', '19');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `category_content` text COLLATE utf8_unicode_ci,
  `category_order` int(11) NOT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT '0',
  `category_datecreated` datetime NOT NULL,
  `category_module` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category_seo_title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_seo_keywords` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_seo_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catparent_id` int(11) NOT NULL DEFAULT '0',
  `language_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `category_level` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `langmap_id` int(11) DEFAULT NULL,
  `category_lock` tinyint(4) DEFAULT '0',
  `category_link` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Tiêu đề vn 1 ', '<p>AAAAAAAAAAAAAAAAA Tiêu đe TV&nbsp;1</p>\r\n', '4', '1', '2016-03-10 03:47:27', 'productcat', 'Tiêu đề vn 1 ', '', '', '0', 'vn', '', '4', '0', '/tieu-de-vn-1');
INSERT INTO `category` VALUES ('2', 'english titile 1', '<p>AAAAAAAAAAAAAAAAA TITLE ENG 1</p>\r\n', '4', '1', '2016-03-10 03:47:27', 'productcat', 'english titile 1', '', '', '0', 'en', '', '4', '0', '/english-titile-1');
INSERT INTO `category` VALUES ('3', 'tieu de tieng viet 2', '<p>BBBBBBBBBBBBBBBB TIEU DE TV 2</p>\r\n', '3', '1', '2016-03-10 03:48:08', 'productcat', 'tieu de tieng viet 2', '', '', '0', 'vn', '', '5', '0', '/tieu-de-tieng-viet-2');
INSERT INTO `category` VALUES ('4', 'english title 2', '<p>BBBBBBBBBBBBBBBB ENG TITLE 2</p>\r\n', '3', '1', '2016-03-10 03:48:08', 'productcat', 'english title 2', '', '', '0', 'en', '', '5', '0', '/english-title-2');
INSERT INTO `category` VALUES ('5', 'APPLE VIET NAM', '<p>IPHONE 7 VIET NAM</p>\r\n', '2', '1', '2016-03-10 08:11:39', 'productcat', 'APPLE VIET NAM', '', '', '0', 'vn', '', '8', '0', '/apple-viet-nam');
INSERT INTO `category` VALUES ('6', 'APPLE USA', '<p>IPHONE 7 USA</p>\r\n', '2', '1', '2016-03-10 08:11:39', 'productcat', 'APPLE USA', '', '', '0', 'en', '', '8', '0', '/apple-usa');
INSERT INTO `category` VALUES ('7', 'NOKIA VIET NAM', '', '1', '1', '2016-03-10 08:12:44', 'productcat', 'NOKIA VIET NAM', '', '', '0', 'vn', '', '10', '0', '/nokia-viet-nam');
INSERT INTO `category` VALUES ('8', 'NOKIA USA', '', '1', '1', '2016-03-10 08:12:44', 'productcat', 'NOKIA USA', '', '', '0', 'en', '', '10', '0', '/nokia-usa');
INSERT INTO `category` VALUES ('9', 'Xây Old Trafford ở HCM', '<p>ádsad123213123ádsad123213123ádsad123213123ádsad123213123ádsad123213123</p>\r\n', '1', '1', '2016-03-12 10:14:42', 'projectcat', 'Xây Old Trafford ở HCM', '', '', '0', 'vn', '', '15', '0', '/xay-old-trafford-o-hcm');
INSERT INTO `category` VALUES ('10', 'Old Trafford at HCMC', '<p>ađasadsadáađasadsadáađasadsadáađasadsadáađasadsadá</p>\r\n', '1', '1', '2016-03-12 10:14:42', 'projectcat', 'Old Trafford at HCMC', '', '', '0', 'en', '', '15', '0', '/old-trafford-at-hcmc');
INSERT INTO `category` VALUES ('11', 'Xây Emiratest ở HN', '<p>asdsadsadasdasdasdsadasdsadsa</p>\r\n', '1', '1', '2016-03-12 10:15:21', 'projectcat', 'Xây Emiratest ở HN', '', '', '0', 'vn', '', '16', '0', '/xay-emiratest-o-hn');
INSERT INTO `category` VALUES ('12', 'Emirates at HN', '<p>ádsad123213123ádsad123213123ádsad123213123ádsad123213123ádsad123213123ádsad123213123ádsad123213123ádsad123213123ádsad123213123</p>\r\n', '1', '1', '2016-03-12 10:15:21', 'projectcat', 'Emirates at HN', '', '', '0', 'en', '', '16', '0', '/emirates-at-hn');

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `field_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('36', '_smtp_', 'ssl://smtp.gmail.com');
INSERT INTO `config` VALUES ('37', '_port_', '465');
INSERT INTO `config` VALUES ('38', '_auth_', '0');
INSERT INTO `config` VALUES ('39', '_ssl_', '0');
INSERT INTO `config` VALUES ('40', '_smtp_account_', 'thducuit@gmail.com');
INSERT INTO `config` VALUES ('41', '_smtp_password_', 'choancut!@#');
INSERT INTO `config` VALUES ('42', '_smtp_sender_', 'giauthai2204@yahoo.com');
INSERT INTO `config` VALUES ('43', '_smtp_receiver_', 'ng.tuananh1907@gmai.com');
INSERT INTO `config` VALUES ('44', '_gmail_', '');
INSERT INTO `config` VALUES ('45', '_password_', '');
INSERT INTO `config` VALUES ('46', '_profileID_', '115370826');
INSERT INTO `config` VALUES ('47', '_tracking_code_', '<script>\r\n  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');\r\n\r\n  ga(\'create\', \'UA-73045000-1\', \'auto\');\r\n  ga(\'send\', \'pageview\');\r\n\r\n</script>');
INSERT INTO `config` VALUES ('48', '_google_map_', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3917.3532310267246!2d106.88847!3d10.9366675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174de6cbff5bf79%3A0x21c412885fbc1a4b!2sC%C3%B4ng+Ty+TNHH+Sanko+Mold+Vi%E1%BB%87t+Nam!5e0!3m2!1svi!2s!4v1449462005687\" width=\"234\" height=\"219\" frameborder=\"0\" style=\"border:0\"></iframe>');
INSERT INTO `config` VALUES ('49', '_address_', '<p class=\"navText01\"><span class=\"bold\">VIETNAM: SMV</span><br />\r\n                Sanko Mold Vietnam Co., Ltd.</p>\r\n            <p class=\"navText01\">Amata Industrial Park<br />\r\n                116/1 Amata Rd., Bien Hoa City,<br />\r\n                Dong Nai Province, Viet Nam<br />\r\n                Tel : (+84)61 393 6635 / 393 6636<br />\r\n                Fax: (+84)61 393 6637<br />\r\n                E-mail: <a href=\"mailto:sale@sankomold.com\">sale@sankomold.com</a>\r\n            </p>');
INSERT INTO `config` VALUES ('50', '_email_subject_', 'Test');
INSERT INTO `config` VALUES ('51', '_google_map_mobile_', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3917.3532310267246!2d106.88847!3d10.9366675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174de6cbff5bf79%3A0x21c412885fbc1a4b!2sC%C3%B4ng+Ty+TNHH+Sanko+Mold+Vi%E1%BB%87t+Nam!5e0!3m2!1svi!2s!4v1449462005687\" width=\"100%\" height=\"219\" frameborder=\"0\" style=\"border:0\"></iframe>');
INSERT INTO `config` VALUES ('52', '_address_mobile_', '<p class=\"navText01\"><span class=\"bold\">VIETNAM: SMV</span><br />\r\n                        Sanko Mold Vietnam Co., Ltd.</p>\r\n                    <p class=\"navText01 mb0\">Amata Industrial Park<br />\r\n                        116/1 Amata Rd., Bien Hoa City,<br />\r\n                        Dong Nai Province, Viet Nam<br />\r\n                        Tel : (+84)61 393 6635 / 393 6636<br />\r\n                        Fax: (+84)61 393 6637<br />\r\n                        E-mail: <a href=\"mailto:sale@sankomold.com\">sale@sankomold.com</a></p>');
INSERT INTO `config` VALUES ('53', '_smtp_name_sender_', 'SankoMoldVN');

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `group_description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `group_builtin` tinyint(1) NOT NULL DEFAULT '0',
  `group_datecreated` datetime NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_permission` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('1', 'Administrator', 'Nhóm quản trị hệ thống', '1', '2016-03-13 17:34:38', '1', '{\"config\":\"15\",\"user\":\"15\",\"group\":\"15\",\"analytics\":\"15\",\"page\":\"15\",\"projects\":\"15\",\"projectcat\":\"15\",\"project\":\"15\",\"partner\":\"15\",\"aboutpage\":\"15\",\"about\":\"15\",\"productpage\":\"15\",\"productcat\":\"15\",\"product\":\"15\",\"newspage\":\"15\",\"news\":\"15\",\"careerpage\":\"15\",\"career\":\"15\",\"library\":\"15\",\"slider\":\"15\",\"ads\":\"15\",\"slidermobile\":\"15\",\"adsmobile\":\"15\"}');

-- ----------------------------
-- Table structure for `langmap`
-- ----------------------------
DROP TABLE IF EXISTS `langmap`;
CREATE TABLE `langmap` (
  `langmap_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `langmap_module` varchar(20) NOT NULL,
  PRIMARY KEY (`langmap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of langmap
-- ----------------------------
INSERT INTO `langmap` VALUES ('1', 'about');
INSERT INTO `langmap` VALUES ('2', 'about');
INSERT INTO `langmap` VALUES ('3', 'about');
INSERT INTO `langmap` VALUES ('4', 'productcat');
INSERT INTO `langmap` VALUES ('5', 'productcat');
INSERT INTO `langmap` VALUES ('6', 'product');
INSERT INTO `langmap` VALUES ('7', 'product');
INSERT INTO `langmap` VALUES ('8', 'productcat');
INSERT INTO `langmap` VALUES ('9', 'product');
INSERT INTO `langmap` VALUES ('10', 'productcat');
INSERT INTO `langmap` VALUES ('11', 'product');
INSERT INTO `langmap` VALUES ('12', 'news');
INSERT INTO `langmap` VALUES ('13', 'news');
INSERT INTO `langmap` VALUES ('14', 'news');
INSERT INTO `langmap` VALUES ('15', 'projectcat');
INSERT INTO `langmap` VALUES ('16', 'projectcat');
INSERT INTO `langmap` VALUES ('17', 'project');
INSERT INTO `langmap` VALUES ('18', 'project');
INSERT INTO `langmap` VALUES ('19', 'project');
INSERT INTO `langmap` VALUES ('20', 'page');
INSERT INTO `langmap` VALUES ('26', 'page');
INSERT INTO `langmap` VALUES ('27', 'page');
INSERT INTO `langmap` VALUES ('29', 'page');
INSERT INTO `langmap` VALUES ('30', 'page');
INSERT INTO `langmap` VALUES ('31', 'page');
INSERT INTO `langmap` VALUES ('32', 'page');

-- ----------------------------
-- Table structure for `language`
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `language_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `language_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of language
-- ----------------------------
INSERT INTO `language` VALUES ('en', '0');
INSERT INTO `language` VALUES ('vn', '1');

-- ----------------------------
-- Table structure for `media`
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `media_module` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `language_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `media_file` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `langmap_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES ('5', 'Gallery ads', 'ads', null, 'jp', '[{\\\"img\\\":\\\"/upload/files/index_bnr_01(1).jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"http://sanko-mold.jp/\\\"},{\\\"img\\\":\\\"/upload/files/index_bnr_03.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"http://sanko-mold.co.th/\\\"},{\\\"img\\\":\\\"/upload/files/index_bnr_02.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"\\\"}]', '31');
INSERT INTO `media` VALUES ('6', 'Gallery ads', 'ads', null, 'en', '[{\\\"img\\\":\\\"/upload/files/Banner/index_bnr_04.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"http://sanko-mold.jp/\\\"},{\\\"img\\\":\\\"/upload/files/Banner/index_bnr_05.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"http://sanko-mold.co.th/\\\"},{\\\"img\\\":\\\"/upload/files/index_bnr_02.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"\\\"}]', '31');
INSERT INTO `media` VALUES ('7', 'Gallery slider', 'slider', null, 'jp', '[{\\\"img\\\":\\\"/upload/files/Banner/index_main_01.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"\\\"}]', '30');
INSERT INTO `media` VALUES ('8', 'Gallery slider', 'slider', null, 'en', '[{\\\"img\\\":\\\"/upload/files/Banner/index_main_01.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"\\\"}]', '30');
INSERT INTO `media` VALUES ('9', 'Gallery slidermobile', 'slidermobile', null, 'jp', '[{\\\"img\\\":\\\"/upload/files/Banner/index_main_01_sp.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"\\\"}]', '66');
INSERT INTO `media` VALUES ('10', 'Gallery slidermobile', 'slidermobile', null, 'en', '[{\\\"img\\\":\\\"/upload/files/Banner/index_main_01_sp.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"\\\"}]', '66');
INSERT INTO `media` VALUES ('11', 'Gallery adsmobile', 'adsmobile', null, 'jp', '[{\\\"img\\\":\\\"/upload/files/Banner/index_bnr_01_sp.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"http://sanko-mold.jp/\\\"},{\\\"img\\\":\\\"/upload/files/Banner/index_bnr_03_sp.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"http://sanko-mold.co.th/\\\"},{\\\"img\\\":\\\"/upload/files/Banner/index_bnr_02_sp.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"\\\"}]', '67');
INSERT INTO `media` VALUES ('12', 'Gallery adsmobile', 'adsmobile', null, 'en', '[{\\\"img\\\":\\\"/upload/files/Banner/index_bnr_04_sp.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"http://sanko-mold.jp/\\\"},{\\\"img\\\":\\\"/upload/files/Banner/index_bnr_05_sp.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"http://sanko-mold.co.th/\\\"},{\\\"img\\\":\\\"/upload/files/Banner/index_bnr_02_sp.jpg\\\",\\\"w\\\":\\\"\\\",\\\"h\\\":\\\"\\\",\\\"a\\\":\\\"\\\"}]', '67');

-- ----------------------------
-- Table structure for `meta`
-- ----------------------------
DROP TABLE IF EXISTS `meta`;
CREATE TABLE `meta` (
  `meta_id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_module` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  `langmap_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of meta
-- ----------------------------
INSERT INTO `meta` VALUES ('1', 'career', '46', '_quantity', '12222dd', null);
INSERT INTO `meta` VALUES ('2', 'career', '46', '_deadline', '1ddd', null);
INSERT INTO `meta` VALUES ('3', 'career', '47', '_quantity', '12222dd', null);
INSERT INTO `meta` VALUES ('4', 'career', '47', '_deadline', '1ddd', null);
INSERT INTO `meta` VALUES ('5', '', '31', '_feature_title', '<span class=\"ttl\">つの理由</span> <span class=\"txt\">サンコーモールドベトナムが選ばれる</span>', '19');
INSERT INTO `meta` VALUES ('6', '', '31', '_feature', '[\"\\u5275\\u696d\\uff14\\uff13\\u5e74\\u3001\\u30d9\\u30c8\\u30ca\\u30e0\\u8a2d\\u7acb\\uff11\\uff15\\u5e74\\u306e\\u4fe1\\u983c\\u3068\\u5b9f\\u7e3e\",\"\\u65e5\\u7cfb\\u4f01\\u696d\\u3068\\u3057\\u3066\\u306e\\u6559\\u80b2\\u306b\\u3088\\u308b\\u3001\\u54c1\\u8cea\\u3001\\u7d0d\\u671f\\u306e\\u9075\\u5b88\",\"\\u91d1\\u578b\\u90e8\\u9580\\u3001\\u6210\\u5f62\\u90e8\\u9580\\u304c\\u3042\\u308a\\u3001<br \\/>\\n\\u30c1\\u30e5\\u30fc\\u30cb\\u30f3\\u30b0\\u3084\\u4fee\\u7406\\u4fee\\u7e55\\u306e\\u3059\\u3070\\u3084\\u3044\\u5bfe\\u5fdc\",\"\\u6d17\\u7df4\\u3055\\u308c\\u305f\\u88fd\\u54c1\\u3001\\u30de\\u30a4\\u30af\\u30ed\\u88fd\\u54c1\\u306e\\u751f\\u7523\\u304c\\u53ef\\u80fd\",\"\\u9ad8\\u54c1\\u8cea\\u30fb\\u4f4e\\u30b3\\u30b9\\u30c8\\u3067\\u306e\\u5bfe\\u5fdc\"]', '19');
INSERT INTO `meta` VALUES ('7', '', '32', '_feature_title', '<span class=\"ttl\">reasons</span> <span class=\"txt\">to choose Sanko Mold Vietnam</span>', '19');
INSERT INTO `meta` VALUES ('8', '', '32', '_feature', '[\"43 years of experience in plastic mold industry, work in Vietnam for 15 years\",\"Japan Technology Inherit from SankoMold Japan\",\"High-technology, Latest equiment\",\"Precise product, even we produce super small products\",\"Reasonable cost\"]', '19');
INSERT INTO `meta` VALUES ('9', '', '25', '_feature_title', '', '16');
INSERT INTO `meta` VALUES ('10', '', '25', '_feature', 'null', '16');
INSERT INTO `meta` VALUES ('11', '', '26', '_feature_title', '', '16');
INSERT INTO `meta` VALUES ('12', '', '26', '_feature', 'null', '16');
INSERT INTO `meta` VALUES ('13', '', '27', '_feature_title', '', '17');
INSERT INTO `meta` VALUES ('14', '', '27', '_feature', 'null', '17');
INSERT INTO `meta` VALUES ('15', '', '28', '_feature_title', '', '17');
INSERT INTO `meta` VALUES ('16', '', '28', '_feature', 'null', '17');
INSERT INTO `meta` VALUES ('21', '', '21', '_feature_title', '日越対抗フットサルゲーム1', '14');
INSERT INTO `meta` VALUES ('22', '', '21', '_feature', 'null', '14');
INSERT INTO `meta` VALUES ('23', '', '22', '_feature_title', '', '14');
INSERT INTO `meta` VALUES ('24', '', '22', '_feature', 'null', '14');
INSERT INTO `meta` VALUES ('25', '', '23', '_feature_title', '', '15');
INSERT INTO `meta` VALUES ('26', '', '23', '_feature', 'null', '15');
INSERT INTO `meta` VALUES ('27', '', '24', '_feature_title', '', '15');
INSERT INTO `meta` VALUES ('28', '', '24', '_feature', 'null', '15');
INSERT INTO `meta` VALUES ('29', '', '29', '_feature_title', '', '18');
INSERT INTO `meta` VALUES ('30', '', '29', '_feature', 'null', '18');
INSERT INTO `meta` VALUES ('31', '', '30', '_feature_title', '', '18');
INSERT INTO `meta` VALUES ('32', '', '30', '_feature', 'null', '18');
INSERT INTO `meta` VALUES ('33', '', '33', '_feature_title', '', '20');
INSERT INTO `meta` VALUES ('34', '', '33', '_feature', 'null', '20');
INSERT INTO `meta` VALUES ('35', '', '34', '_feature_title', '', '20');
INSERT INTO `meta` VALUES ('36', '', '34', '_feature', 'null', '20');
INSERT INTO `meta` VALUES ('37', 'career', '94', '_quantity', '30', '56');
INSERT INTO `meta` VALUES ('38', 'career', '94', '_deadline', '31-03-2016', '56');
INSERT INTO `meta` VALUES ('39', 'career', '95', '_quantity', '30', '56');
INSERT INTO `meta` VALUES ('40', 'career', '95', '_deadline', '31-03-2016', '56');
INSERT INTO `meta` VALUES ('41', 'career', '96', '_quantity', '44', '57');
INSERT INTO `meta` VALUES ('42', 'career', '96', '_deadline', '09-01-2016', '57');
INSERT INTO `meta` VALUES ('43', 'career', '97', '_quantity', '44', '57');
INSERT INTO `meta` VALUES ('44', 'career', '97', '_deadline', '09-01-2016', '57');
INSERT INTO `meta` VALUES ('45', 'news', '90', '_datetime', '17-07-2015', '54');
INSERT INTO `meta` VALUES ('46', 'news', '91', '_datetime', '17-07-2015', '54');
INSERT INTO `meta` VALUES ('47', 'news', '92', '_datetime', '17-07-2010', '55');
INSERT INTO `meta` VALUES ('48', 'news', '93', '_datetime', '17-07-2010', '55');
INSERT INTO `meta` VALUES ('49', 'page', '31', '_slogan_title', 'THE MANAGEMENT POLICIES', '19');
INSERT INTO `meta` VALUES ('50', 'page', '31', '_slogan', '[\"SMV develops the person who is reliable\",\"SMV becomes the company which is reliabledasd\",\"SMV associates trust each other\"]', '19');
INSERT INTO `meta` VALUES ('51', 'page', '32', '_slogan_title', 'THE MANAGEMENT POLICIES', '19');
INSERT INTO `meta` VALUES ('52', 'page', '32', '_slogan', '[\"SMV develops the person who is reliable\",\"SMV becomes the company which is reliable\",\"SMV associates trust each other\"]', '19');
INSERT INTO `meta` VALUES ('53', 'news', '15', '_datetime', '1', '12');
INSERT INTO `meta` VALUES ('54', 'news', '16', '_datetime', '1', '12');
INSERT INTO `meta` VALUES ('55', 'news', '17', '_datetime', '1', '13');
INSERT INTO `meta` VALUES ('56', 'news', '18', '_datetime', '1', '13');
INSERT INTO `meta` VALUES ('57', 'news', '19', '_datetime', '1', '14');
INSERT INTO `meta` VALUES ('58', 'news', '20', '_datetime', '1', '14');
INSERT INTO `meta` VALUES ('59', 'page', '27', '_feature_title', '', '20');
INSERT INTO `meta` VALUES ('60', 'page', '27', '_feature', '[\"\"]', '20');
INSERT INTO `meta` VALUES ('61', 'page', '27', '_slogan_title', '', '20');
INSERT INTO `meta` VALUES ('62', 'page', '27', '_slogan', '[\"\"]', '20');
INSERT INTO `meta` VALUES ('63', 'page', '28', '_feature_title', '', '20');
INSERT INTO `meta` VALUES ('64', 'page', '28', '_feature', '[\"\"]', '20');
INSERT INTO `meta` VALUES ('65', 'page', '28', '_slogan_title', '', '20');
INSERT INTO `meta` VALUES ('66', 'page', '28', '_slogan', '[\"\"]', '20');
INSERT INTO `meta` VALUES ('107', 'page', '39', '_feature_title', '', '26');
INSERT INTO `meta` VALUES ('108', 'page', '39', '_feature', '[\"\"]', '26');
INSERT INTO `meta` VALUES ('109', 'page', '39', '_slogan_title', '', '26');
INSERT INTO `meta` VALUES ('110', 'page', '39', '_slogan', '[\"\"]', '26');
INSERT INTO `meta` VALUES ('111', 'page', '40', '_feature_title', '', '26');
INSERT INTO `meta` VALUES ('112', 'page', '40', '_feature', '[\"\"]', '26');
INSERT INTO `meta` VALUES ('113', 'page', '40', '_slogan_title', '', '26');
INSERT INTO `meta` VALUES ('114', 'page', '40', '_slogan', '[\"\"]', '26');
INSERT INTO `meta` VALUES ('115', 'page', '41', '_feature_title', '', '27');
INSERT INTO `meta` VALUES ('116', 'page', '41', '_feature', '[\"\"]', '27');
INSERT INTO `meta` VALUES ('117', 'page', '41', '_slogan_title', '', '27');
INSERT INTO `meta` VALUES ('118', 'page', '41', '_slogan', '[\"\"]', '27');
INSERT INTO `meta` VALUES ('119', 'page', '42', '_feature_title', '', '27');
INSERT INTO `meta` VALUES ('120', 'page', '42', '_feature', '[\"\"]', '27');
INSERT INTO `meta` VALUES ('121', 'page', '42', '_slogan_title', '', '27');
INSERT INTO `meta` VALUES ('122', 'page', '42', '_slogan', '[\"\"]', '27');
INSERT INTO `meta` VALUES ('131', 'page', '45', '_feature_title', '', '29');
INSERT INTO `meta` VALUES ('132', 'page', '45', '_feature', '[\"\"]', '29');
INSERT INTO `meta` VALUES ('133', 'page', '45', '_slogan_title', '', '29');
INSERT INTO `meta` VALUES ('134', 'page', '45', '_slogan', '[\"\"]', '29');
INSERT INTO `meta` VALUES ('135', 'page', '46', '_feature_title', '', '29');
INSERT INTO `meta` VALUES ('136', 'page', '46', '_feature', '[\"\"]', '29');
INSERT INTO `meta` VALUES ('137', 'page', '46', '_slogan_title', '', '29');
INSERT INTO `meta` VALUES ('138', 'page', '46', '_slogan', '[\"\"]', '29');
INSERT INTO `meta` VALUES ('139', 'page', '47', '_feature_title', '', '30');
INSERT INTO `meta` VALUES ('140', 'page', '47', '_feature', '[\"\"]', '30');
INSERT INTO `meta` VALUES ('141', 'page', '47', '_slogan_title', '', '30');
INSERT INTO `meta` VALUES ('142', 'page', '47', '_slogan', '[\"\"]', '30');
INSERT INTO `meta` VALUES ('143', 'page', '48', '_feature_title', '', '30');
INSERT INTO `meta` VALUES ('144', 'page', '48', '_feature', '[\"\"]', '30');
INSERT INTO `meta` VALUES ('145', 'page', '48', '_slogan_title', '', '30');
INSERT INTO `meta` VALUES ('146', 'page', '48', '_slogan', '[\"\"]', '30');
INSERT INTO `meta` VALUES ('147', 'page', '49', '_feature_title', '', '31');
INSERT INTO `meta` VALUES ('148', 'page', '49', '_feature', '[\"\"]', '31');
INSERT INTO `meta` VALUES ('149', 'page', '49', '_slogan_title', '', '31');
INSERT INTO `meta` VALUES ('150', 'page', '49', '_slogan', '[\"\"]', '31');
INSERT INTO `meta` VALUES ('151', 'page', '50', '_feature_title', '', '31');
INSERT INTO `meta` VALUES ('152', 'page', '50', '_feature', '[\"\"]', '31');
INSERT INTO `meta` VALUES ('153', 'page', '50', '_slogan_title', '', '31');
INSERT INTO `meta` VALUES ('154', 'page', '50', '_slogan', '[\"\"]', '31');
INSERT INTO `meta` VALUES ('155', 'page', '51', '_feature_title', '', '32');
INSERT INTO `meta` VALUES ('156', 'page', '51', '_feature', '[\"\"]', '32');
INSERT INTO `meta` VALUES ('157', 'page', '51', '_slogan_title', '', '32');
INSERT INTO `meta` VALUES ('158', 'page', '51', '_slogan', '[\"\"]', '32');
INSERT INTO `meta` VALUES ('159', 'page', '52', '_feature_title', '', '32');
INSERT INTO `meta` VALUES ('160', 'page', '52', '_feature', '[\"\"]', '32');
INSERT INTO `meta` VALUES ('161', 'page', '52', '_slogan_title', '', '32');
INSERT INTO `meta` VALUES ('162', 'page', '52', '_slogan', '[\"\"]', '32');

-- ----------------------------
-- Table structure for `module`
-- ----------------------------
DROP TABLE IF EXISTS `module`;
CREATE TABLE `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `module_name` text COLLATE utf8_unicode_ci,
  `module_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `module_order` int(11) NOT NULL,
  `module_parent` int(11) NOT NULL DEFAULT '0',
  `module_option` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `module_level` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `module_status` tinyint(1) NOT NULL,
  `module_menu` int(11) DEFAULT '0',
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of module
-- ----------------------------
INSERT INTO `module` VALUES ('1', 'user', 'Thành viên', '/index.php/admin/user', '1', '3', '[\"26\"]', '--', '1', null);
INSERT INTO `module` VALUES ('2', 'group', 'Nhóm thành viên', '/index.php/admin/group', '1', '3', '[\"27\",\"26\"]', '--', '1', null);
INSERT INTO `module` VALUES ('3', 'config', 'Cấu hình chung', '#', '1', '0', '[\"27\",\"26\"]', '', '1', null);
INSERT INTO `module` VALUES ('4', 'library', 'Thư viện', '#', '7', '0', '[\"27\",\"26\"]', '', '1', null);
INSERT INTO `module` VALUES ('5', 'slider', 'Hình Slide', '/index.php/admin/gallery?mod=slider', '1', '4', 'false', '--', '1', '0');
INSERT INTO `module` VALUES ('6', 'ads', 'Banner', '/index.php/admin/gallery?mod=ads', '1', '4', 'false', '--', '1', '0');
INSERT INTO `module` VALUES ('7', 'newspage', 'Tin tức', '/#', '5', '0', '[\"27\",\"26\"]', '', '1', null);
INSERT INTO `module` VALUES ('8', 'news', 'Bài viết Tin Tức', '/index.php/admin/post?mod=news', '1', '7', '[\"content\",\"description\",\"photo\",\"seo\"]', '--', '1', '1');
INSERT INTO `module` VALUES ('9', 'careerpage', 'Tuyển dụng', '/#', '6', '0', 'false', '', '1', '0');
INSERT INTO `module` VALUES ('10', 'career', 'Bài viết Nghề nghiệp', '/index.php/admin/post?mod=career', '1', '9', '[\"content\",\"seo\"]', '--', '1', '1');
INSERT INTO `module` VALUES ('11', 'aboutpage', 'Giới thiệu', '/#', '2', '0', '[\"27\",\"26\"]', '', '1', null);
INSERT INTO `module` VALUES ('12', 'about', 'Bài viết Giới thiệu', '/index.php/admin/post?mod=about', '1', '11', '[\"content\",\"seo\"]', '--', '1', '1');
INSERT INTO `module` VALUES ('13', 'productpage', 'Sản phẩm', '/#', '3', '0', '[\"27\",\"26\"]', '', '1', null);
INSERT INTO `module` VALUES ('14', 'productcat', 'Bài viết Danh mục', '/index.php/admin/category?mod=productcat', '1', '13', '[\"content\",\"category\",\"seo\"]', '--', '1', '0');
INSERT INTO `module` VALUES ('15', 'product', 'Bài viết Sản phẩm', '/index.php/admin/post?mod=product', '1', '13', '[\"content\",\"category\",\"photo\",\"seo\"]', '--', '1', '1');
INSERT INTO `module` VALUES ('16', 'page', 'Danh mục Trang', '/index.php/admin/page?mod=page', '1', '0', '[\"content\",\"description\",\"photo\",\"seo\"]', '', '1', '0');
INSERT INTO `module` VALUES ('17', 'contact', 'Liên hệ', '/#', '1', '0', '[\"27\",\"26\"]', '', '0', '1');
INSERT INTO `module` VALUES ('18', 'index', 'Trang chủ', '/#', '1', '0', '[\"27\",\"26\"]', '', '0', '1');
INSERT INTO `module` VALUES ('19', 'sitemap', 'Sơ đồ web', '/#', '1', '0', '[\"27\",\"26\"]', '', '0', '1');
INSERT INTO `module` VALUES ('20', 'equipment', 'Thiết bị', '/#', '4', '0', '[\"27\",\"26\"]', '', '0', '1');
INSERT INTO `module` VALUES ('21', 'config', 'Cấu hình', '/index.php/admin/config', '1', '3', '[\"content\",\"description\",\"category\",\"photo\",\"seo\"]', '--', '1', '1');
INSERT INTO `module` VALUES ('22', 'slidermobile', 'Hình Slide Mobile', '/index.php/admin/gallery?mod=slidermobile', '1', '4', '[\"content\",\"description\",\"category\",\"photo\",\"seo\",\"highlight\"]', '--', '1', '0');
INSERT INTO `module` VALUES ('23', 'adsmobile', 'Banner Mobile', '/index.php/admin/gallery?mod=adsmobile', '1', '4', '[\"content\",\"description\",\"category\",\"photo\",\"seo\",\"highlight\"]', '--', '1', '0');
INSERT INTO `module` VALUES ('24', 'analytics', 'Analytics', '/index.php/admin/analytics', '1', '3', '[\"content\",\"description\",\"category\",\"photo\",\"seo\"]', '--', '1', '0');
INSERT INTO `module` VALUES ('25', 'projects', 'Công trình', '#', '1', '0', '[\"content\",\"description\",\"category\",\"photo\",\"seo\"]', '', '1', '1');
INSERT INTO `module` VALUES ('26', 'projectcat', 'Danh mục Công trình', '/index.php/admin/category?mod=projectcat', '1', '25', '[\"content\",\"description\",\"category\",\"photo\",\"seo\"]', '--', '1', '1');
INSERT INTO `module` VALUES ('27', 'project', 'Bài viết Công trình', '/index.php/admin/post?mod=project', '1', '25', '[\"content\",\"description\",\"category\",\"photo\",\"seo\"]', '--', '1', '1');
INSERT INTO `module` VALUES ('28', 'partner', 'Đối tác', '/index.php/admin/gallery?mod=partner', '1', '0', '[\"content\",\"description\",\"category\",\"photo\",\"seo\"]', '', '1', '1');

-- ----------------------------
-- Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8_unicode_ci,
  `post_content` text COLLATE utf8_unicode_ci,
  `post_datecreated` datetime NOT NULL,
  `post_order` int(11) NOT NULL DEFAULT '0',
  `post_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: active; 0: deactive; -1: draft',
  `post_module` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `post_seo_title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_seo_keywords` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_seo_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `post_lock` tinyint(4) DEFAULT NULL,
  `post_link` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `langmap_id` int(11) DEFAULT NULL,
  `post_featured_image` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_highlight` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', 'bai viet tieng viet', '', 'AAAAAAAAAAAAA TV', '2016-03-09 12:23:38', '1', '1', 'about', '0', 'bai viet tieng viet', '', '', 'vn', '0', '/bai-viet-tieng-viet', '1', '', 'post', '1');
INSERT INTO `post` VALUES ('2', 'english post', '', 'AAAAAAAAAAAAA ENG', '2016-03-09 12:23:38', '1', '1', 'about', '0', 'english post', '', '', 'en', '0', '/english-post', '1', '', 'post', '1');
INSERT INTO `post` VALUES ('3', 'bai viet tieng viet thu 2', '', 'BBBBBBBBBBBBBB TV', '2016-03-09 12:40:20', '2', '1', 'about', '0', 'bai viet tieng viet thu 2', '', '', 'vn', '0', '/bai-viet-tieng-viet-thu-2', '2', '', 'post', '1');
INSERT INTO `post` VALUES ('4', 'english post 2', '', 'BBBBBBBBBBBBBB ENG', '2016-03-09 12:40:20', '2', '1', 'about', '0', 'english post 2', '', '', 'en', '0', '/english-post-2', '2', '', 'post', '1');
INSERT INTO `post` VALUES ('5', 'bai viet tieng viet thu 3', '', 'CCCCCCCCCCCC TV', '2016-03-09 12:54:30', '3', '1', 'about', '0', 'bai viet tieng viet thu 3', '', '', 'vn', '0', '/bai-viet-tieng-viet-thu-3', '3', '', 'post', '1');
INSERT INTO `post` VALUES ('6', 'english post 3', '', 'CCCCCCCCCCCC ENG', '2016-03-09 12:54:30', '3', '1', 'about', '0', 'english post 3', '', '', 'en', '0', '/english-post-3', '3', '', 'post', '1');
INSERT INTO `post` VALUES ('7', 'san pham tv 1', '', '<p>AAAAAAAAAAAAAAA SP TV 1</p>\r\n', '2016-03-10 04:13:09', '4', '1', 'product', '1', 'san pham tv 1', '', '', 'vn', '0', '/san-pham-tv-1', '6', '/upload/files/p/p1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('8', 'english product 1', '', '<p>AAAAAAAAAAAAAAAAAAAA ENG PRODUCT 1</p>\r\n', '2016-03-10 04:13:09', '4', '1', 'product', '2', 'english product 1', '', '', 'en', '0', '/english-produc', '6', '/upload/files/p/p1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('9', 'san pham tv 2', '', '<p>BBBBBBBBBBBB TV 2</p>\r\n', '2016-03-10 05:29:46', '1', '1', 'product', '3', 'san pham tv 2', '', '', 'vn', '0', '/san-pham-tv-2', '7', '/upload/files/p/p1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('10', 'english product 2', '', '<p>BBBBBBBBBBBBB ENG PRODUCT 2</p>\r\n', '2016-03-10 05:29:46', '1', '1', 'product', '0', 'english product 2', '', '', 'en', '0', '/english-product-2', '7', '/upload/files/p/p1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('11', 'IPHONE 5', '', '', '2016-03-10 08:12:01', '1', '1', 'product', '5', 'IPHONE 5', '', '', 'vn', '0', '/iphone-5', '9', '/upload/files/d-i-1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('12', '', '', '', '2016-03-10 08:12:01', '2', '1', 'product', '0', '', '', '', 'en', '1', '/post-56e11e418f443', '9', '/upload/files/d-i-1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('13', 'LUMIA 520 VN', '', '<p>asdasdasdasdsadasdasdasdsadasdsad</p>\r\n', '2016-03-10 08:13:11', '1', '1', 'product', '7', 'LUMIA 520 VN', '', '', 'vn', '0', '/lumia-520-vn', '11', '/upload/files/d-i-t-3.jpg', 'post', '1');
INSERT INTO `post` VALUES ('14', 'LUIMA 520 USA', '', '', '2016-03-10 08:13:11', '1', '1', 'product', '8', 'LUIMA 520 USA', '', '', 'en', '0', '/luima-520-usa', '11', '/upload/files/d-i-t-3.jpg', 'post', '1');
INSERT INTO `post` VALUES ('15', 'Bài viết mời bằng TV', '<p>adssadsadasdadssadsadasdadssadsadasdadssadsadasd</p>\r\n', '<p>adssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasdadssadsadasd</p>\r\n', '2016-03-11 09:08:42', '1', '1', 'news', '0', 'Bài viết mời bằng TV', '', '', 'vn', '0', '/bai-viet-moi-bang-tv', '12', '/upload/files/d-i-t-3.jpg', 'post', '1');
INSERT INTO `post` VALUES ('16', 'New post by ENG', '<p>ASDASDASDASDASDASDASDASDASDASDASDASDASDASD</p>\r\n', '<p>ASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASDASD</p>\r\n', '2016-03-11 09:08:43', '1', '1', 'news', '0', 'New post by ENG', '', '', 'en', '0', '/new-post-by-eng', '12', '/upload/files/d-i-t-3.jpg', 'post', '1');
INSERT INTO `post` VALUES ('17', 'BAI VIET THU 2 BANG TV', '<p>12312312312312321313123</p>\r\n', '<p>sdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsddsdvsdd</p>\r\n', '2016-03-11 09:18:18', '3', '1', 'news', '0', 'BAI VIET THU 2 BANG TV', '', '', 'vn', '0', '/bai-viet-thu-2-bang-tv', '13', '/upload/files/d-i-1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('18', '2nd POST BY ENG', '<p>asdasdasdasdasdsasdasdasdasddasdasdasd</p>\r\n', '<p>asdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasdasdasdsadsdadsadasd2132131312</p>\r\n', '2016-03-11 09:18:19', '3', '1', 'news', '0', '2nd POST BY ENG', '', '', 'en', '0', '/2nd-post-by-eng', '13', '/upload/files/d-i-1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('19', 'BAI VIET THU 3 BANG TV', '<p>asdasdasdasdasdasdasdasdasdasdasdasd</p>\r\n', '<p>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</p>\r\n', '2016-03-11 09:21:32', '2', '1', 'news', '0', 'BAI VIET THU 3 BANG TV', '', '', 'vn', '0', '/bai-viet-thu-3-bang-tv', '14', '/upload/files/d-i-1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('20', '3rd post by END', '<p>asdasdasdsadasdasdasdsadasdasdasdsad</p>\r\n', '<p>asdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsadasdasdasdsad</p>\r\n', '2016-03-11 09:21:32', '2', '1', 'news', '0', '3rd post by END', '', '', 'en', '0', '/3rd-post-by-end', '14', '/upload/files/d-i-1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('21', 'Xây dựng sân tập Carington', '<p>Xây dựng sân tập Carington gom co 2913120938jdhaksjd ádhákjdh12983712932</p>\r\n', '<p>Xây dựng sân tập Carington gom co 2913120938jdhaksjd ádhákjdh12983712932Xây dựng sân tập Carington gom co 2913120938jdhaksjd ádhákjdh12983712932</p>\r\n', '2016-03-12 10:30:18', '1', '1', 'project', '9', 'Xây dựng sân tập Carington', '', '', 'vn', '0', '/xay-dung-san-tap-carington', '17', '/upload/files/img1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('22', 'Carington builiding', '<p>Carington builiding is asdhaskjdhsakj12987219j sajdhaskjdh9812ydsad</p>\r\n', '<p>Carington builiding is asdhaskjdhsakj12987219j sajdhaskjdh9812ydsadCarington builiding is asdhaskjdhsakj12987219j sajdhaskjdh9812ydsad</p>\r\n', '2016-03-12 10:30:18', '1', '1', 'project', '10', 'Carington builiding', '', '', 'en', '0', '/carington-builiding', '17', '/upload/files/img1.jpg', 'post', '1');
INSERT INTO `post` VALUES ('23', 'Xay san tap Arsenal ', '<p>Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;</p>\r\n', '<p>Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;</p>\r\n', '2016-03-12 10:32:30', '1', '1', 'project', '11', 'Xay san tap Arsenal ', '', '', 'vn', '0', '/xay-san-tap-arsenal', '18', '/upload/files/lib2.jpg', 'post', '1');
INSERT INTO `post` VALUES ('24', 'STADIUM for PRCATICE', '', '<p>Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;Xay san tap Arsenal&nbsp;</p>\r\n', '2016-03-12 10:32:30', '1', '1', 'project', '12', 'STADIUM for PRCATICE', '', '', 'en', '0', '/stadium-for-prcatice', '18', '/upload/files/lib2.jpg', 'post', '1');
INSERT INTO `post` VALUES ('25', 'MUA HENRY TRO LAI', '<p>MUA HENRY TRO LAI asdsadsad</p>\r\n', '<p>MUA HENRY TRO LAI asdsadsadMUA HENRY TRO LAI asdsadsadMUA HENRY TRO LAI asdsadsad&nbsp;MUA HENRY TRO LAI asdsadsad</p>\r\n', '2016-03-13 08:26:24', '2', '1', 'project', '11', 'MUA HENRY TRO LAI', '', '', 'vn', '0', '/mua-henry-tro-lai', '19', '/upload/files/n1.png', 'post', '1');
INSERT INTO `post` VALUES ('26', 'Bring henry comback', '<p>Bring henry comback asdasdsadds</p>\r\n', '<p>Bring henry comback asdasdsadds&nbsp;Bring henry comback asdasdsadds&nbsp;Bring henry comback asdasdsadds&nbsp;Bring henry comback asdasdsadds&nbsp;Bring henry comback asdasdsadds&nbsp;Bring henry comback asdasdsadds&nbsp;Bring henry comback asdasdsadds&nbsp;Bring henry comback asdasdsadds&nbsp;</p>\r\n', '2016-03-13 08:26:24', '2', '1', 'project', '12', 'Bring henry comback', '', '', 'en', '0', '/bring-henry-comback', '19', '/upload/files/n1.png', 'post', '1');
INSERT INTO `post` VALUES ('27', 'Trang chủ', '', '', '2016-03-13 09:57:14', '1', '1', 'index', '0', 'Trang chủ', '', '', 'vn', '0', '/index', '20', '', 'page', '1');
INSERT INTO `post` VALUES ('28', 'Homepage', '', '', '2016-03-13 09:57:14', '1', '1', 'index', '0', 'Homepage', '', '', 'en', '0', '/index', '20', '', 'page', '1');
INSERT INTO `post` VALUES ('39', 'Giới thiệu', '', '', '2016-03-13 10:01:24', '2', '1', 'about', '0', 'Giới thiệu', '', '', 'vn', '0', '/about', '26', '', 'page', '1');
INSERT INTO `post` VALUES ('40', 'About', '', '', '2016-03-13 10:01:24', '2', '1', 'about', '0', 'About', '', '', 'en', '0', '/about', '26', '', 'page', '1');
INSERT INTO `post` VALUES ('41', 'Sản phẩm', '', '', '2016-03-13 10:04:44', '3', '1', 'product', '0', 'Sản phẩm', '', '', 'vn', '0', '/product', '27', '', 'page', '1');
INSERT INTO `post` VALUES ('42', 'Products', '', '', '2016-03-13 10:04:45', '3', '1', 'product', '0', 'Products', '', '', 'en', '0', '/product', '27', '', 'page', '1');
INSERT INTO `post` VALUES ('45', 'Công trình', '', '', '2016-03-13 10:05:50', '1', '1', 'project', '0', 'Công trình', '', '', 'vn', '0', '/project', '29', '', 'page', '1');
INSERT INTO `post` VALUES ('46', 'Projects', '', '', '2016-03-13 10:05:50', '1', '1', 'project', '0', 'Projects', '', '', 'en', '0', '/project', '29', '', 'page', '1');
INSERT INTO `post` VALUES ('47', 'Liên hệ', '', '', '2016-03-13 10:08:05', '1', '1', 'contact', '0', 'Liên hệ', '', '', 'vn', '0', '/contact', '30', '', 'page', '1');
INSERT INTO `post` VALUES ('48', 'Contact', '', '', '2016-03-13 10:08:05', '1', '1', 'contact', '0', 'Contact', '', '', 'en', '0', '/contact', '30', '', 'page', '1');
INSERT INTO `post` VALUES ('49', 'Tin tức', '', '', '2016-03-13 10:09:00', '1', '1', 'news', '0', 'Tin tức', '', '', 'vn', '0', '/news', '31', '', 'page', '1');
INSERT INTO `post` VALUES ('50', 'News', '', '', '2016-03-13 10:09:00', '1', '1', 'news', '0', 'News', '', '', 'en', '0', '/news', '31', '', 'page', '1');
INSERT INTO `post` VALUES ('51', 'Đối tác', '', '', '2016-03-13 17:43:16', '1', '1', 'partner', '0', 'Đối tác', '', '', 'vn', '0', '/partner', '32', '', 'page', '1');
INSERT INTO `post` VALUES ('52', 'Partner', '', '', '2016-03-13 17:43:17', '1', '1', 'partner', '0', 'Partner', '', '', 'en', '0', '/partner', '32', '', 'page', '1');

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('4e81f973ca114aa5f9573e1f8f65e727', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.94 Safari/537.36', '1457861210', 'a:1:{s:11:\"user_entity\";a:13:{s:7:\"user_id\";s:1:\"8\";s:8:\"username\";s:13:\"administrator\";s:8:\"password\";s:32:\"5670843327f728dd2e6dbf6434df9740\";s:5:\"email\";s:15:\"admin@gmail.com\";s:8:\"fullname\";s:13:\"Administrator\";s:6:\"gender\";s:2:\"11\";s:7:\"address\";N;s:5:\"phone\";N;s:11:\"datecreated\";s:19:\"0000-00-00 00:00:00\";s:6:\"active\";s:1:\"1\";s:12:\"user_builtin\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:10:\"permission\";a:22:{s:6:\"config\";s:2:\"15\";s:4:\"user\";s:2:\"15\";s:5:\"group\";s:2:\"15\";s:9:\"analytics\";s:2:\"15\";s:4:\"page\";s:2:\"15\";s:8:\"projects\";s:2:\"15\";s:10:\"projectcat\";s:2:\"15\";s:7:\"project\";s:2:\"15\";s:9:\"aboutpage\";s:2:\"15\";s:5:\"about\";s:2:\"15\";s:11:\"productpage\";s:2:\"15\";s:10:\"productcat\";s:2:\"15\";s:7:\"product\";s:2:\"15\";s:8:\"newspage\";s:2:\"15\";s:4:\"news\";s:2:\"15\";s:10:\"careerpage\";s:2:\"15\";s:6:\"career\";s:2:\"15\";s:7:\"library\";s:2:\"15\";s:6:\"slider\";s:2:\"15\";s:3:\"ads\";s:2:\"15\";s:12:\"slidermobile\";s:2:\"15\";s:9:\"adsmobile\";s:2:\"15\";}}}');
INSERT INTO `sessions` VALUES ('9a3d79b0215c53b4d1931db0882f90e3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.94 Safari/537.36', '1457887362', 'a:2:{s:11:\"user_entity\";a:13:{s:7:\"user_id\";s:1:\"8\";s:8:\"username\";s:13:\"administrator\";s:8:\"password\";s:32:\"5670843327f728dd2e6dbf6434df9740\";s:5:\"email\";s:15:\"admin@gmail.com\";s:8:\"fullname\";s:13:\"Administrator\";s:6:\"gender\";s:2:\"11\";s:7:\"address\";N;s:5:\"phone\";N;s:11:\"datecreated\";s:19:\"0000-00-00 00:00:00\";s:6:\"active\";s:1:\"1\";s:12:\"user_builtin\";s:1:\"1\";s:8:\"group_id\";s:1:\"1\";s:10:\"permission\";a:23:{s:6:\"config\";s:2:\"15\";s:4:\"user\";s:2:\"15\";s:5:\"group\";s:2:\"15\";s:9:\"analytics\";s:2:\"15\";s:4:\"page\";s:2:\"15\";s:8:\"projects\";s:2:\"15\";s:10:\"projectcat\";s:2:\"15\";s:7:\"project\";s:2:\"15\";s:7:\"partner\";s:2:\"15\";s:9:\"aboutpage\";s:2:\"15\";s:5:\"about\";s:2:\"15\";s:11:\"productpage\";s:2:\"15\";s:10:\"productcat\";s:2:\"15\";s:7:\"product\";s:2:\"15\";s:8:\"newspage\";s:2:\"15\";s:4:\"news\";s:2:\"15\";s:10:\"careerpage\";s:2:\"15\";s:6:\"career\";s:2:\"15\";s:7:\"library\";s:2:\"15\";s:6:\"slider\";s:2:\"15\";s:3:\"ads\";s:2:\"15\";s:12:\"slidermobile\";s:2:\"15\";s:9:\"adsmobile\";s:2:\"15\";}}s:16:\"flash:old:notice\";a:2:{s:6:\"status\";s:7:\"success\";s:7:\"message\";s:25:\"Thêm vào thành công !\";}}');
INSERT INTO `sessions` VALUES ('be6e7e01a07138df0f46af2669db0406', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.94 Safari/537.36', '1457886860', '');

-- ----------------------------
-- Table structure for `tag`
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `language_id` varchar(100) DEFAULT NULL,
  `langmap_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES ('1', '6h toi', 'ti', '0', 'vn', '1');
INSERT INTO `tag` VALUES ('2', '6pm', 'ti', '0', 'en', '1');
INSERT INTO `tag` VALUES ('3', 'test vn 2', 'duc', '0', 'vn', '2');
INSERT INTO `tag` VALUES ('4', 'test en2', 'duc', '0', 'en', '2');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_builtin` tinyint(4) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('7', 'dukpro2910', '26fbe80ee81082af6cdf70178639c89b', 'nthanhduc@gmail.com', 'Duc Nguyen', '0', '', '', '0000-00-00 00:00:00', '1', '1', '2');
INSERT INTO `user` VALUES ('8', 'administrator', '5670843327f728dd2e6dbf6434df9740', 'admin@gmail.com', 'Administrator', '11', null, null, '0000-00-00 00:00:00', '1', '1', '1');
