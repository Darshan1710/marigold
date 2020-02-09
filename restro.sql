-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`id`, `name`, `mobile`, `email`, `created_at`) VALUES
(1,	'Darshan',	'8369830329',	'kinidarshan07@gmail.com',	'2019-05-12 15:35:33'),
(2,	'jayb. naik',	'78750834856',	'jay@gmail.com',	'2019-05-12 17:11:19'),
(3,	'abc',	'1212121221',	'abc@gmail.com',	'2019-05-12 17:14:49'),
(4,	'test',	'123456789',	'xyz@gmai.comn',	'2019-05-12 17:39:08'),
(5,	'Darshan ',	'8369830329',	'kini@gmail.com',	'2019-05-13 16:34:07'),
(6,	'Darshan',	'8983160662',	'',	'2019-05-13 17:01:49'),
(7,	'Darshan',	'8983160661',	'',	'2019-05-13 17:04:04'),
(8,	'Darshan',	'8983160660',	'',	'2019-05-13 17:04:54'),
(9,	'Darshan',	'8983160663',	'',	'2019-05-13 17:06:33'),
(10,	'Darshan',	'8983160612',	'',	'2019-05-13 17:07:18'),
(11,	'Darshan',	'8983160622',	'',	'2019-05-13 17:09:41');

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `question_1` int(11) NOT NULL,
  `question_2` int(11) NOT NULL,
  `question_3` int(11) NOT NULL,
  `question_4` int(11) NOT NULL,
  `question_5` int(11) NOT NULL,
  `comment` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rating` (`id`, `customer_id`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `comment`, `created_at`) VALUES
(1,	1,	3,	3,	3,	3,	3,	'',	'2019-05-12 15:51:53'),
(3,	2,	3,	3,	2,	3,	2,	'',	'2019-05-12 17:12:39'),
(4,	3,	2,	2,	1,	1,	2,	'',	'2019-05-12 17:16:16'),
(5,	4,	3,	2,	3,	1,	3,	'',	'2019-05-12 17:39:18'),
(6,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:36:01'),
(7,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:41:06'),
(8,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:42:41'),
(9,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:42:54'),
(10,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:45:54'),
(11,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:46:03'),
(12,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:46:13'),
(13,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:46:21'),
(14,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:46:35'),
(15,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:48:07'),
(16,	5,	3,	3,	3,	3,	3,	'',	'2019-05-13 16:48:51');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1,	'admin',	'admin',	'1');

-- 2019-05-13 18:10:26
