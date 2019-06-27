<?php
//共通に使う関数を記述

function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

// function db_con(){
//     try {
//         $pdo = new PDO('mysql:dbname=gs_db5_kadai;charset=utf8;host=localhost','root','');
//         return $pdo;
//     } catch (PDOException $e) {
//         exit('DB-Connection-Error:'.$e->getMessage());
//     }      
// }

function db_con(){
//     try {
//         $pdo = new PDO('mysql:dbname=gs_db5_kadai;charset=utf8;host=localhost','root','');
//         return $pdo;
//     } catch (PDOException $e) {
//         exit('DB-Connection-Error:'.$e->getMessage());
//       }      
// }
define("DB_NAME","gs_db5");
define("DB_HOST","localhost");
define("DB_ID","root");
define("DB_PW","");
try {
    $pdo = new PDO('mysql:dbname=gs_db5_kadai;charset=utf8;host=localhost','root','');
    return $pdo;
} catch (PDOException $e) {
    exit('DB-Connection-Error:'.$e->getMessage());
  }      
}

function redirect($page){
    header("Location: ".$page);
    exit;
}

function sqlError($stmt){ 
    $error = $stmt->errorInfo();
    exit("ErrorSQL:".$error[2]);
}

function chkSsid(){
    if(
      //先に存在のチェックが必要（ないものチェックするとエラー）
      !isset($_SESSION["chk_ssid"])||
      $_SESSION["chk_ssid"]!=session_id()
    ){
      exit("LOGIN:ERROR!");
    }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"]=session_id();
    }
}

?>