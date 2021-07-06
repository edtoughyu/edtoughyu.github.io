#專案使用說明
1.目前僅會員項目可完整輸入及儲存
2.閱讀區建置中,須單頁操作
3.首頁的連結,建置中


##資料庫

#會員資料庫
-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-07-06 11:34:10
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `phon_yen`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_series_no` int(11) NOT NULL COMMENT '會員序號',
  `member_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '會員帳號',
  `member_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '會員類型',
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '密碼',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `sex` enum('female','male','','') COLLATE utf8_unicode_ci NOT NULL COMMENT '性別',
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '電子郵件',
  `login_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '註冊日期',
  `company_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '公司名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_series_no`, `member_no`, `member_type`, `password`, `name`, `sex`, `email`, `login_date`, `company_name`) VALUES
(1, 'c202106170001', 'customer', '123456789', '林大強', 'male', 'abcdd@gmail.com', '2021-06-17', NULL),
(2, 'c202106170002', 'customer', 'asdlfkasd002', '林小美', 'female', 'abwerd@gmail.com', '2021-06-17', NULL),
(3, '123123', 'customer', '1234', 'ED', 'male', 'wulon@gmail.com', '2021-06-15', 'yen'),
(4, 'justforcheck', 'author', '12313221', 'Jennifer', 'female', 'wulon234@gmail.com', '2021-06-21', 'hon'),
(5, 'weroieu', 'author', '23423432', 'Tom', 'male', 'wulon23234@gmail.com', '2021-06-15', 'ddt'),
(6, 'weroieu', 'customer', '23423432', 'Dick', 'male', 'wulon232@gmail.com', '2021-06-11', 'ddt'),
(7, 'fortest', 'customer', '12345', 'Andy', 'male', 'wulongtea@gmail.com', '2021-06-02', 'fun'),
(8, 'Tina', 'customer', '123456', 'Tina', 'male', 'wulon2312@gmail.com', '2021-06-16', 'test'),
(12, 'a2021070100001', 'author', '12345', '向問天', 'male', 'wentain@gmail.com', '20210701', NULL),
(13, 'a2021070100002', 'author', '12345', '漆把刀', 'male', 'chbadou@gmail.com', '20210701', NULL),
(14, 'a2021070100003', 'author', '12345', '窮搖', 'female', 'chonyau@gmail.com', '20210701', NULL),
(15, 'a2021070100004', 'author', '12345', '張礙鈴', 'female', 'i-ling@gmail.com', '20210701', NULL),
(16, 'a2021070100005', 'author', '12345', '余雨中', 'male', 'uchung@gmail.com', '20210701', NULL),
(17, '006', 'author', '12345', '金佣', 'male', 'chinguon@gmail.com', '20210701', NULL),
(18, '007', 'author', '12345', '五毛', 'female', 'wumou@gmail.com', '20210701', NULL),
(19, '008', 'author', '12345', '魯遜', 'male', 'lusian@gmail.com', '20210701', NULL),
(20, '009', 'author', '12345', '苦龍', 'male', 'kulong@gmail.com', '20210701', NULL),
(21, '010', 'author', '12345', '倪誆', 'male', 'nikuon@gmail.com', '20210701', NULL),
(22, '011', 'author', '12345', '愛德華', 'male', 'edward@gmail.com', '20210701', NULL),
(23, '012', 'author', '12345', '羅貫中', 'male', 'quanchung@gmail.com', '20210701', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_series_no`,`member_no`),
  ADD KEY `series_index` (`member_series_no`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_series_no` int(11) NOT NULL AUTO_INCREMENT COMMENT '會員序號', AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


##簡單操作說明
1.附上的資料庫中有已建置的會員名稱及密碼
2.閱讀區及首頁連結建置到一半,僅能手動輸入相關的數值




