

<?php
require_once("local_db.php");//連接資料庫檔

//以下為數值的設定區

$T="1";//段落的起始筆數


//-----------------------------------------------
$PageNumber1="$T";//建立段落數1


//$selectdata="SELECT * FROM `member` where member_no='$MemberNo' "; //建立選擇資料的sql語法
$selectdata1="SELECT * FROM `article_paragraph` where book_Paragraph_number='$PageNumber1' "; 
//建立選擇資料的sql語法,應該要採雙定義

$result1=mysqli_query($db_link, $selectdata1); //請求執行並存入$result中

$row1=mysqli_fetch_row($result1);
//-------------------------------------------------------------------第二段
$PageNumber2="$T"+1;//建立段落數2
$selectdata2="SELECT * FROM `article_paragraph` where book_Paragraph_number='$PageNumber2' "; 

$result2=mysqli_query($db_link, $selectdata2); //請求執行並存入$result中

$row2=mysqli_fetch_row($result2);

//-------------------------------------------------------------------第三段
$PageNumber3="$T"+2;//建立段落數3
$selectdata3="SELECT * FROM `article_paragraph` where book_Paragraph_number='$PageNumber3' "; 

$result3=mysqli_query($db_link, $selectdata3); //請求執行並存入$result中

$row3=mysqli_fetch_row($result3);

//-------------------------------------------------------------------第四段
$PageNumber4="$T"+3;//建立段落數4
$selectdata4="SELECT * FROM `article_paragraph` where book_Paragraph_number='$PageNumber4' "; 

$result4=mysqli_query($db_link, $selectdata4); //請求執行並存入$result中

$row4=mysqli_fetch_row($result4);






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>風簷閱讀區</title>

<style>
#book_section{

    padding: 0px;
    margin: 0px;
    display: flex;
}

</style>



</head>
<body>
    
<div id="logo">
        <img  src="pic/fongyen2.png"  width="50" height="35" id="topimg" >        
</div>
<hr>

<div id="book_section">
    <div id="spaceleft" style=" margin:0px; width:10%; height:500px;" ></div>

    <div id="bookleft" style="border: 1px black solid; margin:0px; width:40%; height:500px; padding:15px;" >
    
<?php
echo '<br>'.$row1[4];
echo $row2[4];
?>



    </div>
    <div id="bookright" style="border: 1px black solid; margin:0px; width:40%; height:500px; padding:15px;" >
<?php
echo '<br>'.$row3[4];
echo $row4[4];
?>



    </div>
    <div id="spaceright" style=" margin:0px; width:10%; height:500px;" ></div>
</div>







</body>
</html>