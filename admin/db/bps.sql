/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : bps

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-03-07 14:59:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cluster
-- ----------------------------
DROP TABLE IF EXISTS `cluster`;
CREATE TABLE `cluster` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cluster` int(11) NOT NULL,
  `idx` char(11) NOT NULL,
  `v1` float NOT NULL,
  `v2` float NOT NULL,
  `v3` float NOT NULL,
  `v4` float NOT NULL,
  `v5` float NOT NULL,
  `v6` float NOT NULL,
  `v7` float NOT NULL,
  `v8` float NOT NULL,
  `v9` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cluster
-- ----------------------------
INSERT INTO `cluster` VALUES ('1', '1', 'c1', '922', '1789', '937', '128', '518', '453', '103', '487', '102');
INSERT INTO `cluster` VALUES ('2', '1', 'c2', '974', '2065', '877', '908', '172', '292', '564', '543', '154');
INSERT INTO `cluster` VALUES ('3', '2', 'c1', '1222', '1007.21', '887.286', '351.143', '775', '917.857', '360.714', '991.429', '693.429');
INSERT INTO `cluster` VALUES ('4', '2', 'c2', '1370.87', '1606.07', '863.4', '1026.6', '413.667', '817.2', '949.2', '726.267', '1154.6');
INSERT INTO `cluster` VALUES ('5', '3', 'c1', '1230.17', '769.083', '602.333', '489.917', '886.083', '822.5', '335.083', '1059.58', '499.417');
INSERT INTO `cluster` VALUES ('6', '3', 'c2', '1347.59', '1703.71', '1067.35', '849.176', '377.765', '896.353', '898.059', '709.353', '1237.29');
INSERT INTO `cluster` VALUES ('7', '4', 'c1', '1194.62', '847.154', '571.154', '512.769', '827.923', '777', '318.462', '987.077', '465.923');
INSERT INTO `cluster` VALUES ('8', '4', 'c2', '1383.81', '1698.69', '1121.75', '853.062', '393.25', '937.938', '946.75', '746.375', '1310.62');

-- ----------------------------
-- Table structure for data
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Kecamatan` varchar(75) NOT NULL,
  `JumRT` int(11) NOT NULL DEFAULT '0',
  `Pria` int(11) NOT NULL,
  `Wanita` int(11) NOT NULL,
  `v1` int(11) NOT NULL,
  `v2` int(11) NOT NULL,
  `v3` int(11) NOT NULL,
  `v4` int(11) NOT NULL,
  `v5` int(11) NOT NULL,
  `v6` int(11) NOT NULL,
  `v7` int(11) NOT NULL,
  `v8` int(11) NOT NULL,
  `v9` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Kecamatan` (`Kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data
