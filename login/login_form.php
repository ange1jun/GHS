<!doctype html>
<html lang="ko">
<title> Gwangju Health Information </title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">  
    <title>로그인</title> 
    <style> 
    body 
    {
	    background-image: url("../img/bg.jpg");
	    background-size: cover;
	    opacity: 0.7;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    height: 100vh;
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
	    padding: 10px;
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
    <link rel = "stylesheet" type ="text/css" href="./css/register.css">
</head>
    <body>
        <form method="post" action="../login/login.php" class="loginForm">
        <h2>로그인</h2>
        
        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
           
        <label>아이디</label> 
        <input type = "text" name = "MID"></br>

        <label>비밀번호</label> 
        <input type = "password" name = "M_PW"></br>
            
        <button type = "submit" name = "save">로그인</button>    
        <a href ="../login/register_form.php" class = "save">회원가입</a>
        </form>
    </body>
</html>
