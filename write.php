<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>write.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ＜bootstrap,googlechart読込み＞- -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- ＜bootstrap,googlechart読込み＞- -->

<?php

$filename = "data.txt";

if ($_POST){

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

    $str = $checkDate.','.$clinic.','.$weight.','.$bloodPressure.','.$ahi.','.$sleepiness.','.$oralCleaning.','.$jawJoint.','.$oaUse.','.$oralMuscle.','.$tonguePressure.','.$lowerJaw.','.$nutrition.','.$exercise.','.$nextDate.','.$remarks;
    $filename = "data.txt";
    $file = fopen($filename,"a");
    fwrite($file, $str. "\r\n");
    fclose($file);
}
//
$file = fopen($filename,"r+");
?>

<div class="title_results" align="center"><h5>検査結果（履歴） ／ 睡眠の状態</h5></div>

<!-- <p><?php echo $_GET['date'] ?></p> -->

<table class="table table-striped">

<th>検査日</th>
<th>検査施設</th>
<th>体重<br>/kg</th>
<th>血圧<br>/mmHg</th>
<th>AHI</th>
<th>日中の<br>眠気</th>
<th>口腔<br>清掃</th>
<th>顎<br>関節</th>
<th>口腔内装置<br>使用状況</th>
<th>口腔筋<br>機能療法</th>
<th>舌圧</th>
<th>下顎前方<br>移動量（%）</th>
<th>栄養<br>指導</th>
<th>運動<br>指導</th>
<th>次回<br>受診</th>
<th>備考</th>

<?php
while(!feof($file)){
    $data = fgets($file);
    $str = explode(',',$data);
    if (count($str) > 1){
?>
<tr>
    <td><?php echo $str[0]; ?></td>
    <td><?php echo $str[1]; ?></td>
    <td><?php echo $str[2]; ?></td>
    <td><?php echo $str[3]; ?></td>
    <td><?php echo $str[4]; ?></td>
    <td><?php echo $str[5]; ?></td>
    <td><?php echo $str[6]; ?></td>
    <td><?php echo $str[7]; ?></td>
    <td><?php echo $str[8]; ?></td>
    <td><?php echo $str[9]; ?></td>
    <td><?php echo $str[10]; ?></td>
    <td><?php echo $str[11]; ?></td>
    <td><?php echo $str[12]; ?></td>
    <td><?php echo $str[13]; ?></td>
    <td><?php echo $str[14]; ?></td>
    <td><?php echo $str[15]; ?></td>
</tr>
<!-- ＜google chart＞ -->
<script>

// 1.ColumnCharts（数値データ）
// ------------------------------------
  // ライブラリのロード
  // name:visualization(可視化),version:バージョン(1),packages:パッケージ(corechart)
  google.load('visualization', '1', {'packages':['corechart']});     
         
  // グラフを描画する為のコールバック関数を指定
  google.setOnLoadCallback(drawChart);
 
  // グラフの描画   
  function drawChart() {         
    
    // $file = fopen($filename,"r");
    // while(!feof($file)){
    // $data = fgets($file);
    // $str = explode(',',$data);
    // if (count($str) > 1){
    
    // 配列からデータの生成
    var data = google.visualization.arrayToDataTable([
      ['検査日','体重/kg','血圧/mmHg','AHI','下顎前方移動量'],
      ['<?php echo $str[0]; ?>' ,<?php echo $str[2]; ?> ,<?php echo $str[3]; ?>,<?php echo $str[4]; ?>,<?php echo $str[11]; ?>],
    ])
    // }};
    // fclose($file);
    // for(var i=0;i<data.length;i++){
    //     console.log(data[i]);
    // }
    // data.foreach(function(value){
    //     console.log(value);
    // });
 
    // オプションの設定
    var options = {
      title: '検査結果（数値データ）',
    };        
    
    /* 積み上げ棒グラフ
    // オプションの設定
    var options = {
      title: '検査結果（数値データ）',
      isStacked: true
    };    
    */
                 
    // 指定されたIDの要素に棒グラフを作成
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
 
  /* 横グラフ
    // 指定されたIDの要素に棒グラフを作成
    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));    
  */ 
    // グラフの描画
    chart.draw(data, options);
  }
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

<?php
    }
}
fclose($file);
?>

</table>

 <!--  グラフの描画エリア -->
 <div id="chart_div" style="width: 100%; height: 350px"></div>
  
<!-- ＜google chart＞ -->
</body>
</html>