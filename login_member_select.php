
<?php
echo '    <title>會員區</title>';
//此頁為會員登入及會員個人頁面
require_once("local_db.php");//連接資料庫檔

$MemberNo=$_POST["member_no"];//登入會員帳號
$Password=$_POST["password"];//登入密碼

$selectmemberdata="SELECT * FROM `member` where member_no='$MemberNo' "; //建立選擇資料的sql語法

$memberresult=mysqli_query($db_link, $selectmemberdata); //請求執行

$memberrow1=mysqli_fetch_row($memberresult);

//----以下為閱讀選擇區


$datas=array();//建立一個陣列變數,準備要放查詢的資料
// echo'$db_link 資源變數版本為:'.mysqli_get_proto_info($db_link);//測試用,可以刪除
//-----------------------------------以下為資料庫讀取設定,此處讀取兩個資料夾

 $selectdata="SELECT * FROM `article` ORDER BY popularity DESC LIMIT 10"; //依熱門程度來排序的資料庫
 $result=mysqli_query($db_link, $selectdata); //請求執行"書籍資料庫"並存入$result中


       //以下兩行為測試用,只會在第一筆停止,上面一但取走,下面就不會顯示,可見無法重複取用
            //  $row1=mysqli_fetch_row($result);

            //  echo '<br>'.$row1[2].'測試';

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

//-------------------以下是依時間排序的資料庫

$datasortbytime=array();//建立一個陣列變數,準備要放查詢的資料
// echo'$db_link 資源變數版本為:'.mysqli_get_proto_info($db_link);//測試用,可以刪除
//-----------------------------------以下為資料庫讀取設定,此處讀取兩個資料夾

$selectdatabytime="SELECT * FROM `article` ORDER BY update_date DESC LIMIT 10"; //依熱門程度來排序的資料庫
$resultbytime=mysqli_query($db_link,  $selectdatabytime); //請求執行"書籍資料庫"並存入$result中


  //以下兩行為測試用,只會在第一筆停止,上面一但取走,下面就不會顯示,可見無法重複取用
       //  $row1=mysqli_fetch_row($resultbytime);

       //  echo '<br>'.$row1[2].'測試';

//----------------------------------------------------------以下為執行項
if($resultbytime){

 if(mysqli_num_rows($resultbytime)>0){
     //假如資料庫中的筆數不為0的話,就執行以下程式
     while($row = mysqli_fetch_assoc($resultbytime)){

       $datasortbytime[]=$row;
         //fetch_assoc可以一筆一筆將資料取出,當還有資料可取出就持續進行
         //將資料存入$datasortbytime的陣列中

     }
 }
 mysqli_free_result($resultbytime);
}else{
 echo"{ $selectdatabytime}語法執行失敗,錯誤訊息:".mysqli_error($db_link);
}


//-------------------以下是資料庫總列表

$Alllist=array();//建立一個陣列變數,準備要放查詢的資料

$Alllistdata="SELECT * FROM `article` "; //不排序資料庫
$Alllistresult=mysqli_query($db_link, $Alllistdata); //請求執行"書籍資料庫"並存入$result中


  //以下兩行為測試用,只會在第一筆停止,上面一但取走,下面就不會顯示,可見無法重複取用
       //  $row1=mysqli_fetch_row($result);

       //  echo '<br>'.$row1[2].'測試';

//----------------------------------------------------------以下為執行項
if( $Alllistresult){

 if(mysqli_num_rows($Alllistresult)>0){
     //假如資料庫中的筆數不為0的話,就執行以下程式
     while($row = mysqli_fetch_assoc( $Alllistresult)){

       $Alllist[]=$row;
         //fetch_assoc可以一筆一筆將資料取出,當還有資料可取出就持續進行
         //將資料存入$data的陣列中

     }
 }
 mysqli_free_result( $Alllistresult);
}else{
 echo"{$Alllistdata}語法執行失敗,錯誤訊息:".mysqli_error($db_link);
}
















?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    nav
    {
    display: flex;
    justify-content: space-between;
    }
    #sortbypopular{
    padding: 0px;
    margin: 0px;
    display: flex;
    align-items: flex-start;
    height: auto;
    justify-content: center;

}
#Alllist
{
    display: flex;
    justify-content: center;
}


</style>


    <title>會員區</title>


</head>
<body>
<nav >
<div id="logo" style="margin-left:15px;">
        <img  src="pic/fongyen2.png"  width="50" height="35" id="topimg" >        
</div>


<div id="BookName"  style="font-size:25px;">
會員區
</div>


<div id="gobackbutton" style="margin-right:15px;">
<input type="button" value="回首頁" onclick="self.location.href='index.php'"/>    
</div>

</nav>  
<hr>    
<div id="welcoome">
<?php 
echo '<br>'.$memberrow1[1].'您好!歡迎光臨 風簷!';

