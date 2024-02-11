<meta charset="UTF-8">  
<?php
    session_start();
    include "../lib/dbconn.php";
    include "../lib/global.php";

   //$sql = "select * from member";
   $sql = "SELECT count(*) FROM member WHERE MID='$MID' and M_PW='$M_PW'";

   $stid = oci_parse($conn, $sql);
 
   oci_execute($stid);
 
   while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
     $record = $row[0];
   }
 
   if($record==1) {
     $sql = "SELECT * FROM member WHERE MID='$MID' and M_PW='$M_PW'";
 
     $stid = oci_parse($conn, $sql);
 
     oci_execute($stid);
 
     while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
       $_SESSION['MID'] = $row[0];
       $_SESSION['M_NAME'] = $row[2];
       $_SESSION['M_NICKNAME'] = $row[4];
     }
 
     echo "
       <script>
       alert('$M_NAME ($M_NICKNAME) 님 환영합니다.')
       location.href = '../main.php'
       </script>
     ";
 
   } else {
     echo "
       <script>
       alert('로그인이 실패되었습니다.')
       history.go(-1)
       </script>
     ";
   }
   oci_close($conn);
 ?>
