<meta charset="utf-8">
<?php
	session_start();
    include "../lib/dbconn.php";
    include "../lib/global.php";

    $content = $_POST["R_TXT"];
    
	date_default_timezone_set('Asia/Seoul');
	$regist_day = date( 'm-d H:i:s');

	$sql = "INSERT INTO REPLY (RNO, R_TXT, R_USER, R_DATE)
			VALUES((SELECT nvl(max(RNO), 0)+1 FROM REPLY), 
            '$content', '익명', '$regist_day')";
	$stid = oci_parse($conn, $sql);
    oci_execute($stid);

    oci_close($conn);



?>