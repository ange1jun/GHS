<!DOCTYPE html>
<html>    
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
.star {
    position: relative;
    font-size: 2rem;
    color: #ddd;
  }
  
.star input {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    opacity: 0;
    cursor: pointer;
}
  
.star span {
    width: 0;
    position: absolute; 
    left: 0;
    color: red;
    overflow: hidden;
    pointer-events: none;
}
.writeTitle{
    width: 35%;
    margin: auto;
    margin-top: 30px;
    text-align: center;
    font-size: 30px;
}

.writeForm{
    width: 40%;
    margin: auto;
    margin-top: 60px;
    text-align: left;
}

.writeForm input[type=text]{
    font-size: 20px;
    margin-bottom: 30px;
}

.writeTextarea{
    width: 95%;
    height: 500px;
    text-align: center;
    resize: none;
}

.writeBtn{
    width: 95%;
    margin-top: 20px;
    text-align: center;
}

.writeBtn input[type=submit], .writeBtn input[type=button]{
   font-size: 16px;
}
</style>
</head>
<body>
<header>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">    
<B> Gwangju Health Infromation System </b>
</header>
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a class="active"  href="login.php">로그인</a></li>
        <li><a class="active" href="location.php">마이페이지</a></li>
        <li><a class="active" href="board.php">게시판</a></li>
        <li><a class="active"  href="">운동시설</a></li>
        <li><a class="active" href="location.php">찾아오시는길</a></li>
    </ul>
    <section>
        <div class="mainCon">
            <div class="writeTitle">리뷰 쓰기</div>
            <form class="writeForm" action="..gym_insert.php" method="post">
                <p><input class="writeTypeText" type="text"
                name="G_TITLE" size="50" placeholder="제목을 입력해주세요" required></p>
                <p><input class="writeTypeText" type="text" 
                name="G_ADDRESS" size="50" placeholder="주소를 입력해주세요" required></p>
                <textarea class="writeTextarea" 
                name="G_TXT" placeholder="본문을 입력해주세요"  required></textarea>
                <div class="writeBtn">

                <input type="submit" value="작성">&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" value="취소" onclick="history.back(1)">
                </div>
            </form>
        </div>
    </section>
    <footer></footer>
</body>
</html>
