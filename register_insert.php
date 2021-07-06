

<?php
//先引用資料庫取用檔


require_once("local_db.php");

//以下輸入網頁上的會員資料----------------------------------
$MemberNo=$_POST["member_no"];//會員帳號
$MemberType=$_POST["member_type"];//會員類型
$Password=$_POST["password"];//密碼
$Name=$_POST["name"];//姓名
switch($_POST["sex"]){     //輸入性別,以case的方式讀取值
case "male";
  $Sex="male";
  break;

case "female";
  $Sex="female";
  break;
}

$Email=$_POST["email"];//電子郵件
$Company=$_POST["company"];//公司名稱
$LoginDate=$_POST["login_date"];//登入日期

//-------------------------------------------------------

$insertdata="INSERT INTO `member`(`member_no`,`member_type`,`password`,`name`,`sex`,`email`,`login_date`,`company_name`)VALUE('{$MemberNo}', '{$MemberType}','{$Password}','{$Name}','{$Sex}','{$Email}','{$LoginDate}','{$Company}')"; //建立儲存資料的sql語法,將網頁中的變數存入
$result=mysqli_query($db_link, $insertdata); //請求執行並存入$result中


if(mysqli_affected_rows($db_link)>0)
{
   echo $Name."您好!您已成功的加入了會員!請重新登入!";
}
elseif(mysqli_affected_rows($db_link)==0)
{
   echo"無法新增資料,請回上頁重新輸入!";
}
else
{
  echo"錯誤訊息:".mysqli_error($db_link);
}





?>

<br>
<input type="button" value="首頁" onclick="self.location.href='index.html'"/>

<p><?php echo $Name ?>  </p>
<p><?php echo $Sex ?>  </p>

