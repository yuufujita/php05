<?php

function db_connect()
{
try {
    $db_name = 'gs_db'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    return $pdo;
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}
}

function get_all_posts($pdo)
{
//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_chat_table;');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        $view .= '<a href="p24_chat.php?id=' . $result['chat_id'] . '">';
        $view .= $result['date'] . '：' . $result['user_nm']. $result['user_chat'];
        $view .= '</a>';
        $view .= '</p>';
    }
    return $view;
}
}

class Chat {
    // プロパティ
    public $date;
    public $user_nm;
    public $user_chat;


    public function __construct($date,$user_nm,$user_chat) {
        $this->date = $date;
        $this->user_nm = $user_nm;
        $this->user_chat = $user_chat;
    }

    // メソッド
    public function chatTable() {
        echo '<br>投稿日付：'. $this->date . '<br>投稿者：' . $this->user_nm . '<br>'. $this->user_chat. '<br>';
    }
}

function get_all_chat($pdo)
{
// クエリの実行とデータの処理
$stmt = $pdo->prepare('SELECT * FROM gs_chat_table;');
$status = $stmt->execute();
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (isset($_GET['id']) && $result['id'] == $_GET['id']) {
    $chat = new Chat($result['date'],$result['user_nm'],$result['user_chat']);
    $chat->chatTable();
}
}
}

function get_post_chat($pdo)
{
    // POSTデータ取得
    $id = $_POST['id'];
    $user_chat = $_POST['user_chat'];

    // データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO gs_chat_table(chat_id, id, user_id, user_nm, user_chat, date)
    VALUES (NULL, :id, :user_id, :user_nm, :user_chat, sysdate())");

//バインド変数を用意、Integer 数値の場合 PDO::PARAM_INT、String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->bindValue(':user_nm', $_SESSION['user_nm'], PDO::PARAM_STR);
$stmt->bindValue(':user_chat', $user_chat, PDO::PARAM_STR);

//実行
$status = $stmt->execute();

//データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
//登録が成功した場合の処理、p23_control.phpへリダイレクト
//header('Location:p23_control.php');
header("Location:p23_control.php?id=$id");
}
}
?>