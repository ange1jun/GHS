<?php
    include "../lib/dbconn.php";
    include "../lib/global.php";


    $num = $_GET["num"];
    $page = $_GET["page"];

    $userid = $_SESSION["MID"];
    
    $subject = $_POST["B_TITLE"];
    $content = $_POST["B_CONTENT"];
  

    if ( $userid != $id )
    {
        echo("
                    <script>
                    alert('작성자와 일치하지 않습니다!');
                    history.go(-1)
                    </script>
        ");
                exit;
    } else
          
    $sql = "UPDATE BOARD
            SET B_TITLE='$subject' , B_CONTENT='$content'";
    $sql.=  "WHERE B_NUM =$num";

    $stid = oci_parse($conn, $sql);

    oci_execute($stid);

    oci_close($conn);    


    echo "
	      <script>
              window.alert('게시글 수정이 완료 되었습니다.')
	          location.href = 'board_list.php?page=$page';
	      </script>
	  ";
?>

   
