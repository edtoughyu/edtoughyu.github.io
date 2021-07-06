
<?php
require_once("local_db.php");//取出資料庫

      $datas=array();//建立一個陣列變數,準備要放查詢的資料
      echo'$db_link 資源變數版本為:'.mysqli_get_proto_info($db_link);//測試用,可以刪除
//-----------------------------------以下為資料庫讀取設定,此處讀取兩個資料夾

      $selectdata="SELECT * FROM `article`"; //設定書籍的資料庫變數
      $result=mysqli_query($db_link, $selectdata); //請求執行"書籍資料庫"並存入$result中
     
     


      //----------------------------------------------------------以下為執行項
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
                第<?php echo($key + 1); ?> 名,
                作者:<?php echo $row['name']; ?>    
                會員帳號:<?php echo $row['member_no']; ?>
                書名:<?php echo $row['book_name']; ?>
                類別:<?php echo $row['book_type']; ?>
                人氣:<?php echo $row['popularity']; ?>
            


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








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>風簷</title>
<style>
nav{
    padding: 0px;
    margin: 0px;
    display: flex;
    align-items: flex-start;
    height: 100px;

}


#login{
    flex:4;
text-align: right;
margin: 0px;
padding-bottom: 7px;
padding-right: 30px;
padding-top: 10px;

}
#logo{
    position: absolute;
    top: 10px;
    left: 30px;
}
#sortbypopular{
    padding: 0px;
    margin: 0px;
    display: flex;
    align-items: flex-start;
    height: auto;
    justify-content: center;


}




</style>


</head>
<body>
    <!-- 導覽項目 左邊logo,右邊登入項目-->    
    <nav> 
   <div id="logo">
            <img  src="pic/fongyen2.png"  width="100" height="70" id="topimg" >        
    </div>

        <div id="login">
            <a href="http://localhost/myproject/login.html"style="text-decoration: none;border: 1px black solid; border-radius: 3px; padding:3px;" >登入</a>

          <a href="http://localhost/myproject/register.html"style="text-decoration: none;border: 1px black solid; border-radius: 3px; padding:3px;" >註冊</a>



        </div>        
 
    </nav>

    <!-- 首頁主要圖面 -->
    <div id="movepic"  >
    <img src="pic/main3.jpg" style="display:block; margin: auto;">
    </div>
    <br>
    <hr>

    <!-- 熱門文章排行,左邊圖,右邊表格 -->
    <div id="populararticle" style="margin-left:40px; margin-bottom: 20px; margin-top: 30px; text-align: center; ">熱門文章排行榜</div>
    <div id="sortbypopular">
         <div>
            <img src="pic/TOP10.png" height="300px" width="500px" >  
            </div>
         <div style="height: 300px; width:500px;">

            <table style="border: 1px black solid; margin-left: 10px; height: 300px;">
              <tr style="text-align: left;">
                <th style="width: 70px;">排行</th>
                <th style="width: 70px;">作者</th>
                <th style="width: 200px;">書名</th>
                <th style="width: 70px;">類別</th>                
                <th style="width: 80px;">人氣</th>
              </tr>

                <?php foreach($datas as $key => $row): ?>





              <tr>
              <td> 第<?php echo($key + 1); ?> 名</td>
              <td><?php echo $row['name']; ?>   </td>
              <td ><?php echo $row['book_name']; ?></td>
              <td><?php echo $row['book_type']; ?></td>
              <td><?php echo $row['popularity']; ?></td>
               </tr>

    <?php endforeach; ?>

            </table>
            
            
        </div>


    </div>

    <br><br>
    <hr>
    <!-- 熱門作者,右邊圖,左邊表格 -->

    <div id="popularauthor" style="margin-left:40px; margin-bottom: 20px; margin-top: 30px; text-align: center; ">熱門作者棑行榜</div>
    <div id="sortbypopular">

        <div style="height: 300px; width:500px;">

           <table style="border: 1px black solid; margin-left: 10px; height: 300px;">
             <tr style="text-align: left;">
               <th style="width: 70px;">排行</th>
               <th style="width: 70px;">作者</th>
               <th style="width: 200px;">書名</th>
               <th style="width: 70px;">類別</th>                
               <th style="width: 80px;">人氣</th>

             </tr>
             <tr><td>第一名</td><td>向問天</td><td >天若有情真是蠢</td><td>科幻</td><td>5432112</td> </tr>
           </tr>
           <tr><td>第二名</td><td>漆把刀</td><td>莫明其妙的咖啡館</td><td>言情</td><td>4432112</td> </tr>
       </tr>
       <tr><td>第三名</td><td>窮搖</td><td>鼻孔深深深幾許</td><td>醫學</td><td>3432112</td> </tr>
   </tr>
   <tr><td>第四名</td><td>張礙鈴</td><td>白玫瑰與黑攻瑰都謝了</td><td>農業</td><td>2232112</td> </tr>
</tr>
<tr><td>第五名</td><td>余雨中</td><td>六零少女</td><td>武俠</td><td>2132112</td> </tr>
</tr>
<tr><td>第六名</td><td>金佣</td><td>天龍叭布</td><td>商店經營</td><td>2032112</td> </tr>
</tr>
<tr><td>第七名</td><td>五毛</td><td>我的夢遊沙哈拉日記</td><td>科幻</td><td>1932112</td> </tr>
<tr><td>第八名</td><td>魯遜</td><td>小P歪傳</td><td>武俠</td><td>1832112</td> </tr>
<tr><td>第九名</td><td>苦龍</td><td>小蔡飛刀</td><td>政治</td><td>1732112</td> </tr>
<tr><td>第十名</td><td>倪誆</td><td>這裡沒有外星人</td><td>哲學</td><td>1632112</td> </tr>

           </table>
           
           
       </div>
       <div>
        <img src="pic/top10author.png" height="300px" width="500px" >  
        </div>

   </div>

   <br><br>
   <hr>








    <div id="sortbytype">圖書分類 </div>
    <div id="sortbyname">依文字列表</div>

</body>
</html>