-- ----------------------------
INSERT INTO `data` VALUES ('12', 'Cinangka', '13315', '28662', '28662', '2077', '1704', '974', '271', '722', '387', '972', '583', '1075');
INSERT INTO `data` VALUES ('13', 'Padarincang', '14356', '32601', '32601', '2762', '2191', '1950', '1263', '646', '234', '254', '227', '175');
INSERT INTO `data` VALUES ('14', 'Ciomas', '7903', '19778', '19778', '974', '2065', '877', '908', '172', '292', '564', '543', '154');
INSERT INTO `data` VALUES ('15', 'Pabuaran', '7965', '20342', '20342', '1806', '1071', '911', '657', '535', '657', '309', '453', '184');
INSERT INTO `data` VALUES ('16', 'Gunung Sari', '4157', '10390', '10390', '768', '1784', '197', '787', '130', '231', '119', '117', '64');
INSERT INTO `data` VALUES ('17', 'Baros', '10983', '27736', '27736', '779', '3783', '1773', '261', '213', '452', '435', '732', '375');
INSERT INTO `data` VALUES ('18', 'Petir', '10836', '26087', '26087', '765', '2779', '2391', '376', '547', '646', '545', '867', '360');
INSERT INTO `data` VALUES ('19', 'Tunjung Teja', '8533', '20411', '20411', '548', '3925', '762', '532', '134', '768', '342', '192', '49');
INSERT INTO `data` VALUES ('20', 'Cikeusal', '14338', '33639', '33639', '792', '2109', '1197', '110', '663', '853', '765', '1972', '237');
INSERT INTO `data` VALUES ('21', 'Pamarayan', '10711', '25589', '25589', '654', '2759', '4329', '326', '324', '974', '166', '129', '104');
INSERT INTO `data` VALUES ('22', 'Bandung', '6874', '16094', '16094', '922', '1789', '937', '128', '518', '453', '103', '487', '102');
INSERT INTO `data` VALUES ('23', 'Jawilan', '12418', '27876', '27876', '732', '1765', '432', '724', '325', '1735', '1909', '1975', '165');
INSERT INTO `data` VALUES ('24', 'Kopo', '9816', '25553', '25553', '2658', '1027', '229', '541', '977', '768', '973', '574', '350');
INSERT INTO `data` VALUES ('25', 'Cikande', '23294', '48427', '48427', '1972', '964', '769', '398', '334', '2427', '753', '605', '1654');
INSERT INTO `data` VALUES ('26', 'Kibin', '19060', '28511', '28511', '1371', '773', '552', '824', '874', '564', '249', '2962', '485');
INSERT INTO `data` VALUES ('27', 'Keragilan', '18733', '38633', '38633', '1672', '710', '829', '923', '464', '743', '1077', '1734', '1506');
INSERT INTO `data` VALUES ('28', 'Waringin Kurung', '9295', '21895', '21895', '1790', '479', '336', '909', '353', '564', '1557', '899', '2937');
INSERT INTO `data` VALUES ('29', 'Mancak', '9912', '23202', '23202', '2765', '633', '120', '2340', '865', '3454', '3421', '932', '2780');
INSERT INTO `data` VALUES ('30', 'Anyar', '12951', '27052', '27052', '1765', '290', '178', '111', '238', '3242', '546', '2131', '229');
INSERT INTO `data` VALUES ('31', 'Bojonegoro', '10360', '21965', '21965', '974', '631', '968', '196', '345', '754', '214', '1082', '946');
INSERT INTO `data` VALUES ('32', 'Pulo Ampel', '8874', '18105', '18105', '871', '229', '461', '541', '965', '634', '160', '120', '98');
INSERT INTO `data` VALUES ('33', 'Keramatwatu', '20255', '46329', '46329', '974', '643', '144', '123', '139', '345', '1724', '1572', '4120');
INSERT INTO `data` VALUES ('34', 'Ciruas', '17209', '37430', '37430', '1983', '794', '342', '897', '455', '685', '976', '319', '3201');
INSERT INTO `data` VALUES ('35', 'Pontang', '8601', '20843', '20843', '784', '653', '510', '142', '796', '453', '203', '1716', '1762');
INSERT INTO `data` VALUES ('36', 'Lebak Wangi', '7543', '17609', '17609', '956', '299', '239', '134', '2113', '292', '334', '992', '1202');
INSERT INTO `data` VALUES ('37', 'Carenang', '7745', '17404', '17404', '795', '1266', '390', '456', '435', '322', '182', '534', '2129');
INSERT INTO `data` VALUES ('38', 'Binuang', '6593', '14208', '14208', '788', '241', '752', '352', '1733', '457', '93', '123', '226');
INSERT INTO `data` VALUES ('39', 'Tiratayasa', '8464', '20305', '20305', '1075', '117', '294', '2143', '876', '743', '72', '103', '172');
INSERT INTO `data` VALUES ('40', 'Tanara', '7422', '19621', '19621', '899', '719', '1530', '2942', '164', '979', '271', '99', '186');

