-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 3 月 12 日 10:10
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `sportslife`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `address`
--

INSERT INTO `address` (`id`, `name`) VALUES
(1, '北海道'),
(2, '青森県'),
(3, '岩手県'),
(4, '宮城県'),
(5, '秋田県'),
(6, '山形県'),
(7, '福島県'),
(8, '茨城県'),
(9, '栃木県'),
(10, '群馬県'),
(11, '埼玉県'),
(12, '千葉県'),
(13, '東京都'),
(14, '神奈川県'),
(15, '新潟県'),
(16, '富山県'),
(17, '石川県'),
(18, '福井県'),
(19, '山梨県'),
(20, '長野県'),
(21, '岐阜県'),
(22, '静岡県'),
(23, '愛知県'),
(24, '三重県'),
(25, '滋賀県'),
(26, '京都府'),
(27, '大阪府'),
(28, '兵庫県'),
(29, '奈良県'),
(30, '和歌山県'),
(31, '鳥取県'),
(32, '島根県'),
(33, '岡山県'),
(34, '広島県'),
(35, '山口県'),
(36, '徳島県'),
(37, '香川県'),
(38, '愛媛県'),
(39, '高知県'),
(40, '福岡県'),
(41, '佐賀県'),
(42, '長崎県'),
(43, '熊本県'),
(44, '大分県'),
(45, '宮崎県'),
(46, '鹿児島県'),
(47, '沖縄県');

-- --------------------------------------------------------

