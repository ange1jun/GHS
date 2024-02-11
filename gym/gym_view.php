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
h3{
    color:gray;
}
#view_content{
    background-color:#FFE4E1;
}

#view_content .col1{
    padding:100;
    font-size:40px;
    border-bottom: solid 1px gray;
    background-color:#FFE4E1;
}
#view_content .col2{
    padding:100;
}
#view_button {
    background-color:#FFE4E1;
}

#REPLY_BOX {
    background-color:#FFE4E1;
    width:1841px;
    margin: top 100px;
    word-break:break-all;
}
#content_button{
    background-color:#FFE4E1;
}

#reply_BOX{
    background-color:#FFE4E1;
}
.reply_button {
    position: absolute;
    width: 100px;
    height:56px;
    font-size:16px;
    margin-left: 10px;
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

<?php
    session_start();
    include "../lib/dbconn.php";
    include "../lib/global.php";
    
    $num = $_GET["num"];
    $page = $_GET["page"];

    $sql ="SELECT *
           FROM GYM
           WHERE G_NUM = '$num'";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    $row = oci_fetch_array($stid);
    $subject     = $row[1];
    $content     = $row[4];
    $mid         = $row[3];    //1 글쓴이 //2제목 //3내용 

    $content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

    // 조회수
    $sql = "UPDATE GYM
            SET HIT = HIT + 1
            WHERE G_NUM = '$num'";   
	$stid = oci_parse($conn, $sql);
    oci_execute($stid);

    ?>

<ul id="view_content">
				<span class="col1"> <b> <?=$subject?></b><br></span>
				<span class="col2"><br><?=$content?></span>
                <span class="col3"><br><br><br><?=$mid?>님이 작성한 글입니다.</span>

</form>
</ul>