-- ----------------------------
-- Table structure for iterasi
-- ----------------------------
DROP TABLE IF EXISTS `iterasi`;
CREATE TABLE `iterasi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cluster` int(11) NOT NULL,
  `ID_data` int(11) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `min` char(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of iterasi
-- ----------------------------
INSERT INTO `iterasi` VALUES ('1', '1', '12', '1766.39', '1757.82', 'c2');
INSERT INTO `iterasi` VALUES ('2', '1', '13', '2453.91', '2216.89', 'c2');
INSERT INTO `iterasi` VALUES ('3', '1', '14', '1027.07', '0', 'c2');
INSERT INTO `iterasi` VALUES ('4', '1', '15', '1292.18', '1443.41', 'c1');
INSERT INTO `iterasi` VALUES ('5', '1', '16', '1159.33', '995.753', 'c2');
INSERT INTO `iterasi` VALUES ('6', '1', '17', '2247.42', '2083.14', 'c2');
INSERT INTO `iterasi` VALUES ('7', '1', '18', '1903.89', '1882.13', 'c2');
INSERT INTO `iterasi` VALUES ('8', '1', '19', '2299.97', '2051.15', 'c2');
INSERT INTO `iterasi` VALUES ('9', '1', '20', '1740.67', '1849.16', 'c1');
INSERT INTO `iterasi` VALUES ('10', '1', '21', '3605.39', '3695.89', 'c1');
INSERT INTO `iterasi` VALUES ('11', '1', '22', '0', '1027.07', 'c1');
INSERT INTO `iterasi` VALUES ('12', '1', '23', '2794.18', '2519.1', 'c2');
INSERT INTO `iterasi` VALUES ('13', '1', '24', '2324.23', '2355.66', 'c1');
INSERT INTO `iterasi` VALUES ('14', '1', '25', '2942.77', '3058.43', 'c1');
INSERT INTO `iterasi` VALUES ('15', '1', '26', '2880.83', '2926.89', 'c1');
INSERT INTO `iterasi` VALUES ('16', '1', '27', '2632.94', '2474.67', 'c2');
INSERT INTO `iterasi` VALUES ('17', '1', '28', '3715.01', '3526.83', 'c2');
INSERT INTO `iterasi` VALUES ('18', '1', '29', '6148.06', '5793.97', 'c2');
INSERT INTO `iterasi` VALUES ('19', '1', '30', '3782.33', '4016.8', 'c1');
INSERT INTO `iterasi` VALUES ('20', '1', '31', '1596.39', '1963.48', 'c1');
INSERT INTO `iterasi` VALUES ('21', '1', '32', '1789.94', '2186.4', 'c1');
INSERT INTO `iterasi` VALUES ('22', '1', '33', '4695.68', '4616.61', 'c2');
INSERT INTO `iterasi` VALUES ('23', '1', '34', '3676.01', '3557.88', 'c2');
INSERT INTO `iterasi` VALUES ('24', '1', '35', '2417.72', '2694.16', 'c1');
INSERT INTO `iterasi` VALUES ('25', '1', '36', '2607.07', '3040.64', 'c1');
INSERT INTO `iterasi` VALUES ('26', '1', '37', '2199.47', '2286.62', 'c1');
INSERT INTO `iterasi` VALUES ('27', '1', '38', '2030.49', '2560.02', 'c1');
INSERT INTO `iterasi` VALUES ('28', '1', '39', '2767.35', '2608.64', 'c2');
INSERT INTO `iterasi` VALUES ('29', '1', '40', '3162.83', '2671.51', 'c2');
INSERT INTO `iterasi` VALUES ('30', '2', '12', '1483.64', '1182.75', 'c2');
INSERT INTO `iterasi` VALUES ('31', '2', '13', '2661.32', '2366.49', 'c2');
INSERT INTO `iterasi` VALUES ('32', '2', '14', '1667.13', '1378.32', 'c2');
INSERT INTO `iterasi` VALUES ('33', '2', '15', '1056.87', '1442.74', 'c1');
INSERT INTO `iterasi` VALUES ('34', '2', '16', '1892.88', '1889.59', 'c2');
INSERT INTO `iterasi` VALUES ('35', '2', '17', '3066.09', '2747.49', 'c2');
INSERT INTO `iterasi` VALUES ('36', '2', '18', '2428.24', '2315.46', 'c2');
INSERT INTO `iterasi` VALUES ('37', '2', '19', '3241.02', '2875.17', 'c2');
INSERT INTO `iterasi` VALUES ('38', '2', '20', '1703.8', '2007.66', 'c1');
INSERT INTO `iterasi` VALUES ('39', '2', '21', '4071.01', '4055.97', 'c2');
INSERT INTO `iterasi` VALUES ('40', '2', '22', '1306.23', '1752.9', 'c1');
INSERT INTO `iterasi` VALUES ('41', '2', '23', '2382.16', '2240.79', 'c2');
INSERT INTO `iterasi` VALUES ('42', '2', '24', '1806.16', '1902.94', 'c1');
INSERT INTO `iterasi` VALUES ('43', '2', '25', '2068.44', '2019.42', 'c2');
INSERT INTO `iterasi` VALUES ('44', '2', '26', '2118.29', '2654.28', 'c1');
INSERT INTO `iterasi` VALUES ('45', '2', '27', '1572.67', '1438.37', 'c2');
INSERT INTO `iterasi` VALUES ('46', '2', '28', '2827.24', '2319.9', 'c2');
INSERT INTO `iterasi` VALUES ('47', '2', '29', '5218.04', '4595.5', 'c2');
INSERT INTO `iterasi` VALUES ('48', '2', '30', '2934.05', '3478.3', 'c1');
INSERT INTO `iterasi` VALUES ('49', '2', '31', '734.095', '1590.09', 'c1');
INSERT INTO `iterasi` VALUES ('50', '2', '32', '1489.12', '2233.44', 'c1');
INSERT INTO `iterasi` VALUES ('51', '2', '33', '3932.98', '3581.43', 'c2');
INSERT INTO `iterasi` VALUES ('52', '2', '34', '2914.64', '2386.7', 'c2');
INSERT INTO `iterasi` VALUES ('53', '2', '35', '1552.95', '2084.3', 'c1');
INSERT INTO `iterasi` VALUES ('54', '2', '36', '1865.76', '2584.97', 'c1');
INSERT INTO `iterasi` VALUES ('55', '2', '37', '1811.15', '1678.59', 'c2');
INSERT INTO `iterasi` VALUES ('56', '2', '38', '1722.85', '2549.57', 'c1');
INSERT INTO `iterasi` VALUES ('57', '2', '39', '2358.42', '2493.62', 'c1');
INSERT INTO `iterasi` VALUES ('58', '2', '40', '2958.38', '2646.28', 'c2');
INSERT INTO `iterasi` VALUES ('59', '3', '12', '1719.86', '1140.51', 'c2');
INSERT INTO `iterasi` VALUES ('60', '3', '13', '2826.87', '2339.86', 'c2');
INSERT INTO `iterasi` VALUES ('61', '3', '14', '1795.88', '1424.84', 'c2');
INSERT INTO `iterasi` VALUES ('62', '3', '15', '1079.21', '1508.64', 'c1');
INSERT INTO `iterasi` VALUES ('63', '3', '16', '1882.15', '1985.51', 'c1');
INSERT INTO `iterasi` VALUES ('64', '3', '17', '3381.3', '2583.36', 'c2');
INSERT INTO `iterasi` VALUES ('65', '3', '18', '2777.62', '2117.09', 'c2');
INSERT INTO `iterasi` VALUES ('66', '3', '19', '3460.73', '2798.59', 'c2');
INSERT INTO `iterasi` VALUES ('67', '3', '20', '1903.21', '1931.82', 'c1');
INSERT INTO `iterasi` VALUES ('68', '3', '21', '4426.79', '3830.5', 'c2');
INSERT INTO `iterasi` VALUES ('69', '3', '22', '1479.81', '1706.51', 'c1');
INSERT INTO `iterasi` VALUES ('70', '3', '23', '2428.65', '2298.23', 'c2');
INSERT INTO `iterasi` VALUES ('71', '3', '24', '1709.83', '2039.54', 'c1');
INSERT INTO `iterasi` VALUES ('72', '3', '25', '2284.32', '1944.22', 'c2');
INSERT INTO `iterasi` VALUES ('73', '3', '26', '1956.47', '2747.97', 'c1');
INSERT INTO `iterasi` VALUES ('74', '3', '27', '1625', '1529.72', 'c2');
INSERT INTO `iterasi` VALUES ('75', '3', '28', '2907.89', '2388.37', 'c2');
INSERT INTO `iterasi` VALUES ('76', '3', '29', '5262.62', '4674.31', 'c2');
INSERT INTO `iterasi` VALUES ('77', '3', '30', '2894.61', '3491.69', 'c1');
INSERT INTO `iterasi` VALUES ('78', '3', '31', '903.798', '1561.98', 'c1');
INSERT INTO `iterasi` VALUES ('79', '3', '32', '1248.86', '2338.43', 'c1');
INSERT INTO `iterasi` VALUES ('80', '3', '33', '4063.57', '3569.58', 'c2');
INSERT INTO `iterasi` VALUES ('81', '3', '34', '3043.58', '2413.5', 'c2');
INSERT INTO `iterasi` VALUES ('82', '3', '35', '1590.35', '2091.79', 'c1');
INSERT INTO `iterasi` VALUES ('83', '3', '36', '1685.16', '2664.54', 'c1');
INSERT INTO `iterasi` VALUES ('84', '3', '37', '1972.74', '1667.97', 'c2');
INSERT INTO `iterasi` VALUES ('85', '3', '38', '1541.82', '2616.03', 'c1');
INSERT INTO `iterasi` VALUES ('86', '3', '39', '2091.63', '2705.67', 'c1');
INSERT INTO `iterasi` VALUES ('87', '3', '40', '2925.13', '2772.78', 'c2');
INSERT INTO `iterasi` VALUES ('88', '4', '12', '1690.62', '1155.69', 'c2');
INSERT INTO `iterasi` VALUES ('89', '4', '13', '2778.69', '2365.28', 'c2');
INSERT INTO `iterasi` VALUES ('90', '4', '14', '1673.86', '1535.21', 'c2');
INSERT INTO `iterasi` VALUES ('91', '4', '15', '1012.53', '1586.25', 'c1');
INSERT INTO `iterasi` VALUES ('92', '4', '16', '1737.37', '2109.61', 'c1');
INSERT INTO `iterasi` VALUES ('93', '4', '17', '3297.03', '2625.06', 'c2');
INSERT INTO `iterasi` VALUES ('94', '4', '18', '2724', '2139.41', 'c2');
INSERT INTO `iterasi` VALUES ('95', '4', '19', '3349.06', '2872', 'c2');
INSERT INTO `iterasi` VALUES ('96', '4', '20', '1887.62', '1960.67', 'c1');
INSERT INTO `iterasi` VALUES ('97', '4', '21', '4391.7', '3830.65', 'c2');
INSERT INTO `iterasi` VALUES ('98', '4', '22', '1368.67', '1808.86', 'c1');
INSERT INTO `iterasi` VALUES ('99', '4', '23', '2426.42', '2304.24', 'c2');
INSERT INTO `iterasi` VALUES ('100', '4', '24', '1710.7', '2071.7', 'c1');
INSERT INTO `iterasi` VALUES ('101', '4', '25', '2320.15', '1900.92', 'c2');
INSERT INTO `iterasi` VALUES ('102', '4', '26', '2021.59', '2762.42', 'c1');
INSERT INTO `iterasi` VALUES ('103', '4', '27', '1682.29', '1491.54', 'c2');
INSERT INTO `iterasi` VALUES ('104', '4', '28', '2936.19', '2335.68', 'c2');
INSERT INTO `iterasi` VALUES ('105', '4', '29', '5310.91', '4596.35', 'c2');
INSERT INTO `iterasi` VALUES ('106', '4', '30', '2965.21', '3485.9', 'c1');
INSERT INTO `iterasi` VALUES ('107', '4', '31', '915.076', '1606.85', 'c1');
INSERT INTO `iterasi` VALUES ('108', '4', '32', '1204.7', '2420.33', 'c1');
INSERT INTO `iterasi` VALUES ('109', '4', '33', '4093.4', '3516.53', 'c2');
INSERT INTO `iterasi` VALUES ('110', '4', '34', '3054.73', '2369.02', 'c2');
INSERT INTO `iterasi` VALUES ('111', '4', '35', '1636.45', '2104.17', 'c1');
INSERT INTO `iterasi` VALUES ('112', '4', '36', '1743.54', '2694.59', 'c1');
INSERT INTO `iterasi` VALUES ('113', '4', '37', '1929.33', '1705.24', 'c2');
INSERT INTO `iterasi` VALUES ('114', '4', '38', '1538.8', '2681', 'c1');
INSERT INTO `iterasi` VALUES ('115', '4', '39', '2052.83', '2773.6', 'c1');
INSERT INTO `iterasi` VALUES ('116', '4', '40', '2876.67', '2814.23', 'c2');
SET FOREIGN_KEY_CHECKS=1;
