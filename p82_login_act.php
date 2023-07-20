<?php require'p00_header.php';?>
<?php require_once('p99_funcs.php')?>

<?php /*
・【ログイン不要(一部閲覧不可)】　p03_select.php
・【ログイン必要_全員　　　】　　p81_login.php →　p82_login_act.php → p03_select.php → p04_detail.php → p05_update.php
・【ログイン必要_管理者のみ】　　p81_login.php →　p82_login_act.php → p03_select.php → p06_delete.php　※表示される人を限定する
・【ログアウト】　　　　　　　　　p83_logout.php
・【共通の表示や関数用】　　　　　p00_header.php、p00_footer.php、p99_funcs.php
*/

//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値を受け取る
$loginId = $_POST["login_id"];
$loginPw = $_POST["login_pw"];

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE login_id = :login_id AND login_pw = :login_pw');
$stmt->bindValue(':login_id', $loginId, PDO::PARAM_STR);
$stmt->bindValue(':login_pw', $loginPw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
if( $val['user_id'] != ''){
    //Login成功時 該当レコードがあればSESSIONに値を代入
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['user_id'] = $val['user_id'];
    $_SESSION['user_nm'] = $val['user_nm'];
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    header('Location: p03_select.php');
} else {
    //Login失敗時(Logout経由)
    echo 'ログインに失敗しました。';
}

exit();