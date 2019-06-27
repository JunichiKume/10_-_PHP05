<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id = $_GET["id"];
// echo $id;

include "funcs.php";
$pdo = db_con();
// try {
//     $pdo = new PDO('mysql:dbname=gs_db5_kadai;charset=utf8;host=localhost','root','');
//   } catch (PDOException $e) {
//     exit('データベースに接続できませんでした。'.$e->getMessage());
//   }

//２．データ登録SQL作成
// SQLもたせる、$idはダメ（無効化できないため）
// DELETE FROM gs_an_tableの後にWHEREないと全て消える
$stmt = $pdo->prepare("DELETE FROM gs_bm_table_sleep WHERE id=:id");
// $u_stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
// 危ない文字を無効化 PDO::PARAM_INTはセキュリティ
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
// $u_stmt->bindValue(":id",$id,PDO::PARAM_INT);
// 実行
$status = $stmt->execute();
// $u_status = $u_stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
}else{
    // redirect("select.php");
    header("Location: select.php");
    exit;
}
// ループしなくても一番上？の1レコードのみ取得可能
// $row = $stmt->fetch();

?>