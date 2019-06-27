<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>USER管理</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">管理USER登録画面</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>管理USER登録</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ID：<input type="text" name="lid"></label><br>
     <label>PW：<input type="password" name="lpw"></label><br>
     <!-- <label>管理者：<input type="text" name="kanri_flg"></label><br> -->
     <label>管理者：<select name="kanri_flg" id="kanri_flg" class=></label><br>
         <option value="0">管理者</option>
         <option value="1">スーパー管理者</option>
      </select>
     </label><br>
     <label>使用状況：<select name="life_flg" id="life_flg" class=></label><br>
         <option value="0">使用中</option>
         <option value="1">使用しなくなった</option>
      </select>
      </label><br>
     <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
