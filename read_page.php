

<?php
require_once("local_db.php");//連接資料庫檔

//以下為數值的設定區




$Book_Number=$_POST['BookNo'];//取得書籍編號
//以下為測試
//echo $Book_Number;

//以下為用來確認總段數的程式
$selectdataforsection="SELECT * FROM `article_paragraph`where book_no='$Book_Number'"; //此資料庫存取給確認總段數用
$sectioncheck=mysqli_query($db_link, $selectdataforsection); //此query給確認總段數用
$totolsections=mysqli_num_rows($sectioncheck);//確認資料庫中的總段數
//echo '總段數'.$totolsections;//測試用
//以下將段數轉換為最大頁數
if (!$totolsections % 4==0){
    $MaxPageNum=(int)($totolsections/4)+1;
}else{
    $MaxPageNum=$totolsections/4;  
}
//echo $MaxPageNum;//測試用



//以下判斷頁數的由來是上下頁或是輸入頁數
if (!@$_POST['SelectedPage']=="")//如果輸入是來自於頁數
{
    $Selected_Page=@$_POST['SelectedPage'];
    $ChangePage=intval($Selected_Page) *4-3;

    if ($ChangePage<=0){
        $ChangePage=1;
    } 
    //echo  '$PageNumber1:'. $PageNumber1;//測試用
//如果頁數大於最大頁數
    if($ChangePage>$totolsections)
    {
        if($totolsections%4==0){
            $ChangePage=intval($totolsections)-3;
        }else{
           $ChangePage=intval($totolsections)-(intval($totolsections)%4)+1;              
        }
      
    }    
    


}
else //如果輸入是來自於上下頁
{
    $Start_Page=@$_POST['StartPage'];

    $ChangePage=$Start_Page;//如果頁數小於1則頁數=1
    if ($ChangePage<=0)
    {
        $ChangePage=1;
    }
//如果頁數大於最大頁數
    if($ChangePage>$totolsections)
    {
        if($totolsections%4==0){
            $ChangePage=intval($totolsections)-3;
        }else{
           $ChangePage=intval($totolsections)-(intval($totolsections)%4)+1;              
        }
      
    }

    //echo  '$PageNumber1:'. $PageNumber1;//測試用
}




//-----------------------------------------------



//以下為段落的選擇程式
$PageNumber1=$ChangePage;//建立段落數1
//echo  '$PageNumber1:'. $PageNumber1;//測試用

//$selectdata="SELECT * FROM `member` where member_no='$MemberNo' "; //建立選擇資料的sql語法
$selectdata1="SELECT * FROM `article_paragraph` where book_Paragraph_number='$PageNumber1' AND book_no='$Book_Number' "; 
//建立選擇資料的sql語法,應該要採雙定義

$result1=mysqli_query($db_link, $selectdata1); //請求執行並存入$result中

$row1=mysqli_fetch_row($result1);
//-------------------------------------------------------------------第二段

$PageNumber2=intval($ChangePage)+1; 
//建立段落數2,變數須轉為intval,否則會出現錯誤.
//echo  '$PageNumber2:'. $PageNumber2;//測試用
$selectdata2="SELECT * FROM `article_paragraph` where book_Paragraph_number='$PageNumber2' AND book_no='$Book_Number'"; 

$result2=mysqli_query($db_link, $selectdata2); //請求執行並存入$result中

$row2=mysqli_fetch_row($result2);

//-------------------------------------------------------------------第三段

$PageNumber3=intval($ChangePage)+2;//建立段落數3
$selectdata3="SELECT * FROM `article_paragraph` where book_Paragraph_number='$PageNumber3'  AND book_no='$Book_Number' "; 

$result3=mysqli_query($db_link, $selectdata3); //請求執行並存入$result中

$row3=mysqli_fetch_row($result3);

//-------------------------------------------------------------------第四段
$PageNumber4=intval($ChangePage)+3;//建立段落數4
$selectdata4="SELECT * FROM `article_paragraph` where book_Paragraph_number='$PageNumber4' AND book_no='$Book_Number'  "; 

$result4=mysqli_query($db_link, $selectdata4); //請求執行並存入$result中

$row4=mysqli_fetch_row($result4);

//以下為取得文章名稱的程式


$selecBookName="SELECT * FROM `article` where book_no='$Book_Number'  "; 

$BookNameResult=mysqli_query($db_link, $selecBookName); //請求執行並存入$result中

