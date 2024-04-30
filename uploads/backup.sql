#
# TABLE STRUCTURE FOR: accounts
#

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `accounts_id` int(11) NOT NULL AUTO_INCREMENT,
  `accounts_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opening_balance` double NOT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`accounts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `accounts` (`accounts_id`, `accounts_name`, `opening_balance`, `note`, `user_id`) VALUES ('1', 'SAMPLE CHECKINC-AC', '27000', 'Checking Account Held At Eco Bank', '1');
INSERT INTO `accounts` (`accounts_id`, `accounts_name`, `opening_balance`, `note`, `user_id`) VALUES ('2', 'SAMPLE FIXED DEPOSIT AC', '350', 'Fixed Deposit Account Held at Standard Bank', '1');


#
# TABLE STRUCTURE FOR: chart_of_accounts
#

DROP TABLE IF EXISTS `chart_of_accounts`;

CREATE TABLE `chart_of_accounts` (
  `chart_id` int(11) NOT NULL AUTO_INCREMENT,
  `accounts_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `accounts_type` varchar(7) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`chart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('6', '104-TITHES', 'Income', '1');
INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('8', '106-SALES', 'Income', '1');
INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('9', '201-SALARIES', 'Expense', '1');
INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('10', '202-SOCIAL-SECURITY-REMITTANNE', 'Expense', '1');
INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('11', '203-PAYEE-TAX-REMITTANCE', 'Expense', '1');
INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('12', '204-RENT', 'Expense', '1');
INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('13', '103-DONATION', 'Income', '1');
INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('14', '205-REPAIRS AND MAINTENANCE', 'Expense', '1');
INSERT INTO `chart_of_accounts` (`chart_id`, `accounts_name`, `accounts_type`, `user_id`) VALUES ('15', '105-OFFERINGS', 'Income', '1');


#
# TABLE STRUCTURE FOR: language
#

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`phrase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: payee_payers
#

DROP TABLE IF EXISTS `payee_payers`;