--
-- テーブルの構造 `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `plans_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `post_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `chat`
--

INSERT INTO `chat` (`id`, `users_id`, `plans_id`, `message`, `post_time`) VALUES
(1, 2, 4, 'fdvfgb', '2021-03-07 15:41:22'),
(2, 2, 4, 'fdvfgb', '2021-03-07 15:41:35'),
(3, 2, 4, 'fdvfgb', '2021-03-07 15:41:39'),
(4, 2, 4, 'fdvfgb', '2021-03-07 15:42:07'),
(5, 2, 4, 'fdvfgb', '2021-03-07 15:42:16'),
(6, 2, 4, 'fdvfgb', '2021-03-07 15:42:20'),
(7, 2, 4, 'febv n', '2021-03-07 15:56:32'),
(8, 2, 4, '', '2021-03-07 15:56:35'),
(9, 2, 4, 'dvfghj', '2021-03-07 16:00:40'),
(10, 2, 4, '', '2021-03-07 16:01:40'),
(11, 2, 4, '', '2021-03-07 16:01:54'),
(12, 2, 4, '', '2021-03-07 16:02:27'),
(13, 2, 4, '', '2021-03-07 16:02:33'),
(14, 2, 4, '', '2021-03-07 16:03:52'),
(15, 2, 4, '', '2021-03-07 16:03:58'),
(16, 2, 4, '', '2021-03-07 16:04:10'),
(17, 2, 4, '', '2021-03-07 16:04:29'),
(18, 2, 4, '', '2021-03-07 16:04:43'),
(19, 2, 4, '', '2021-03-07 16:06:58'),
(20, 2, 4, '', '2021-03-07 16:07:02'),
(21, 2, 4, '', '2021-03-07 16:07:56'),
(22, 2, 4, '', '2021-03-07 16:08:32'),
(23, 2, 4, '', '2021-03-07 16:14:51'),
(24, 2, 4, '', '2021-03-07 16:14:53'),
(25, 2, 3, 'dsfgh', '2021-03-08 13:39:03'),
(26, 2, 3, 'dsfgh', '2021-03-08 13:41:55'),
(27, 2, 3, 'aho', '2021-03-08 14:02:06'),
(28, 2, 3, 'aho', '2021-03-08 14:02:08'),
(29, 2, 3, 'aho', '2021-03-08 14:02:08'),
(30, 2, 3, 'aho', '2021-03-08 14:02:09'),
(31, 2, 3, 'aho', '2021-03-08 14:02:11'),
(32, 2, 3, 'aho', '2021-03-08 14:02:11'),
(33, 2, 3, 'aho', '2021-03-08 14:02:12'),
(34, 2, 3, 'fdvfgb', '2021-03-08 14:02:44'),
(35, 2, 3, 'fdvfgb', '2021-03-08 14:02:44'),
(36, 2, 3, 'kjl.', '2021-03-08 14:02:52'),
(37, 2, 3, 'fdvfgb', '2021-03-08 14:05:03'),
(38, 2, 3, 'dsfgh', '2021-03-08 14:09:05'),
(39, 2, 3, 'fdvfgb', '2021-03-08 14:09:14'),
(40, 6, 3, 'dvfghj', '2021-03-08 14:12:00'),
(41, 6, 3, 'できました。', '2021-03-08 14:48:25'),
(42, 6, 3, 'kjl.', '2021-03-08 14:53:26'),
(43, 5, 21, 'こんにちは', '2021-03-09 10:24:51'),
(44, 6, 32, 'こんにちは', '2021-03-09 13:35:12'),
(45, 5, 33, 'こんにちは', '2021-03-09 14:57:22'),
(46, 5, 33, 'よろしく', '2021-03-09 14:57:28'),
(47, 1, 33, 'hello', '2021-03-09 15:12:23'),
(48, 5, 33, 'お願いします', '2021-03-09 15:28:21'),
(49, 1, 33, 'こんにちは', '2021-03-09 15:33:30'),
(50, 5, 33, 'こんにちは', '2021-03-09 17:30:27'),
(51, 1, 33, 'こんにちは', '2021-03-09 17:33:28'),
(52, 1, 34, 'こんにちは', '2021-03-10 23:12:20');

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_key` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `create_key`, `create_time`) VALUES
(7, 'soccer.tkr1021@gmail.com', 'd3390c2ef8e636044853a1689efe2160', '2021-03-03 14:50:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `day` varchar(111) NOT NULL,
  `created_time` varchar(111) NOT NULL,
  `location` varchar(255) NOT NULL,
  `plan_text` varchar(300) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `plans`
--

INSERT INTO `plans` (`id`, `users_id`, `sports_id`, `status_id`, `name`, `day`, `created_time`, `location`, `plan_text`, `remarks`) VALUES
(1, 4, 1, 1, 'こんにちは', '2021-03-24', '20:59', '東京都〇〇', 'こんにちは\r\nありがとう', 'こんばんわ\r\nよろしく'),
(2, 5, 18, 4, 'よろしく', '2021-03-18', '17:00', '東京都〇〇', 'アイウエオ\r\n\r\nかき', 'なに\r\n\r\nぬねの'),
(3, 9, 4, 3, 'test', '2021-03-09', '21:10', '東京都〇〇', 'こんにちは', 'がんばりましょう');

-- --------------------------------------------------------

--
-- テーブルの構造 `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `sports_img` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `sports`
--

INSERT INTO `sports` (`id`, `name`, `sports_img`) VALUES
(1, 'アイスホッケー', '/image/icehockey.jpg'),
(2, 'アメリカンフットボール', '/image/americanfootball.jpg'),
(3, 'カバディ', '/image/other.jpg'),
(4, 'キックベースボール', '/image/other.jpg'),
(5, 'クリケット', '/image/cricket.jpg'),
(6, 'ゲートボール', '/image/other.jpg'),
(7, 'ゴルフ', '/image/golf.jpg'),
(8, 'サイクリング', '/image/bicycle.jpg'),
(9, 'サッカー', '/image/soccer.jpg'),
(10, 'サーフィン', '/image/surfing.jpg'),
(11, 'スキー', '/image/skiing.jpg'),
(12, 'スノーボード', '/image/snowboard.jpg'),
(13, 'ソフトボール', '/image/softball.jpg'),
(14, '卓球', '/image/other.jpg'),
(15, 'テニス', '/image/tennis.jpg'),
(16, 'ドッジボール', '/image/other.jpg'),
(17, 'バスケットボール', '/image/basketball.jpg'),
(18, 'バドミントン', '/image/badominton.jpg'),
(19, 'バレーボール', '/image/volleyball.jpg'),
(20, 'フットサル', '/image/footsal.jpg'),
(21, '野球（硬式）', '/image/baseball.jpg'),
(22, '野球（軟式）', '/image/baseball.jpg'),
(23, 'ラクロス', '/image/lacrosse.jpg'),
(24, 'ラグビー', '/image/rugby.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `statuses`
--

INSERT INTO `statuses` (`id`, `status`) VALUES
(1, '初心者歓迎'),
(2, '男女問わず'),
(3, '経験者のみ'),
(4, '小学生以下対象'),
(5, '中高生対象'),
(6, '親子で参加ok'),
(7, '定員あり'),
(8, '男性限定'),
(9, '女性限定'),
(10, '真剣に');

-- --------------------------------------------------------

--
-- テーブルの構造 `take`
--

CREATE TABLE `take` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL,
  `take_user_id` int(11) NOT NULL,
  `plans_id` int(11) NOT NULL,
  `day` varchar(111) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `take`
--

INSERT INTO `take` (`id`, `users_id`, `sports_id`, `take_user_id`, `plans_id`, `day`, `location`) VALUES
(4, 4, 1, 5, 33, '2021-03-24', '東京都〇〇'),
(5, 4, 1, 5, 33, '2021-03-24', '東京都〇〇');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL DEFAULT '0',
  `add_id` int(11) NOT NULL DEFAULT '0',
  `account_name` varchar(32) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(32) NOT NULL,
  `birth` varchar(111) NOT NULL,
  `num` varchar(11) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `work` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL COMMENT '作成日',
  `updated` datetime DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT '1' COMMENT '権限（管理者：０、一般：１）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `sports_id`, `add_id`, `account_name`, `email`, `password`, `name`, `birth`, `num`, `sex`, `work`, `created`, `updated`, `del_flg`) VALUES
(1, 3, 4, 'aaaa', 'a@co.jp', '$2y$10$Slvp0CTo.bDB.Oo7pFemA.COuqXRpfH1XEN0upcv0iFw1dhLePRAy', '', '2021-03-15', '88888888888', '男性', 'サッカー選手', '2021-03-09 14:05:20', '2021-03-11 19:50:46', 0),
(2, 1, 1, 'aaaa', 'a@co.jp', '$2y$10$zLUJOwuwb/rPklrzxBiSd.Xbxd1LoGYNXKsWpCKRS9j3A3BN5h6au', 'あああ', '2021-03-01', '88888888888', '女性', 'サッカー選手', '2021-03-09 14:08:47', NULL, 1),
(3, 3, 2, 'takeru', 'takeru@co.jp', '$2y$10$.FvXr45s7PquJgbx5NIMeuW.ranxQHZ2VzZ6iyfThN4Neys9dVluO', 'takeru', '2021-03-29', '88888888888', '男性', 'サッカー選手', '2021-03-09 14:32:08', NULL, 1),
(4, 1, 1, 'aiueo', 'aiueo@co.jp', '$2y$10$BDlP2VD54gHxrBr3KFr6Wes1NzG4dGnW5s9EsJDpKsNxwAGxi/JHa', 'アイウエオ', '2021-03-11', '88888888888', '男性', 'サッカー選手', '2021-03-09 14:50:32', NULL, 1),
(5, 19, 4, 'wawawa', 'wa@co.jp', '$2y$10$rgUuTFNm6SzfsL8HRSwqqOPBHxDbZIvO4pch1hNBxsjoyXtCBxSgq', 'わわわ', '2021-03-23', '88888888888', '女性', 'エンジニア', '2021-03-09 14:55:53', NULL, 1),
(6, 4, 5, 'baka', 'miyu@co.jp', '$2y$10$X3A3DaFYTQQCDa2qnt/8CeyHpUUI515NTS9/6Jkl.JE.6hOzRZe8C', 'baka', '2021-04-01', '88888888888', '男性', 'エンジニア', '2021-03-10 11:17:08', NULL, 1),
(7, 3, 3, 'iniesta', 'iniesta@co.jp', '$2y$10$yduI42BHA0KDTTnugnHI0.GljhlERszZ.b.0eDGtkwSNOc1VPev9i', 'イニエスタ', '2021-03-25', '88888888888', '男性', 'サッカー選手', '2021-03-10 11:21:30', NULL, 1),
(8, 3, 4, 'xavi', 'xavi@co.jp', '$2y$10$IIi54uJ320XsdnAKu9xioOXaogBwu24vWrw3nWV5W8gGWBMe2xrv6', 'シャビ', '2021-03-19', '88888888888', '女性', 'エンジニア', '2021-03-10 11:43:19', NULL, 1),
(9, 4, 2, 'busi', 'busi@co.jp', '$2y$10$fO1S5rPBzKB7KlVUONcYTeATr88o.2epWnckNnjWUKbEVzvc0Fd82', 'ブスケツ', '2021-03-26', '88888888888', '男性', 'サッカー選手', '2021-03-10 12:58:33', NULL, 1),
(10, 2, 4, 'test', 'test@co.jp', '$2y$10$0g.6zMoJDBvDTjERvbToaOVzo6N20eGmIrPCnpiInuHJCE.ugaSWu', 'test', '2021-03-24', '88888888888', '女性', 'サッカー選手', '2021-03-10 23:07:08', NULL, 1),
(11, 24, 31, 'test2', 'test2@co.jp', '$2y$10$vKrWuR6pZzLYypxJtDZ4n.yodclvBAgz0ZmkhHs4cDb83PoIceHva', 'test2', '2021-03-19', '88888888888', '男性', 'サッカー選手', '2021-03-10 23:07:55', NULL, 1),
(12, 10, 25, 'test3', 'test3@co.jp', '$2y$10$w6Wznmg8lGQFm14mH4S3bef6tKSA4simWNjqSgQQ9nvn8clVSgUqe', 'test3', '2021-03-21', '88888888888', '男性', 'サッカー選手', '2021-03-10 23:08:59', NULL, 1),
(13, 6, 6, 'test4', 'test4@co.jp', '$2y$10$uJ72YYAihBgt/ut3HehRtejecKCsnbf/I5g8df9JvQV6xbSv4uQx6', 'test4', '2021-03-15', '88888888888', '女性', 'サッカー選手', '2021-03-10 23:09:48', NULL, 1),
(14, 8, 4, 'test5', 'test5@co.jp', '$2y$10$mBJNmvFE85mLpXIv/eJYz.ARa3w1aIKCliBzRgNBk2E/GJBDgar5m', 'test5', '2021-03-16', '88888888888', '男性', 'エンジニア', '2021-03-11 19:38:11', NULL, 1),
(15, 10, 16, 'test6', 'test6@co.jp', '$2y$10$3.m.cNWFh.fPbVB68XqrMeVVsANSfCPOEFXrZPPEGVMYvYUYXclUq', 'test6', '2021-03-23', '88888888888', '女性', 'サッカー選手', '2021-03-11 19:43:51', NULL, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `take`
--
ALTER TABLE `take`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- テーブルのAUTO_INCREMENT `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- テーブルのAUTO_INCREMENT `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルのAUTO_INCREMENT `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- テーブルのAUTO_INCREMENT `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `take`
--
ALTER TABLE `take`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
