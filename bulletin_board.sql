-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 4 月 26 日 14:57
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `bulletin_board`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `message`
--

CREATE TABLE `message` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_message` text NOT NULL,
  `m_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `message`
--

INSERT INTO `message` (`m_id`, `m_name`, `m_message`, `m_dt`) VALUES
(1, '鈴木一郎', 'ハロー、Twitterもどき', '2021-04-25 22:50:50'),
(2, '鈴木鉄平', 'こんにちは、Twitterもどき', '2021-04-25 11:11:12'),
(3, '鈴木たろう', 'あれ、どこですか？', '2021-04-26 00:12:22'),
(4, '漢方太郎', 'a', '2021-04-26 23:26:31'),
(11, '神原健二', 'おはよう', '2021-04-26 23:45:01'),
(12, '神原健二', 'おはよう', '2021-04-26 23:45:29'),
(13, '神原健二', 'おはよう', '2021-04-26 23:45:35'),
(14, '神原健二', 'おはよう', '2021-04-26 23:45:37'),
(15, '神原健二', 'おはよう', '2021-04-26 23:45:38'),
(16, '神原健二', 'おはよう', '2021-04-26 23:45:39'),
(17, '神原健二', 'おはよう', '2021-04-26 23:45:39'),
(18, '神原健二', 'おはよう', '2021-04-26 23:45:40'),
(19, 'おはようございます太郎', 'たろうです', '2021-04-26 23:45:53'),
(20, 'おはようございます太郎', 'たろうです', '2021-04-26 23:45:56');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
