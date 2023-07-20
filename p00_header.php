<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

//1. DB接続
try {
  $db_name = 'gs_db'; //データベース名
  $db_id   = 'root'; //アカウント名
  $db_pw   = ''; //パスワード：MAMPは'root'
  $db_host = 'localhost'; //DBホスト
  $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
  exit('DB Connection Error:' . $e->getMessage());
}
?>

<html>
<html lang="ja">

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Carless travel</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css?<?php echo date('YmdHis');?>" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="icon" type="img/png" href="img/favicon.png" />
</head>

<body>
<div id="home">
      <header class="page-header wrapper">
        <div class="logo-area">
          <a href="p03_select.php"
            ><img class="logo" src="img/logo.jpg" alt="Carlesstravelホーム"
          /></a>
        </div>
        <div class="space-area"></div>
        <nav>
          <ul class="main-nav">
          <li><a href="p81_login.php">ログイン</a></li>
          <li><a href="p83_logout.php">ログアウト</a></li>
          </ul>
        </nav>
      </header>
    </div>

    <div class="wrapper">
      <article>
        <div id="main06">
          <div class="main-content">
            <h1 class="main-title">Let's Enjoy!</h1>
            <p>お気に入りを投稿しよう</p>
          </div>
        </div>
        <div id="stay" class="contents">
          <h2 class="title">お気に入りを投稿しよう</h2>
          </div>
      </article>
    </div>