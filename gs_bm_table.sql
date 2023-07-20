-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 20 日 17:23
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
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(11) NOT NULL,
  `stay_nm` varchar(64) NOT NULL,
  `stay_url` varchar(128) NOT NULL,
  `access` varchar(128) NOT NULL,
  `recommend_memo` text NOT NULL,
  `stay_memo` text NOT NULL,
  `lat` varchar(24) NOT NULL,
  `lon` varchar(24) NOT NULL,
  `image01` longblob DEFAULT NULL,
  `image02` longblob DEFAULT NULL,
  `date` date NOT NULL,
  `user_id` int(12) NOT NULL,
  `user_nm` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `stay_nm`, `stay_url`, `access`, `recommend_memo`, `stay_memo`, `lat`, `lon`, `image01`, `image02`, `date`, `user_id`, `user_nm`) VALUES
(10, 'くつろぎの宿　結び家', 'https://www.biei-hokkaido.jp/ja/hotel/musubiya-biei/', 'JR美瑛駅から徒歩10分', 'JR富良野駅やJR美瑛駅発の日帰りバスツアー（https://www.optbookmark.jp/plans/3331やhttps://www.optbookmark.jp/plans/4437）を活用すれば、車運転なしで観光可能。', '全４部屋で周囲からの見られ方も気にならず、夕食時はオーナー夫婦の美味しい手料理とともに話し相手にもなってもらえる。観光情報も親身になって教えてくれる。', '43.595863', '142.469385', 0x75706c6f61642f32303231303732395f74726176656c5f3032312e6a7067, 0x75706c6f61642f32303231303732385f74726176656c5f3030312e6a7067, '2023-07-09', 1, '管理者01'),
(11, 'リゾートホテル　コルテラルゴ伊豆高原', 'https://cortelargo.jp/', 'JR・伊豆急行伊東駅or伊豆高原駅→東海バス東大室駅から徒歩3分', '2月に桜が楽しめる。河津桜まつり会場はJR河津駅下車すぐ。（https://kawazuzakura.jp/）', '全６部屋、ozmallから予約すると夕食を部屋食にすることが可能。客室露天風呂付きで思う存分に風呂も楽しめる。', '34.90365', '139.122414', 0x75706c6f61642f32303233303232345f74726176656c5f3030312e4a5047, 0x75706c6f61642f32303233303232335f74726176656c5f3030312e4a5047, '2023-07-09', 1, '管理者01'),
(12, '鶴の湯別館　山の宿', 'http://www.tsurunoyu.com/FONDMENT/y-annai.html', 'JR田沢湖駅→羽後交通バスアルパこまくさ駅→宿泊先送迎', '日帰り宿泊客の本館温泉利用は10:00−15:00のみなので、ゆっくり利用したい場合は宿泊を推奨。（http://www.tsurunoyu.com/FONDMENT/t-onsen.html）', '全１０部屋、旅情にひたるにはうってつけ、本館と別館は要予約の送迎があるはず（最新情報不明）で、車がなくとも有名な本館の温泉にも入れる。ただし１人利用は平日のみかつ3割増し料金。', '39.79574', '140.768721', 0x75706c6f61642f32303137303933305f74726176656c5f3030322e4a5047, 0x75706c6f61642f32303137303933305f74726176656c5f3030342e4a5047, '2023-07-09', 2, 'ユーザー01'),
(18, '黄金崎不老不死温泉', 'https://www.furofushi.com/', 'JRウェスパ椿山駅→宿泊先送迎', '海辺の露天風呂から海と太陽を楽しむことができる。日帰り利用者の温泉利用は8:00-16:00のため、夕陽を楽しみたいなら宿泊を推奨。絶景は混浴温泉側だが、女性専用の露天風呂もある。', '約６０部屋、団体向けのサービスも多いため、１人で静かに過ごしたい人には向かない。夕食も広い夕食会場での食事となる。', '40.614763', '139.862692', 0x75706c6f61642f32303137313030315f74726176656c5f3030322e4a5047, 0x75706c6f61642f, '2023-07-09', 2, 'ユーザー01'),
(21, '南紀白浜とれとれビレッジ', 'https://toretore.com/village/', 'JR白浜駅からタクシー5分', '', '', '33.679987', '135.376912', 0x75706c6f61642f, 0x75706c6f61642f, '2023-07-09', 1, '管理者01'),
(34, 'ジーズアカデミー東京', 'https://gsacademy.jp/', 'JR原宿駅・東京メトロ明治神宮前駅から徒歩1分', 'テスト', 'テスト', '35.669332', '139.702997', 0x75706c6f61642f, 0x75706c6f61642f, '2023-07-09', 3, 'ユーザー02');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
