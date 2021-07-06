<html>
  <head>
      <title>
          會員資料建立
      </title>
  </head>
 </html>

<?php
//此頁面是做為開啓資料庫用的工具頁,可以require_once 'local_db.php'的指令使用

//以下為資料庫的設定項目
$host = 'localhost';
//設定資料庫路徑
$dbuser = 'root';
//設定資料庫使用者
$dbcode='logicansolve';
//設定資料庫密碼
$dbname='phon_yen';
//設定要使用的資料庫

$db_link= mysqli_connect($host, $dbuser, $dbcode, $dbname);//開啓資料庫輸入密碼等項目

if($db_link)
{
    mysqli_query($db_link, "SET NAMES utf8");
      echo "伺服器連結成功";



}else{

   echo 'MySql伺服器連結失敗:<br/>'. mysqli_connect_error();
   //連線失敗時顯示失敗的原因
}
  //mysqli_close($db_link);
  //與其他檔案相連時,不可使用關閉,否則連線不會成功

  ?>



