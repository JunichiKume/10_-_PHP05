<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//1.  DB接続します
include("funcs.php");   
$pdo = db_con();

//2. データ登録SQL作成
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sqlError($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  //●●さんこんにちは的な
  $_SESSION["name"]      = $val['name'];
  header("Location: select.php");
}else{
  //Login失敗時(Logout経由)
  header("Location: logout.php");
}
exit();
?>


＜Hash化／失敗＞
// //最初にSESSIONを開始！！ココ大事！！
// session_start();

// //1.外部ファイル読み込み
// //※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
// //include "../../includes/funcs.php";
// include "funcs.php";

// //2.POST値取得
// $lid = filter_input( INPUT_POST, "lid" );
// $lpw = filter_input( INPUT_POST, "lpw" );

// //3.DB接続します
// $pdo = db_con();

// //4.データ登録SQL作成
// $sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND life_flg=0";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':lid', $lid);
// // $stmt->bindValue(':lpw', $lpw);
// $res = $stmt->execute();

// //5.SQL実行時にエラーがある場合
// if($res==false){
//   sqlError($stmt);
// }

// //4. 抽出データ数を取得
// $val = $stmt->fetch();         //1レコードだけ取得する方法
// //$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

// if(password_verify($lpw, $val["lpw"]) ){
//   $_SESSION["chk_ssid"]  = session_id();
//   $_SESSION["kanri_flg"] = $val['kanri_flg'];
//   $_SESSION["name"]      = $val['name'];
//   header("Location: select.php");
// }else{
//   //logout処理を経由して全画面へ
//   header("Location: login.php");
// }
// exit();
?>

