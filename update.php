<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

// index.phpから送られてきたデータを変数で受け取る
$checkDate = $_POST["checkDate"];
$clinic = $_POST["clinic"];
$weight = $_POST["weight"];
$bloodPressure = $_POST["bloodPressure"];
$ahi = $_POST["ahi"];
$sleepiness = $_POST["sleepiness"];
$oralCleaning = $_POST["oralCleaning"];
$jawJoint = $_POST["jawJoint"];
$oaUse = $_POST["oaUse"];
$oralMuscle = $_POST["oralMuscle"];
$tonguePressure = $_POST["tonguePressure"];
$lowerJaw = $_POST["lowerJaw"];
$nutrition = $_POST["nutrition"];
$exercise = $_POST["exercise"];
$nextDate = $_POST["nextDate"];
$remarks = $_POST["remarks"];
$id = $_POST["id"];


//2. DB接続します
include "funcs.php";
$pdo = db_con();
// ＜関数処理しない場合＞
// try {
//   $pdo = new PDO('mysql:dbname=gs_db5_kadai;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('データベースに接続できませんでした。'.$e->getMessage());
// }

//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table_sleep SET checkDate=:checkDate, clinic=:clinic, weight=:weight, bloodPressure=:bloodPressure, ahi=:ahi, sleepiness=:sleepiness, oralCleaning=:oralCleaning, jawJoint=:jawJoint, oaUse=:oaUse, oralMuscle=:oralMuscle, tonguePressure=:tonguePressure, lowerJaw=:lowerJaw, nutrition=:nutrition, exercise=:exercise, nextDate=:nextDate, remarks=:remarks WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':checkDate', $checkDate,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)rating
$stmt->bindValue(':clinic', $clinic,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':weight', $weight,PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bloodPressure', $bloodPressure, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':ahi', $ahi, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sleepiness', $sleepiness, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':oralCleaning', $oralCleaning, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':jawJoint', $jawJoint, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':oaUse', $oaUse, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':oralMuscle', $oralMuscle, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tonguePressure', $tonguePressure, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lowerJaw', $lowerJaw, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':nutrition', $nutrition, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':exercise', $exercise, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':nextDate', $nextDate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':remarks', $remarks, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

// $sql = "UPDATE gs_user_table_ SET name=:name,  WHERE id=:id";
// $u_stmt = $pdo->prepare($sql);
// $u_stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $u_stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $u_status = $u_stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//   sqlError($stmt);
// ＜関数処理しない場合＞
  $error = $stmt->errorInfo();
  exit("ErrorSQL:".$error[2]);
//   exit("QueryError:".$error[2]);
}else{
//５．index.phpへリダイレクト　この処理がないと画面が切り替わらない
//    redirect("select.php");
// ＜関数処理をしない場合＞
   header("Location: select.php");
   exit;
}

// if($u_status==false){
//   //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
// //   sqlError($stmt);
// // ＜関数処理しない場合＞
//   $error = $u_stmt->errorInfo();
//   exit("ErrorSQL:".$error[2]);
// //   exit("QueryError:".$error[2]);
// }else{
// //５．index.phpへリダイレクト　この処理がないと画面が切り替わらない
// //    redirect("select.php");
// // ＜関数処理をしない場合＞
//    header("Location: select.php");
//    exit;
// }
?>


