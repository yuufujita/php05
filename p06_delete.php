<?php require'p00_header.php';?>
<?php require_once('p99_funcs.php')?>

<?php
session_start();
loginCheck();

$id = $_GET['id'];
$image01 = $_GET['image01'];
$image02 = $_GET['image02'];

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute(); //実行

// 画像ファイルの削除処理
$upload_dir = 'upload/'; // 画像のアップロード先ディレクトリ

if (unlink($upload_dir . $filename01)) {
    echo 'ファイルの削除が成功しました。';
} else {
    echo 'ファイルの削除が失敗しました。';
}

if (unlink($upload_dir . $filename02)) {
    echo 'ファイルの削除が成功しました。';
} else {
    echo 'ファイルの削除が失敗しました。';
}

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: p03_select.php');
    exit();
}