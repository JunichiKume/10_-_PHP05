<?php
session_start();

//1.  DB接続します
include "funcs.php";
//セッションチェック
chkSsid();
$pdo = db_con();

// try {
// $pdo = new PDO('mysql:dbname=gs_db5_kadai;charset=utf8;host=localhost','root','');
// // return $pdo;
// } catch (PDOException $e) {
//   exit('データベースに接続できませんでした。'.$e->getMessage());
// }

//２．データ表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table_sleep");
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

    // $view .= '<td>'.url_link($result["id"], $result["checkdate"])."</td>";

    // function url_link(id ,txt){
    //     return '<a href="detail.php?id='.$id.'">'.$txt."</a>";      
    // }

    // if($_SESSION["kanri_flg"]=="1"){
    //   $view .= '<a href="delete.php?id=' . $result["id"] . '">';
    //   $view .= "[✖]";
    //   $view .= '</a>';
    // }

    //各検査項目にリンクを貼って修正する場合------------
    // $id_link = '<a href="detail.php?id='.$result["id"].'">';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["id"];
    // // $view .= '<td>'.$result["id"].'</td>';
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["checkDate"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["clinic"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["weight"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["bloodPressure"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["ahi"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["sleepiness"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["oralCleaning"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["jawJoint"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["oaUse"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["oralMuscle"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["tonguePressure"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["lowerJaw"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["nutrition"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["exercise"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["nextDate"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["remarks"];
    // $view .= '</td>';

    // $view .= '<td>';
    // $view .= $id_link; $view .= $result["indate"];
    // $view .= '</td>';
    //--------------------------------------------

    //編集リンクで修正する場合----------------------

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

    $json = json_encode($result);
  }
  $view .= '</table>';
}
?>

<script>

// // 1.ColumnCharts（数値データ）
// // ------------------------------------
//   // ライブラリのロード
//   // name:visualization(可視化),version:バージョン(1),packages:パッケージ(corechart)
//   google.load('visualization', '1', {'packages':['corechart']});     
         
//   // グラフを描画する為のコールバック関数を指定
//   google.setOnLoadCallback(drawChart);

// //   google.charts.load('current', {'packages':['bar']});
// //   google.charts.setOnLoadCallback(drawChart);
 
//   // グラフの描画   
//   function drawChart() {         
    
//     // $file = fopen($filename,"r");
//     // while(!feof($file)){
//     // $data = fgets($file);
//     // $str = explode(',',$data);
//     // if (count($str) > 1){
    
//     // 配列からデータの生成
//     var data = google.visualization.arrayToDataTable([
//       ['検査日','体重/kg','血圧/mmHg','AHI','下顎前方移動量'],
//       [<?php $view .= $result["checkDate"] ?>,<?php $view .= $result["weight"]?>,<?php $view .= $result["bloodPressure"]?>, <?php $view .= $result["ahi"]?>,<?php $view .= $result["lowerJaw"]?>,]])
//     // }};
//     // fclose($file);
//     // for(var i=0;i<data.length;i++){
//     //     console.log(data[i]);
//     // }
//     // data.foreach(function(value){
//     //     console.log(value);
//     // });
 
//     // オプションの設定
//     var options = {
//       title: '検査結果（数値データ）',
//     };        
    
//     /* 積み上げ棒グラフ
//     // オプションの設定
//     var options = {
//       title: '検査結果（数値データ）',
//       isStacked: true
//     };    
//     */
                 
//     // 指定されたIDの要素に棒グラフを作成
//     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
 
//   /* 横グラフ
//     // 指定されたIDの要素に棒グラフを作成
//     var chart = new google.visualization.BarChart(document.getElementById('chart_div'));    
//   */ 
//     // グラフの描画
//     chart.draw(data, options);
//   }
// ------------------------------------

// 2.RadarCharts（チェック項目）
// ------------------------------------
// <img src="http://chart.apis.google.com/chart?cht=r
// &amp;chxt=y,x
// &amp;chls=4|4
// &amp;chco=00AEEF
// &amp;chxp=0,0,20,40,60,80,100
// &amp;chd=t:77,60,50,80,85,65,77
// &amp;chxl=1:|A|B|C|D|E|F
// &amp;chm=s,00AEEF,0,-1,12,0|s,FFFFFF,0,-1,8,0
// &amp;chts=000000,20
// &amp;chtt=Sample
// &amp;chs=300x300" alt="Sample" />
// ------------------------------------

</script>

<!-- </table> -->

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>データ表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- ＜bootstrap読込み＞- -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- ＜bootstrap読込み＞- -->

<!-- ＜google chart読込み＞- -->
<!-- <script src="https://www.gstatic.com/charts/loader.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- ＜google chart読込み＞- -->

<!-- Head[Start] -->
<header>
  <!-- <nav class="navbar navbar-default">
    <div class="container-fluid" >
      <div class="navbar-header" style="text-align:center">
      <a class="navbar-brand" href="index.php" >検査結果／睡眠の状態</a>
      </div>
    </div>
  </nav> -->
  <!-- <?php echo $_SESSION["clinic"]; ?>　 -->
  <?php include("menu.php"); ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
     <p>検査結果一覧（検査施設 検索）</p>
     <input type="text" id="s">
     <button id="btn">検索</button>
     <div id="view" ><?=$view?></div>
</div>
<!-- <div > <?=$view?> </div> -->

<script>
   document.querySelector("#btn").onclick = function()
    {
    $.ajax({
                type: "post",
                url: "select.1.php",
                data: {
                    s: $("#s").val()
                },
                dataType: "html",
                success: function(data) {
                    console.log(data)
                    $("#view").html(data);
                }
            });
   }
</script>
<!-- Main[End] -->

</body>
</html>
