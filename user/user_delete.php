<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id = $_GET["id"];
// echo $id;

include "user_funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
// SQLもたせる、$idはダメ（無効化できないため）
// DELETE FROM gs_an_tableの後にWHEREないと全て消える
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
// 危ない文字を無効化 PDO::PARAM_INTはセキュリティ
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
// 実行
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
}else{
    redirect("user_select.php");
}
// ループしなくても一番上？の1レコードのみ取得可能
// $row = $stmt->fetch();

?>