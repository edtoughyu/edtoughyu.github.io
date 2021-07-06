
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顯示資料庫的資料</title>
</head>
<body>
    

<?php
require_once("local_db.php");

      $datas=array();//建立一個陣列變數,準備要放查詢的資料
      echo'$db_link 資源變數版本為:'.mysqli_get_proto_info($db_link);

      $selectdata="SELECT * FROM `member`"; //建立選擇資料的sql語法
      $result=mysqli_query($db_link, $selectdata); //請求執行並存入$result中


      if($result){

           if(mysqli_num_rows($result)>0){
               //假如資料庫中的筆數不為0的話,就執行以下程式
               while($row = mysqli_fetch_assoc($result)){
                   $datas[]=$row;
                   //fetch_assoc可以一筆一筆將資料取出,當還有資料可取出就持續進行
                   //將資料存入$data的陣列中
               }


           }
           mysqli_free_result($result);

      }else{
           echo"{$selectdata}語法執行失敗,錯誤訊息:".mysqli_error($db_link);

      }

      if(!empty($datas)){
        print_r($datas); 

      }else{
         echo"查無資料";
      }
?>

<div>
  <?php if(!empty($datas)): ?>
    <ul>
        <?php foreach($datas as $key => $row): ?>
            <li>
                第<?php echo($key + 1); ?> 筆資料,
                會員序號:<?php echo $row['member_series_no']; ?>
                會員帳號:<?php echo $row['member_no']; ?>
                會員類型:<?php echo $row['member_type']; ?>
                密碼:<?php echo $row['password']; ?>
                姓名:<?php echo $row['name']; ?>
                性別:<?php echo $row['sex']; ?>     
                註冊日期:<?php echo $row['login_date']; ?>
                公司名稱:<?php echo $row['company_name']; ?>

            </li>
        <?php endforeach; ?>
    </ul>
       <?php else: ?>
        查無資料
        <?php endif; ?>  




</div>
<?php

mysqli_close($db_link);

?>


</body>
</html>
