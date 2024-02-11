<?
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
    $nick = $_GET["B_NICKNAME"];

	if ( $userid != $id )
    {
        echo("
                    <script>
                    alert('작성자와 일치하지 않습니다!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

    $sql = "SELECT * 
            FROM BOARD 
            WHERE B_NUM = '$num'";
    $stid = oci_parse($conn, $sql);
	oci_execute($stid);
    $row = oci_fetch_array($stid);

    $sql = "DELETE FROM BOARD WHERE B_NUM = '$num'";
    $temp = oci_parse($conn, $sql);
	oci_execute($temp);

    echo "
	     <script>
             alert('게시글을 성공적으로 삭제했습니다!');
	         location.href = 'board_list.php?page=$page';
	     </script>
	   ";
?>

