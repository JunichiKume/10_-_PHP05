<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="select.php">検査結果／睡眠の状態</a>　
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
            <a class="navbar-brand" href="user\user_index.php">ユーザー登録</a>　
            <a class="navbar-brand" href="user\user_select.php">ユーザー一覧</a>　
            <?php } ?>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
        </div>
    </div>
</nav>