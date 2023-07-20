-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 20 日 17:24
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_chat_table`
--

CREATE TABLE `gs_chat_table` (
  `chat_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `user_nm` varchar(64) NOT NULL,
  `user_chat` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_chat_table`
--

INSERT INTO `gs_chat_table` (`chat_id`, `id`, `user_id`, `user_nm`, `user_chat`, `date`) VALUES
(1, 10, 1, '管理者01', 'バスツアーはどういう人達が参加していましたか？', '2023-07-19'),
(2, 10, 2, 'ユーザー01', '平日にバスツアーを利用したので、土日は異なるかもしれませんが、女性グループや中高年夫婦が大半でした。参加人数が少ない日だと１人の寂しさは感じづらいと思います。', '2023-07-19'),
(3, 10, 2, 'ユーザー01', '1人参加の人に対して、ガイドさんが写真を撮ってくださったりしたので、私はとても楽しめました。', '2023-07-20'),
(7, 11, 1, '管理者01', '混んでいましたか？\r\n１人ランチがしやすいお店はありましたか？', '2023-07-20'),
(8, 10, 4, 'ユーザー03', '暑かったですか？', '2023-07-21'),
(9, 11, 4, 'ユーザー03', '河津桜が咲いている期間はとても混んでいます。平日にも関わらず指定席も満席でした。私は１人ランチがしやすいお店は見つけられなかったです。', '2023-07-21');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_chat_table`
--
ALTER TABLE `gs_chat_table`
  ADD PRIMARY KEY (`chat_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_chat_table`
--
ALTER TABLE `gs_chat_table`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
