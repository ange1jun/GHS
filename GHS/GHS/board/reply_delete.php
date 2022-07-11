<?php
	session_start();
    include "../lib/dbconn.php";
    include "../lib/global.php";
    
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";


    $num   = $_GET["num"];
    $page   = $_GET["page"];
	$id   = $_GET["id"];

	if ( $userid != $id )
    {
        echo("
                    <script>
                    alert('본인이 작성한 댓글만 삭제 가능합니다.');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

    $sql = "SELECT * 
            FROM REPLY 
            WHERE RNO = '$num'";
    $stid = oci_parse($conn, $sql);
	oci_execute($stid);

	$row = oci_fetch_array($stid);
	$rno = $row[0];

	$sql = "DELETE FROM REPLY WHERE RNO = '$num'";
	$sql2 = oci_parse($conn, $sql);
	oci_execute($sql2);
    oci_commit($sql2);

    echo "
	     <script>
             alert('댓글이 삭제되었습니다!');
	         location.href = 'board_view.php?Lnum=$num&page=$page';
	     </script>
	   ";
?>

