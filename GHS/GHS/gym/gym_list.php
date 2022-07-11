<!DOCTYPE html>
<meta charset="UTF-8">
<html>  
<title> Gwangju Health Infrombation </title>  
<head>
<style>    
footer {
    position : fixed;
    bottom : 0;
    left: 0;
    bottom: 0;
    width: 100%;
    padding: 5px 0;
    text-align: center;
    color: white;
    background: brown;
    font-size:0.7em;
    
}
header{
    text-align: center;
    font-size: 35px;
    font-family: Arial;
    color: black;
    padding: 40px 40px;
    font-family: 'Kdam Thmor Pro', sans-serif;
}
body {
    background-color :	#FFE4E1;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;    
}
p {
    margin: 0;
    padding: 0;
    text-align: center;
}
li {
    float: right; 
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none; 
}
li a:hover {
    background-color: #115;
}
.active {
    overflow: hidden;    
}
.button1{
  background-color :	#FFE4E1;
  border: none;
  color: black;
  padding: 16px 30px;;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width: 49%;
  border: 2px solid #4CAF50;
}
.button1:hover {
  background-color: #4CAF50;
  color: white;
}
.button2 {
  background-color : #FFE4E1;
  border: none;
  color: black;
  padding: 16px 30px;;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width: 50%;
  border: 2px solid #008CBA;
}
.button2:hover {
  background-color: #008CBA;
  color: white;
}
/* .button3 { 
    background-color : #FFE4E1;
  border: none;
  color: black;
  padding: 16px 30px;;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width: 12%;
} 
.button3:hover {
  background-color: #f44336;
  color: white;
}*/
table {
  border-collapse: collapse;
  width: 100%;
  text-align:center;
}

 td {
  border-collapse: collapse;
  border-bottom: solid 1px gray;
  text-align:center;
  padding: 12px; 
}

th {
  background-color: black;
  padding:12px;
  color: white;
  text-align:center;
}

#page_num {
    background-color: #FFE4E1;
    font-size: 20px;
  	text-align: center;	
    margin: 30px 0 
  }



</style>
</head>
<body>
<header>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">    
<B> Gwangju Health Information System </b>
</header>

<ul>
  <li><a class="active" href="../main.php">Home</a></li>
  <li><a class="active" href="../login/logout.php">로그아웃</a></li>
  <li><a class="active" href="../mypage/my.php"> 마이페이지 </a></li>
  <li><a class="active" href= "../board/board_list.php"> 게시판 </a></li>
  <li><a class="active" href="../gym/gym_list.php"> 운동시설 </a></li>
  <li><a class="active" href="../location.php">찾아오시는길</a></li>
</ul>
<table>
<tr>
   <th width="70">번호</th>
   <th width="2000">리뷰목록</th>
   <th width="70">조회수</th>
</tr>   
<div id="button">
   <button class="button1" 
   onclick="location.href='../gym/gym_list.php'">목록으로</button>
   <button class="button2" 
   onclick="location.href='../gym/gym_form.php'">리뷰작성</button>
   <!-- <button class="button3"  -->
   <!-- onclick="location.href='../board/board_modify_form.php'">수정하기</button> -->
</div>
</table>
</body>

<?php 
include "../lib/dbconn.php";
include "../lib/global.php";

if (isset($_GET["page"]))
$page = $_GET["page"];
else
$page = 1;

$sql = "SELECT COUNT(*) 
        FROM GYM
        ORDER BY G_NUM DESC";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

// 전체글
$total_record = oci_fetch_array ($stid, OCI_ASSOC + OCI_NUM); 
// 페이징될 개시글수
$scale = 5;

// 전체 페이지 
if ($total_record[0] % $scale == 0)
    $total_page = floor($total_record[0]/$scale);
else 
    $total_page = floor($total_record[0]/$scale) + 1;

// 표시할 페이지 
$start = ($page -1) * $scale;

// 기존 글 순서 
$number = $total_record[0] - $start ;

for ($i=$start; $i<$start+$scale && $i < $total_record[0]; $i++){ 
  $sql = "SELECT G_NUM, G_TITLE, HIT
          FROM (SELECT ROW_NUMBER() OVER (ORDER BY G.G_NUM) AS GNUM, G.* FROM GYM G) r 
          WHERE r.GNUM = '$number' 
          ORDER BY GNUM DESC";

  $stid = oci_parse($conn, $sql);
  oci_execute($stid);

  $row = oci_fetch_array($stid);
  //레코드 호출
  $num         = $row[0];  
  $subject     = $row[1];
  $hit         = $row[2];
?>
<table>
  <td width="70"><?=$num?></td>
  <td width="2000"><a href="gym_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></td>
  <td width="100"><?=$hit?></td>
</table>

<?php
    $number--;
}
    oci_close($conn);

?>
  </ul>
  <ul id="page_num">
<?php
    	if ($total_page>=2 && $page >= 2)	
      {
        $new_page = $page-1;
        echo "<span><a href='gym_list.php?page=$new_page'>◀ 이전</a> </span>";
      }		
      else 
        echo "<span>&nbsp;</span>";
      // 링크번호 출력
      for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<span><b> $i </b></span>";
		}
		else
		{
			echo "<span><a href='gym_list.php?page=$i'> $i </a><span>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<span> <a href='gym_list.php?page=$new_page'>다음 ▶</a> </span>";
	}
	else 
		echo "<span>&nbsp;</spna>";
?>
<footer>
(주) Gwangju Health System   / 대표: 김범준, 유성훈<br>
주소: 전라남도 광주광역시 남구 효덕로 277 전산관 컴퓨터공학과실습실1004 <br>
사업자등록번호 685-86-00329 / 통신판매업신고번호 제 2022-전남광주-1004호 / <br> 
문의전화번호 : 1004-1004 (운영시간 평일 10:00~17:30)<br>
개인정보관리책임자 : 김범준 angel@naver.com<br><br>   
Copyright © 2022 GHS. All Rights Reserved.        
</footer>
</html>