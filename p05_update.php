<?php require'p00_header.php';?>
<?php require_once('p99_funcs.php')?>

<?php
session_start();
loginCheck();

//1. POSTデータ取得
$stay_nm=$_POST['stay_nm'];
$stay_url=$_POST['stay_url'];
$access=$_POST['access'];
$recommend_memo=$_POST['recommend_memo'];
$stay_memo=$_POST['stay_memo'];
$id = $_POST['id'];

//geocording.jp APIから緯度・経度を取得する
$url = "https://www.geocoding.jp/api/?q=" . $stay_nm;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);
$xml = simplexml_load_string($res);
$lat = $xml->coordinate->lat;
$lon = $xml->coordinate->lng;

// UPDATE テーブル名 SET カラム1 = 1に保存したいもの、カラム2 = 2に保存したいもの,,,, WHERE 条件 id = 送られてきたid
$stmt = $pdo->prepare('UPDATE gs_bm_table
                        SET stay_nm = :stay_nm,
                            stay_url = :stay_url,
                            access = :access,
                            recommend_memo = :recommend_memo,
                            stay_memo = :stay_memo,
                            lat = :lat,
                            lon = :lon,
                            date = sysdate(),
                            user_id = :user_id,
                            user_nm = :user_nm
                        WHERE id = :id;');
$stmt->bindValue(':stay_nm', $stay_nm, PDO::PARAM_STR);
$stmt->bindValue(':stay_url', $stay_url, PDO::PARAM_STR);
$stmt->bindValue(':access', $access, PDO::PARAM_STR);
$stmt->bindValue(':recommend_memo', $recommend_memo, PDO::PARAM_STR);
$stmt->bindValue(':stay_memo', $stay_memo, PDO::PARAM_STR);
$stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
$stmt->bindValue(':lon', $lon, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
$stmt->bindValue(':user_nm', $_SESSION['user_nm'], PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute(); //実行

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: p03_select.php');
    exit();
}