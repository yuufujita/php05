<!DOCTYPE html>
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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="img/png" href="img/favicon.png" />
</head>

<body>
<div id="home">
    <header class="page-header wrapper">
        <div class="logo-area">
            <a href="p03_select.php">
                <img class="logo" src="img/logo.jpg" alt="Carlesstravelホーム"/>
            </a>
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
                <p>経験者に質問しよう</p>
            </div>
        </div>
        <div id="stay" class="contents">
            <h2 class="title">経験者に質問しよう</h2>
            <!-- <?= $view ?> -->
        </div>
    </article>
</div>

<?php 
// GETデータ取得
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>

<div class="select-container">
    <form method="post" action="p23_control.php" enctype="multipart/form-data">
        <div class="select-item"><input type="hidden" name="id" value="<?= h($id)?>"></div>
        <div class="select-item block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><label>質問内容：<input type="text" name="user_chat"></label></div>
        <div class="select-item text-white bg-fuchsia-400 hover:bg-fuchsia-500 focus:ring-4 focus:ring-fuchsia-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-fuchsia-600 dark:hover:bg-fuchsia-700 focus:outline-none dark:focus:ring-fuchsia-800"><input type="submit" value="送信"></div>
    </form>
</div>

<div class="select-container">
    <div class="select-item font-medium text-blue-600 dark:text-blue-500 hover:underline"><a href="p03_select.php">みんなの投稿一覧へ</a></div>
</div>