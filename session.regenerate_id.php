<?php
//必ずsession_startは最初に記述
session_start();

//現在のセッションIDを取得
$old_sessionid = session_id();

//新しいセッションIDを発行（前のSESSION IDは無効）
// ()にtrueを入れることで前のクッキーは削除される
session_regenerate_id(true);

//新しいセッションIDを取得
$new_sessionid = session_id();

//旧セッションIDと新セッションIDを表示
echo "古いセッション: $old_sessionid<br />";
echo "新しいセッション: $new_sessionid<br />";

if(isset($_SESSION['login'])==false)
{
    echo 'ログインされていません。<br />';
    echo '<a href="login.php">ログイン画面へ</a>';
    exit();
}else{
    echo $_SESSION['user_name'];
    echo'さんログイン中<br />';
    echo'<br />';
}


?>
