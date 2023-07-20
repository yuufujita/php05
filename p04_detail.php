<?php require'p00_header.php';?>
<?php require_once('p99_funcs.php')?>

<?php
session_start();
loginCheck();

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute(); //実行

$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}
?>

<!-- method, action, 各inputのnameを確認してください。  -->
<div class="select-container">
    <form method="post" action="p05_update.php" enctype="multipart/form-data">
        <div class="select-item mb-3"><label class="form-label">おすすめ宿泊先：<input type="text" class="form-control" name="stay_nm" value="<?= $result['stay_nm']?>"></label></div>
        <div class="select-item mb-3"><label class="form-label">宿泊先URL：<input type="text" class="form-control" name="stay_url" value="<?= $result['stay_url']?>"></label></div>
        <div class="select-item mb-3"><label class="form-label">宿泊先への公共交通機関：<input type="text" class="form-control" name="access" value="<?= $result['access']?>"></label></div>
        <div class="select-item mb-3"><label class="form-label">一押し画像：<input type="file" name="image01"><?= $result['image01']?></label></div>
        <div class="select-item mb-3"><label class="form-label">一押しメモ：<textArea class="form-control" name="recommend_memo" rows="4" cols="40"><?= $result['recommend_memo']?></textArea></label></div>
        <div class="select-item mb-3"><label class="form-label">宿泊先画像：<input type="file" name="image02"><?= $result['image02']?></label></div>
        <div class="select-item mb-3"><label class="form-label">宿泊先メモ：<textArea class="form-control" name="stay_memo" rows="4" cols="40"><?= $result['stay_memo']?></textArea></label></div>
        <input type="hidden" name="id" value="<?= $result['id']?>">
        <div class="select-item"><input type="submit" value="更新"></div>
    </form>
</div>

<div class="select-container">
    <div class="select-item"><a href="p03_select.php">みんなの投稿一覧へ</a></div>
</div>

<?php require'p99_footer.php';?>