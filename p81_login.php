<?php require'p00_header.php';?>
<?php require_once('p99_funcs.php')?>

<?php /*
・【ログイン不要(一部閲覧不可)】　p03_select.php
・【ログイン必要_全員　　　】　　p81_login.php →　p82_login_act.php → p03_select.php → p04_detail.php → p05_update.php
・【ログイン必要_管理者のみ】　　p81_login.php →　p82_login_act.php → p03_select.php → p06_delete.php　※表示される人を限定する
・【ログアウト】　　　　　　　　　p83_logout.php
・【共通の表示や関数用】　　　　　p00_header.php、p00_footer.php、p99_funcs.php
*/ ?>

<!-- p81_login.phpは認証処理用のPHPです。 -->
<div id ="login_all" class="card-group">
    <div id ="login_item" class="card">
        <p>ログインIDをお持ちの方はこちら</p>
        <form name="form1" action="p82_login_act.php" method="post">
            ID:<input type="text" name="login_id" />
            PW:<input type="password" name="login_pw" />
            <input type="submit" value="ログイン" />
        </form>
    </div>
    
    <div id ="login_item" class="card">
        <p>はじめて利用する方はこちら</p>
        <form name="form2" action="p84_user_registration.php" method="post">
            お名前:<input type="text" name="user_nm" />
            ID:<input type="text" name="login_id" />
            PW:<input type="text" name="login_pw" />
            <input type="submit" value="ユーザー登録" />
        </form>
    </div>
</div>

<br>
<br>

<?php require'p99_footer.php';?>