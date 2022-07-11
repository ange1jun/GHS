<?php
    session_start();
    include "../lib/dbconn.php";
    include "../lib/global.php";

    $num  = $_GET["num"];
	$page = $_GET["page"];

    $sql = "SELECT * 
            FROM BOARD 
            WHERE B_NUM = '$num'";

    $stid = oci_parse($conn, $sql);

	oci_execute($stid);

    $row = oci_fetch_array($stid);

    $name = $row[6];
	$subject = $row[1];
	$content = $row[5];	
?>
<!DOCTYPE html>
<html>    
<head>
<meta charset="utf-8">
<title> Gwangju Health Information </title>
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
  <li><a class="active"  href="../login/logout.php">로그아웃</a></li>
  <li><a class="active" href=""> 마이페이지 </a></li>
  <li><a class="active" href= "../board/board_list.php"> 게시판 </a></li>
  <li><a class="active" href=""> 운동시설 </a></li>
  <li><a class="active" href="../location.php">찾아오시는길</a></li>
</ul>
<h3 id="board_title">게시판 > 게시글수정</h3>

    <form name="modify" method="post" action ="board_modify.php?num=<?=$num?>&page=<?=$page?>" 
    enctype="multipart/form-data">
	<body id="board_form">
	    	<span class="col1">제목 : </span>
	    	<span class="col2">
                <input name = "B_TITLE" type="text"
            value="<?=$subject?>"> </span><br>
	<body id="text_area">	
	    	<span class="col1">내용 : </span>
	    	<span class="col2"> 
                <textarea name = "B_CONTENT"><?=$content?></textarea>
            </span>
    <button type="submit" name = "button"
     onclick="location.href='../board/board_modify.php'">수정</button>
	<button type="button" 
     onclick="location.href='../board/board_list.php'">목록</button>

</body>
<footer>
(주) Gwangju Health System   / 대표: 김범준, 유성훈, 박민성 <br>
주소: 전라남도 광주광역시 남구 효덕로 277 전산관 컴퓨터공학과실습실1004 <br>
사업자등록번호 685-86-00329 / 통신판매업신고번호 제 2022-전남광주-1004호 / <br> 
문의전화번호 : 1004-1004 (운영시간 평일 10:00~17:30)<br>
개인정보관리책임자 : 김범준 angel@naver.com<br><br>   
Copyright © 2022 GHS. All Rights Reserved.        
</footer>
</html>

