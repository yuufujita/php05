<?php require'p00_header.php';?>
<?php require_once('p99_funcs.php')?>

<?php
session_start();
loginCheck();
?>

<!-- Main[Start] -->

<div class="select-container">
    <form method="post" action="p02_insert.php" enctype="multipart/form-data">
        <div class="select-item"><label>おすすめ宿泊先：<input type="text" name="stay_nm"></label></div>
        <div class="select-item"><label>宿泊先URL：<input type="text" name="stay_url"></label></div>
        <div class="select-item"><label>宿泊先への公共交通機関：<input type="text" name="access"></label></div>
        <div class="select-item"><label>一押し画像：<input type="file" name="image01"></label></div>
        <div class="select-item"><label>一押しメモ：<textArea name="recommend_memo" rows="4" cols="40"></textArea></label></div>
        <div class="select-item"><label>宿泊先画像：<input type="file" name="image02"></label></div>
        <div class="select-item"><label>宿泊先メモ：<textArea name="stay_memo" rows="4" cols="40"></textArea></label></div>
        <div class="select-item"><input type="submit" value="送信"></div>
    </form>
</div>

<div class="select-container">
    <div class="select-item"><a href="p03_select.php">みんなの投稿一覧へ</a></div>
</div>
<!-- Main[End] -->

<?php require'p99_footer.php';?>