CREATE TABLE `payee_payers` (
  `trace_id` int(11) NOT NULL AUTO_INCREMENT,
  `payee_payers` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(5) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`trace_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `payee_payers` (`trace_id`, `payee_payers`, `type`, `user_id`) VALUES ('1', 'GAMBIA-COMPANY', 'Payer', '1');
INSERT INTO `payee_payers` (`trace_id`, `payee_payers`, `type`, `user_id`) VALUES ('2', 'LAMIN-CEESAY', 'Payee', '1');
INSERT INTO `payee_payers` (`trace_id`, `payee_payers`, `type`, `user_id`) VALUES ('3', 'SAMPLE FUNDING PARTNER', 'Payer', '1');
INSERT INTO `payee_payers` (`trace_id`, `payee_payers`, `type`, `user_id`) VALUES ('4', 'GENERAL MOTORS', 'Payee', '1');


#
# TABLE STRUCTURE FOR: payment_method
#

DROP TABLE IF EXISTS `payment_method`;

CREATE TABLE `payment_method` (
  `p_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_method_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`p_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `payment_method` (`p_method_id`, `p_method_name`, `user_id`) VALUES ('1', 'WIRE-TRANSFER', '1');
INSERT INTO `payment_method` (`p_method_id`, `p_method_name`, `user_id`) VALUES ('2', 'CASH', '1');
INSERT INTO `payment_method` (`p_method_id`, `p_method_name`, `user_id`) VALUES ('3', 'CHEQUE', '1');
INSERT INTO `payment_method` (`p_method_id`, `p_method_name`, `user_id`) VALUES ('4', 'BANK-TRANSFER', '1');
INSERT INTO `payment_method` (`p_method_id`, `p_method_name`, `user_id`) VALUES ('5', 'MOBILE', '1');


#
# TABLE STRUCTURE FOR: repeat_transaction
#

DROP TABLE IF EXISTS `repeat_transaction`;

CREATE TABLE `repeat_transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(30) COLLATE utf8_bin NOT NULL,
  `type` enum('Income','Expense') COLLATE utf8_bin NOT NULL,
  `category` varchar(30) COLLATE utf8_bin NOT NULL,
  `amount` double NOT NULL,
  `payer` varchar(30) COLLATE utf8_bin NOT NULL,
  `payee` varchar(30) COLLATE utf8_bin NOT NULL,
  `p_method` varchar(20) COLLATE utf8_bin NOT NULL,
  `ref` varchar(60) COLLATE utf8_bin NOT NULL,
  `status` enum('paid','unpaid','pending','receive') COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `pdate` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# TABLE STRUCTURE FOR: settings
#

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `settings` text COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('1', 'company_name', 'FUNDS MANAGEMENT SYSTEM');
INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('2', 'language', 'English');
INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('3', 'currency_code', 'GMD');
INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('4', 'email_address', 'harbmathew@yahoo.com');
INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('5', 'address', 'Kanifing Estate, Gambia');
INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('6', 'phone', '+220 7425159');
INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('7', 'website', 'https://github.com/mathewharb');
INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('8', 'logo_path', '20180423_071141_858952.png');
INSERT INTO `settings` (`id`, `settings`, `value`) VALUES ('9', 'timezone', 'Africa/Banjul');


#
# TABLE STRUCTURE FOR: transaction
#

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `accounts_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `trans_date` date NOT NULL,
  `type` enum('Income','Expense','Transfer') COLLATE utf8_bin NOT NULL,
  `category` varchar(30) COLLATE utf8_bin NOT NULL,
  `amount` double NOT NULL,
  `payer` varchar(30) COLLATE utf8_bin NOT NULL,
  `payee` varchar(30) COLLATE utf8_bin NOT NULL,
  `p_method` varchar(20) COLLATE utf8_bin NOT NULL,
  `ref` varchar(64) COLLATE utf8_bin NOT NULL,
  `note` text COLLATE utf8_bin NOT NULL,
  `dr` double NOT NULL,
  `cr` double NOT NULL,
  `bal` double NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `transaction` (`trans_id`, `accounts_name`, `trans_date`, `type`, `category`, `amount`, `payer`, `payee`, `p_method`, `ref`, `note`, `dr`, `cr`, `bal`, `user_id`) VALUES ('1', 'SAMPLE CHECKINC-AC', '2019-06-29', 'Transfer', '', '27000', 'System', '', '', '', 'Opening Balance', '0', '27000', '27000', '1');
INSERT INTO `transaction` (`trans_id`, `accounts_name`, `trans_date`, `type`, `category`, `amount`, `payer`, `payee`, `p_method`, `ref`, `note`, `dr`, `cr`, `bal`, `user_id`) VALUES ('2', 'SAMPLE CHECKINC-AC', '2024-02-07', 'Expense', '601-ELECTRONIC-STORE-STARTUP', '3000', '', 'LAMIN-FOFANA', 'CHEQUE', '00058756', 'PAID TO THE ELECTRONIC SHOP', '3000', '0', '24000', '1');
INSERT INTO `transaction` (`trans_id`, `accounts_name`, `trans_date`, `type`, `category`, `amount`, `payer`, `payee`, `p_method`, `ref`, `note`, `dr`, `cr`, `bal`, `user_id`) VALUES ('3', 'SAMPLE FIXED DEPOSIT AC', '2021-06-19', 'Transfer', '', '350', 'System', '', '', '', 'Opening Balance', '0', '350', '350', '1');
INSERT INTO `transaction` (`trans_id`, `accounts_name`, `trans_date`, `type`, `category`, `amount`, `payer`, `payee`, `p_method`, `ref`, `note`, `dr`, `cr`, `bal`, `user_id`) VALUES ('4', 'SAMPLE CHECKINC-AC', '2024-04-01', 'Income', '103-DONATION', '50000', 'SAMPLE FUNDING PARTNER', '', 'CHEQUE', '0123556', 'TEST RECEIPT OF FUNDS', '0', '50000', '74000', '1');
INSERT INTO `transaction` (`trans_id`, `accounts_name`, `trans_date`, `type`, `category`, `amount`, `payer`, `payee`, `p_method`, `ref`, `note`, `dr`, `cr`, `bal`, `user_id`) VALUES ('5', 'SAMPLE CHECKINC-AC', '2024-04-19', 'Expense', '205-REPAIRS AND MAINTENANCE', '5000', '', 'GENERAL MOTORS', 'CHEQUE', '002356', 'Repair of Motor Vehicle BJL 2566 F', '5000', '0', '69000', '1');


#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) COLLATE utf8_bin NOT NULL,
  `fullname` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_type` enum('Admin','Employee','User') COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `user` (`user_id`, `user_name`, `fullname`, `email`, `user_type`, `password`, `creation_date`, `last_login`) VALUES ('1', 'mathew', 'Mathew Harb', 'harbmathew@yahoo.com', 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-05-28 16:42:07', '2024-04-26 12:46:54');


