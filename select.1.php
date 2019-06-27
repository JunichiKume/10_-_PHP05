<?php
session_start();

//1.  DB接続します
include "funcs.php";
//セッションチェック
// chkSsid();

//↓追加　検索キーワード
$s = $_POST["s"];

$pdo = db_con();

// try {
// $pdo = new PDO('mysql:dbname=gs_db5_kadai;charset=utf8;host=localhost','root','');
// // return $pdo;
// } catch (PDOException $e) {
//   exit('データベースに接続できませんでした。'.$e->getMessage());
// }

//２．データ表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table_sleep WHERE clinic LIKE :s");
// ↓追加 %あいまい検索？
$stmt->bindValue(":s" , '%'.$s.'%' ,PDO::PARAM_STR);
$status = $stmt->execute();

// $u_stmt = $pdo->prepare("SELECT * FROM gs_user_table");
// $u_status = $u_stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合⇒配列index[2]にエラーコメントあり）
  $error = $stmt->errorInfo(); 
  exit("ErrorSQL:".$error[2]);
//   exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

  $view .= '<table class="table">';

  $view .= '<th>ID';
  $view .= '<th>検査日';
  $view .= '<th>検査施設';
  $view .= '<th>体重<br/>（kg）';
  $view .= '<th>血圧<br/>（mmHg）';
  $view .= '<th>AHI';
  $view .= '<th>日中の<br/>眠気';
  $view .= '<th>口腔清掃';
  $view .= '<th>顎関節';
  $view .= '<th>口腔内装置<br/>使用状況';
  $view .= '<th>口腔筋<br/>機能療法';
  $view .= '<th>舌圧';
  $view .= '<th>下顎前方<br/>移動量（%）';
  $view .= '<th>栄養指導';
  $view .= '<th>運動指導';
  $view .= '<th>次回受診';
  $view .= '<th>備考';
  $view .= '<th>登録日時';
  // $view .= '<th>登録者';
  $view .= '<th>編集';
  $view .= '<th>削除';

  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
    //detail.php=GETデータ送信リンク作成
    $view .= '<p>';
    $view .= '<tr>';

    $view .= '　';

    $view .= '<td>'; $view .= $result["id"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["checkDate"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["clinic"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["weight"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["bloodPressure"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["ahi"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["sleepiness"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["oralCleaning"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["jawJoint"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["oaUse"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["oralMuscle"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["tonguePressure"];$view .= '</td>';
    $view .= '<td>'; $view .= $result["lowerJaw"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["nutrition"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["exercise"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["nextDate"]; $view .= '</td>';
    $view .= '<td>'; $view .= $result["remarks"]; $view .= '</td>';
    $view .= '<td>';  $view .= $result["indate"]; $view .= '</td>';

    // while( $result = $u_stmt->fetch(PDO::FETCH_ASSOC)){
    //   // if($_SESSION["kanri_flg"]=="1"){
    //   // $view .= '　';
    //   $view .= '<td>';
    //   $view .= '<a href="user\user_select.php?id='.$result["id"].'">';
    //   $view .= $result["name"]; 
    //   $view .= '</td>';
    //   $view .= '</a>';
    // }

    if($_SESSION["kanri_flg"]=="1"){
    $view .= '<td>';
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= "[編集]";
    $view .= '</td>';
    $view .= '</a>';
    } 
    //--------------------------------------------

    // $view .= '<a href="detail.php?id='.$result["checkDate"].'">';
    // $view .= '<td>'.$result["checkDate"].'</td>';
    // $view .= '</a>';

    // $view .= $result["id"]." : ".$result["checkDate"]." : ".$result["clinic"]." : ".$result["weight"]." : ".$result["bloodPressure"]." : ".$result["ahi"]." : ".$result["sleepiness"]." : ".$result["oralCleaning"]." : ".$result["jawJoint"]." : ".$result["oaUse"]." : ".$result["oralMuscle"]." : ".$result["tonguePressure"]." : ".$result["lowerJaw"]." : ".$result["nutrition"]." : ".$result["exercise"]." : ".$result["nextDate"]." : ".$result["remarks"]." : ".$result["indate"];
    // $view .= '</a>';
    // $view .= '</td>';

    // $view .= "<td>".$result["clinic"]."</td>";

    // echo '<form action="delete.php" method="post">';
    
    $view .= '<td>';
    // データベースのデータ削除
    $view .= '　';
    // $view .= "<button class='button btn'>[詳細]</button> <i class='glyphicon glyphicon-apple'/>";
    if($_SESSION["kanri_flg"]=="1"){
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= "[削除]";
    $view .= '</td>';
    $view .= '</a>';
    }
    
    $view .= '</p>';
    $view .= '</tr>';

    // $json = json_encode($result);

  }
  // $view .= '</table>';
  echo $view;

}
?>