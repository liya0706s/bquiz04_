-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-03-20 08:52:59
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db06`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `acc` text NOT NULL COMMENT '帳號',
  `pw` text NOT NULL COMMENT '密碼',
  `pr` text NOT NULL COMMENT '權限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`, `pr`) VALUES
(1, 'admin', '1234', ''),
(2, 'root', '12123', ''),
(3, 'robot', '242468', '');

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `bottom` text NOT NULL COMMENT '頁尾版權'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `bottom`) VALUES
(1, 'Copyright © 2024 Angie Inc. All rights reserved.');

-- --------------------------------------------------------

--
-- 資料表結構 `good`
--

CREATE TABLE `good` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水帳',
  `no` text NOT NULL COMMENT '商品編號',
  `name` text NOT NULL COMMENT '商品名稱',
  `price` int(5) NOT NULL COMMENT '商品單價',
  `stock` int(5) NOT NULL COMMENT '庫存量',
  `spec` text NOT NULL COMMENT '規格',
  `intro` text NOT NULL COMMENT '商品簡介',
  `img` text NOT NULL COMMENT '商品圖片',
  `big` int(5) NOT NULL COMMENT '大分類',
  `mid` int(5) NOT NULL COMMENT '次分類',
  `sh` int(2) NOT NULL DEFAULT 1 COMMENT '是否上架'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `mem`
--

CREATE TABLE `mem` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `acc` text NOT NULL COMMENT '帳號',
  `pw` text NOT NULL COMMENT '密碼',
  `name` text NOT NULL COMMENT '姓名',
  `tel` text NOT NULL COMMENT '電話',
  `addr` text NOT NULL COMMENT '地址',
  `email` text NOT NULL COMMENT '電子郵件',
  `regdate` date NOT NULL COMMENT '註冊日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mem`
--

INSERT INTO `mem` (`id`, `acc`, `pw`, `name`, `tel`, `addr`, `email`, `regdate`) VALUES
(2, 'liya', '123456', 'Liya', '0911111111', 'Taipei City', 'aaa@example.com', '2024-03-20');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `no` text NOT NULL COMMENT '編號',
  `acc` text NOT NULL COMMENT '帳號',
  `name` text NOT NULL COMMENT '姓名',
  `email` text NOT NULL COMMENT '電子郵件',
  `addr` text NOT NULL COMMENT '地址',
  `tel` text NOT NULL COMMENT '電話',
  `total` int(10) NOT NULL COMMENT '總價',
  `cart` text NOT NULL COMMENT '商品',
  `orderdate` date NOT NULL COMMENT '訂購日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `name` text NOT NULL COMMENT '選項名稱',
  `big_id` int(2) NOT NULL DEFAULT 0 COMMENT '大分類'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mem`
--
ALTER TABLE `mem`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good`
--
ALTER TABLE `good`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水帳';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mem`
--
ALTER TABLE `mem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
