



<?php
require_once("local_db.php");//連接資料庫檔

$MemberNo=$_POST["member_no"];//登入會員帳號
$Password=$_POST["password"];//登入密碼


$selectdata="SELECT * FROM `member` where member_no='$MemberNo' "; //建立選擇資料的sql語法

$result=mysqli_query($db_link, $selectdata); //請求執行並存入$result中

$row1=mysqli_fetch_row($result);

echo '<br>'.$row1[1].'您好!歡迎光臨 風簷!';

echo '<br>'.$row1[3];
?>