$BookRow=mysqli_fetch_row($BookNameResult);

?>



    <!-- 以下為頁面格式主體 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>風簷閱讀區</title>

<style>

nav{
    display: flex;
    justify-content: space-between;
}

#book_section{

    padding: 0px;
    margin: 0px;
    display: flex;
}

#ShowPageNumber{
    text-align: center;

     margin-bottom: 10px; 
     margin-top: 10px;
}

#pageselecter{
    margin-top: 10px;
display: flex;
justify-content: center;
align-items: center;


}


</style>

</head>
<body>
     <!-- 以下為標題列 -->   
<nav >
<div id="logo" style="margin-left:15px;">
        <img  src="pic/fongyen2.png"  width="50" height="35" id="topimg" >        
</div>


<div id="BookName"  style="font-size:25px;">
<?php
echo $BookRow[3];
?>
</div>


<div id="gobackbutton" style="margin-right:15px;">
<input type="button" value="回首頁" onclick="self.location.href='index.php'"/>    
</div>

</nav>     

<hr>
<!-- 以下為讀書區主體 -->
    <!-- 以下為左方空間 -->
<div id="book_section">
    <div id="spaceleft" style=" margin:0px; width:10%; height:430px;" ></div>
    <!-- 以下為左方頁面 -->
   
    <div id="bookleft" style="border: 1px black solid; margin:0px; width:40%; height:430px; padding:15px;" >
 <pre-wrap>    
<?php
echo '<br>'.$row1[4];

if(intval($ChangePage)+1<=$totolsections)//沒超過最大頁數才可執行
{
echo $row2[4];
}
//echo $ChangePage."changepage";//測試用
//echo $totolsections;

?>


 </pre-wrap>
    </div>

 <!-- 以下為右方頁面 -->

    <div id="bookright" style="border: 1px black solid; margin:0px; width:40%; height:430px; padding:15px;" >
    <pre-wrap>
<?php
if(intval($ChangePage)+2<=$totolsections)//沒超過最大頁數才可執行
{
echo '<br>'.$row3[4];
}
if(intval($ChangePage)+3<=$totolsections)//沒超過最大頁數才可執行
{
echo $row4[4];
}
?>
    </pre-wrap> 
   </div>

    <!-- 以下為右方空間 -->

    <div id="spaceright" style=" margin:0px; width:10%; height:430px;" ></div>
</div>

    <!-- 以下為底部頁數顯示 -->
<div id="ShowPageNumber">
<span>
    第
   <?php 
   $ShowPage=((intval($ChangePage)-1)/4)+1;  
   echo $ShowPage;  
   ?>
    頁
</span>
</div>
    <!-- 以下為頁面選擇區 -->

<div id="pageselecter" >
    <!-- 以下為上一頁按鍵 -->



<div id="pagebackward">
    <form name="pagebackward" method="POST" action="read_page.php">
      <?php    $lastnumber=intval($ChangePage)-4;//定義每次跳頁隔四個段落 ?>        
     
    <input type="hidden" name="BookNo" value="<?php echo $Book_Number; ?> " >  

    <input type="hidden" name="StartPage" value="<?php echo $lastnumber ?> " >                  
    <input type="submit" value="<上一頁">

     </form>
</div>





    <!-- 以下為下一頁按鍵 -->
<div id="pageforward" style="margin-left:10px;">
    <form name="pageforward" method="POST" action="read_page.php">
      <?php   
      

      $nextnumber=intval($ChangePage)+4;//定義每次跳頁隔四個段落 ?>        
     
    <input type="hidden" name="BookNo" value="<?php echo $Book_Number; ?> " >  

    <input type="hidden" name="StartPage" value="<?php echo $nextnumber ?> " >                  
    <input type="submit" value="下一頁>">

     </form>
</div>



    <!-- 以下為選擇頁按鍵 -->
<div id="inputpage" style="margin-left: 10px;">
    <form name="inputpage" method="POST" action="read_page.php">     
    <input type="hidden" name="BookNo" value="<?php echo $Book_Number; ?> " >
    <input type="text" name="SelectedPage"  > 
    <input type="submit" value="請輸入頁數">

     </form>
</div>

<div style="padding-bottom:17px; margin-left:10px">
   <span >本書總頁數為 <?php echo $MaxPageNum;  ?> 頁     </span> 
</div>

</div>



</body>
</html>