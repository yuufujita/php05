<?php require'p00_header.php';?>
<?php require_once('p99_funcs.php')?>

<?php /*
・【ログイン不要(一部閲覧不可)】　p03_select.php
・【ログイン必要_全員　　　】　　p81_login.php →　p82_login_act.php → p03_select.php → p04_detail.php → p05_update.php
・【ログイン必要_管理者のみ】　　p81_login.php →　p82_login_act.php → p03_select.php → p06_delete.php　※表示される人を限定する
・【ログアウト】　　　　　　　　　p83_logout.php
・【共通の表示や関数用】　　　　　p00_header.php、p00_footer.php、p99_funcs.php
*/ ?>

<?php
//必ずsession_startは最初に記述
session_start();

//SESSIONを初期化（空っぽにする）
$_SESSION = [];

//Cookieに保存してある"SessionIDの保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
    setcookie(session_name(), '', time() - 42000, '/');
}

//サーバ側での、セッションIDの破棄
session_destroy();

//処理後、index.phpへリダイレクト
echo 'ログアウトしました。';
exit();
?>

<?php require'p99_footer.php';?>