?>
</div>




    <!-- 熱門文章排行,左邊圖,右邊表格 -->
    <div id="populararticle" style="margin-left:40px; margin-bottom: 20px; margin-top: 30px; text-align: center; ">熱門文章排行榜</div>
    <div id="sortbypopular">
         <div>
            <img src="pic/TOP10.png" height="460px" width="550px" >  
         </div>

        <div style="height: 460px; width:550px;">
         
      <!-- 排行榜表格抬頭列 -->
            <table style="border: 1px black solid; margin-left: 10px; height: 460px;">
              <tr style="text-align: left;">
                <th style="width: 70px;">排行</th>
                <th style="width: 70px;">作者</th>
                <th style="width: 250px;">書名</th>
                <th style="width: 100px;">類別</th>                
                <th style="width: 80px;">人氣</th>
                <th style="width: 80px;">閱讀區</th>                
              </tr>
      <!-- 排行榜表內容列 -->

                <?php foreach($datas as $key => $row): ?>

              <tr >
              <td> 第<?php echo($key + 1); ?> 名</td>
              <td><?php echo $row['name']; ?>   </td>
              <td ><?php echo $row['book_name']; ?></td>
              <td><?php echo $row['book_type']; ?></td>
              <td><?php echo $row['popularity']; ?></td>
              <td >
                  <form name="select_article" method="POST" action="read_page.php">
                  <input type="hidden" name="BookNo" value="<?php echo $row['book_no']; ?> " >
                  <input type="hidden" name="StartPage" value="1" >                  
                  <input type="submit" value="進入">

                  </form>

              </td>

               </tr>

               <?php endforeach; ?>

            </table>           
            
        </div>

    </div>

    <br><br>
    <hr>
    <!-- 新進書籍_依時間排序,右邊圖,左邊表格 -->

    <div id="popularauthor" style="margin-left:40px; margin-bottom: 20px; margin-top: 30px; text-align: center; ">最新更新書籍</div>
    <div id="sortbypopular">


    <div style="height: 460px; width:580px;">
         
         <!-- 排行榜表格抬頭列 -->
               <table style="border: 1px black solid; margin-left: 10px; height: 460px;">
                 <tr style="text-align: left;">
                   <th style="width: 70px;">排行</th>
                   <th style="width: 70px;">作者</th>
                   <th style="width: 250px;">書名</th>
                   <th style="width: 100px;">類別</th>                
                   <th style="width: 80px;">更新日</th>
                   <th style="width: 80px;">閱讀區</th>                
                 </tr>
         <!-- 排行榜表內容列 -->
   
                   <?php foreach($datasortbytime as $key => $row): ?>
   
                 <tr >
                 <td> 第<?php echo($key + 1); ?> 名</td>
                 <td><?php echo $row['name']; ?>   </td>
                 <td ><?php echo $row['book_name']; ?></td>
                 <td><?php echo $row['book_type']; ?></td>
                 <td><?php echo $row['update_date']; ?></td>
                 <td >
                     <form name="select_article" method="POST" action="read_page.php">
                     <input type="hidden" name="BookNo" value="<?php echo $row['book_no']; ?> " >
                     <input type="hidden" name="StartPage" value="1" >                  
                     <input type="submit" value="進入">
   
                     </form>
   
                 </td>
   
                  </tr>
   
                  <?php endforeach; ?>
   
               </table>           
               
           </div>    




         <!-- 以下是依時排列的圖片 -->

        <div style="margin-left:10px;">
        <img src="pic/top10author.png" height="460px" width="550px" >  
        </div>

   </div>

   <br><br>
   <hr>

   <div id="popularauthor" style="margin-left:40px; margin-bottom: 20px; margin-top: 30px; text-align: center; align:center; ">書籍表列</div>

    <!-- 熱門文章排行,左邊圖,右邊表格 -->

    <div id="Alllist">
        <div >
         
      <!-- 全表列抬頭列 -->
            <table style="border: 1px black solid;  width:1200px; align:center; text-align:center; ">
              <tr >
                <th style="width: 70px;">序號</th>
                <th style="width: 70px;">作者</th>
                <th style="width: 250px;">書名</th>
                <th style="width: 100px;">類別</th>                
                <th style="width: 80px;">人氣</th>
                <th style="width: 80px;">閱讀區</th>                
              </tr>
      <!-- 全表列內容列 -->

                <?php foreach($Alllist as $key => $row): ?>

              <tr >
              <td> <?php echo($key + 1); ?> </td>
              <td><?php echo $row['name']; ?>   </td>
              <td ><?php echo $row['book_name']; ?></td>
              <td><?php echo $row['book_type']; ?></td>
              <td><?php echo $row['popularity']; ?></td>
              <td >
                  <form name="select_article" method="POST" action="read_page.php">
                  <input type="hidden" name="BookNo" value="<?php echo $row['book_no']; ?> " >
                  <input type="hidden" name="StartPage" value="1" >                  
                  <input type="submit" value="進入">

                  </form>

              </td>

               </tr>

               <?php endforeach; ?>

            </table>           
            
        </div>

    </div>











</body>
</html>