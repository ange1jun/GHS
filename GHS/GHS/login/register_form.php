<?php 
    header("Content-Type:text/html; charset=utf-8"); 
    
    include "../lib/dbconn.php";
    include "../lib/global.php";
    ?>

<!DOCTYPE html> 
<html lang= 'ko'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">  
    <title>회원가입</title> 
    <style>   
    body 
    {
	    background-image: url("../img/bg.jpg");
	    background-size: cover;
	    opacity: 0.7;
	    display: flex;
	    justify-content: center;
	    align-items: center;	   
	    flex-direction: column;	
        
    }
    
    *{
	    font-family: sans-serif;
	    box-sizing: border-box;
    }

    form 
    {
	    width: 500px;
	    border: 2px solid #ccc;
	    padding: 30px;
	    background: #fff;
	    border-radius: 10px;
    }

    h2
    {
	    text-align: center;
	    margin-bottom: 40px;
	    color: rgb(0, 57, 122)
    }

    input 
    {
	    display: block;
	    border: 1px solid rgb(0, 122, 82);
	    width: 95%;
	    padding: 10px;
	    margin: 10px auto;
	    border-radius: 5px;
    }
    label 
    {
	    color: rgb(0, 0, 0);
	    font-size: 14px;
	    p  adding: 10px;
    }

    button 
    {
	    float: right;
	    background: rgb(0, 122, 82);
	    padding: 10px 15px;
	    color: #fff;
	    border-radius: 5px;
	    margin-right: 10px;
	    border: none;
    }

    button:hover
    {
	    opacity: .7;
    }

    .error 
    {
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
    }

    .success 
    {
        background: #D4EDDA;
        color: #40754C;
        padding: 5px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
    }

    h1
    {
	    text-align: center;
	    color: #fff;
    }

    .save 
    {
	    font-size: 12px;
	    color: #555;
	    display: inline-block;
	    padding: 10px;
	    text-decoration: none;	
    }
    .save:hover {
	text-decoration: underline;


} 
</style>
    <!--스타일시트-->
    <!--<link rel = "stylesheet" type ="text/css" href="./DB/ce182033/css/register.css">-->
</head>
<body>  
    <form class="insert" action = "register_insert.php" method = "post">
    <h2>회원가입</h2>

    <?php if(isset($_GET['error'])) { ?>
    <p class="error"> <?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if(isset($_POST['success'])) { ?>
    <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <label>아이디</label> 
    <input type = "text" name = "MID"></br>

    <label>비밀번호</label> 
    <input type = "password" name = "M_PW"></br>
    
    <label>비밀번호 확인</label> 
    <input type = "password" name = "M_PW2"></br>

    <label>이름</label> 
    <input type = "text" name = "M_NAME"></br> 

    <label>성 별</label>
    <input type = "text" placeholder = "ex.. 남성 or 여성" name = "M_GENDER"></br>

    <label>닉네임</label> 
    <input type = "text" name = "M_NICKNAME"></br>

    <label>신장 </label> 
    <input type = "text" placeholder = "cm"name = "M_HEIGHT"></br>

    <label>몸무게</label>
    <input type = "text" placeholder = "kg"name = "M_WEIGHT"></br>

    <label>주 소</label> 
    <input type = "text" placeholder = "ex.. 광주광역시 북구" name = "M_ADDRESS"></br>

    <input type = "submit" value = "입력">
    <input type = "button" value = "취소" onClick="history.back(1)"> 
     
    </form>
</body>
</html>