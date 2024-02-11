<meta charset="utf-8">
<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<?php
    session_start();
    include "../lib/dbconn.php";
    include "../lib/global.php";

    $userid = $_SESSION["MID"];
    $subject = $_POST["B_TITLE"];
    $content = $_POST["B_CONTENT"];
    
    $subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);
	date_default_timezone_set('Asia/Seoul');
	$regist_day = date( 'm-d H:i:s');

    $sql = "INSERT INTO BOARD(B_NUM, B_NICKNAME, B_TITLE, B_CONTENT, B_DATE, B_HIT)
            VALUES ((SELECT NVL(MAX(B_NUM), 0)+1 FROM BOARD), 
            '$userid', '$subject', '$content', '$regist_day', '0')";

    $result = oci_parse($conn,$sql);
    oci_execute($result);

    oci_close($conn);

    echo "
        <script>
        alert('게시글을 성공적으로 작성했습니다.')
        location.href = '../board/board_list.php';
        </script>
        ";
?>
