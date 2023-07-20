<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

//　IPA_情報処理推進機構、クロスサイトスクリプティング
function h($str){
return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

// ログインチェク処理 loginCheck()
function loginCheck(){
    if(!isset($_SESSION['chk_ssid'])||$_SESSION['chk_ssid']!==session_id()){
        exit('ログインしてください。<a class="btn btn-secondary" type="button" href="p81_login.php">ログイン</a></p>');
    }else{
        session_regenerate_id(true);
        $_SESSION['chk_ssid']=session_id();
    }
}
?>
