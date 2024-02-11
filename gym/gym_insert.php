<meta charset ="UTF-8">
<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<?php
    session_start();
    include "../lib/dbconn.php";
    include "../lib/global.php";

    $userid = $_SESSION["MID"];
    $subject = $_POST["G_TITLE"];
    $content = $_POST["G_TXT"];
    $addr = $_POST["G_ADDRESS"];

    $subject = htmlspecialchars($subject, ENT_QUOTES);
    $content = htmlspecialchars($content, ENT_QUOTES);
    $addr = htmlspecialchars($addr, ENT_QUOTES);
   
   
    $sql = "INSERT INTO GYM(G_NUM, G_TITLE, G_ADDRESS, MID, G_TXT, HIT)
            VALUES((SELECT NVL(MAX(G_NUM), 0)+1 FROM GYM),
            '$subject', '$addr', '$userid', '$content' , '0')";
    
    $result = oci_parse($conn, $sql);

    oci_execute($result);

    oci_close($conn);

    echo "
    <script>
    alert('리뷰를 성공적으로 작성했습니다.')
    location.href = '../gym/gym_list.php';
    </script>
    ";

    ?>
    