<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>データ登録</title>
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
<!-- ＜bootstrap,googlechart読込み＞- -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- ＜bootstrap,googlechart読込み＞- -->

<!-- Head[Start] -->
<header>
  <nav class="container-default">
     <div class="navbar-header"  width="450" align="center">
        <a class="navbar-brand" href="select.php">検査項目／睡眠の状態</a>
     </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container" width="450">
<form action="insert.php" method="post">
<table class="form-group" width="450" align="center">
<!-- <div class="title" align="center"><h5>検査項目 ／ 睡眠の状態</h5></div> -->
   <tr>
      <th>検査日</th>
      <td><input type="date" name="checkDate" class="form-control"> </td>
   </tr>
   <tr>
    <div class="form-group">
      <th>検査施設</th>
      <td><input type="text" name="clinic" class="form-control"></td>
    </div>
   </tr>
   <tr>
      <th>体重（kg）</th>
      <td><select name="weight" id="weight" class="browser-default custom-select">
        <option value="0" selected>選択してください</option>
        <?php
          for($num = 30;$num <= 99; $num++){
              echo '<option value="' .$num. '">' .$num. '</option>' . "\r\n";
          }
        ?>
      </td>  
   </tr>
   <tr>
      <th>血圧（mmHg）</th>
      <td><select name="bloodPressure" id="bloodPressure" class="browser-default custom-select">
        <option value="1" selected>選択してください</option>
        <?php
          for($num = 50;$num <= 180; $num++){
              echo '<option value="' .$num. '">' .$num. '</option>' . "\r\n";
          }
        ?>
      </td>
   </tr>
   <tr>
      <th>AHI</th>
      <td><select name="ahi" id="ahi" class="browser-default custom-select">
        <option value="3" selected>選択してください</option>
        <?php
          for($num = 0;$num <= 50; $num++){
              echo '<option value="' .$num. '">' .$num. '</option>' . "\r\n";
          }
        ?>
      </td>
   </tr>
   <tr>
      <th>日中の眠気</th>
      <td><select name="sleepiness" id="sleepiness" class="browser-default custom-select">
        <option value="有">有</option>
        <option value="無">無</option>
        </select>
      </td>
   </tr>
   <tr>
      <th>口腔清掃</th>
      <td><select name="oralCleaning" id="oralCleaning" class="browser-default custom-select">
        <option value="良">良</option>
        <option value="普通">普通</option>
        <option value="不十分">不十分</option>
        </select>
      </td>
   </tr>
   <tr>
      <th>顎関節</th>
      <td><select name="jawJoint" id="jawJoint" class="browser-default custom-select">
        <option value="良">良</option>
        <option value="普通">普通</option>
        <option value="不良">不良</option>
        </select>
      </td>
   </tr>
   <tr>
      <th>口腔内装置使用状況</th>
      <td><select name="oaUse" id="oaUse" class="browser-default custom-select">
        <option value="良">良</option>
        <option value="普通">普通</option>
        <option value="不十分">不十分</option>
        </select>
      </td>
   </tr>
   <tr>
      <th>口腔筋機能療法</th>
      <td><select name="oralMuscle" id="oralMuscle" class="browser-default custom-select">
        <option value="◎">◎</option>
        <option value="×">×</option>
        </select>
      </td>
   </tr>
   <tr>
      <th>舌圧</th>
      <td><select name="tonguePressure" id="tonguePressure" class="browser-default custom-select">
        <option value="強">強</option>
        <option value="普通">普通</option>
        <option value="弱">弱</option>
        </select>
      </td>
   </tr>
   <tr>
      <th>下顎前方移動量（%）</th>
      <td><select name="lowerJaw" id="lowerJaw" class="browser-default custom-select">
        <option value="4" selected>選択してください</option>
        <?php
          for($num = 1;$num <= 30; $num++){
              echo '<option value="' .$num. '">' .$num. '</option>' . "\r\n";
          }
        ?>
      </td>
   </tr>
   <tr>
      <th>栄養指導</th>
      <td><select name="nutrition" id="nutrition" class="browser-default custom-select">
        <option value="◎">◎</option>
        <option value="×">×</option>
        </select>
      </td>
   </tr>
   <tr>
      <th>運動指導</th>
      <td><select name="exercise" id="exercise" class="browser-default custom-select">
        <option value="◎">◎</option>
        <option value="×">×</option>
        </select>
      </td>
   </tr>
   <tr>
      <th>次回受診</th>
      <td><input type="date" name="nextDate" class="form-control" > 
      </td>
   </tr>
   <tr>
    <div class="form-group">
      <th>備考</th>
      <td><input type="text" name="remarks" class="form-control"></td>
    </div>
   </tr>
   <tr>
   <div class="button">
      <th></th>
      <td style="text-align:right;"><button type="submit" value="登録" class="btn btn-primary" >登録</button></td>
   </div>
   </tr>
</table>
</form>
</div>
<!-- Main[Start] -->

</body>
</html>