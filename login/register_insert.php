<?php 
    header("Content-Type:text/html; charset=utf-8"); 
    
    include "../lib/dbconn.php";
    include "../lib/global.php";

    $sql = "INSERT INTO MEMBER(MID, M_PW, M_NAME, M_GENDER, M_NICKNAME, M_HEIGHT, M_WEIGHT, M_ADDRESS) 
            VALUES(:MID_b, :M_PW_b, :M_NAME_b, :M_GENDER_b, :M_NICKNAME_b, :M_HEIGHT_b, :M_WEIGHT_b, :M_ADDRESS_b)"; 

    function check_input($data) {  
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;  
    }     

    $stid = oci_parse($conn,$sql);

    $MID = check_input($_POST['MID']);
    $M_PW = check_input($_POST['M_PW']);
    $M_NAME = check_input($_POST['M_NAME']);
    $M_GENDER = check_input($_POST['M_GENDER']);
    $M_NICKNAME = check_input($_POST['M_NICKNAME']);
    $M_HEIGHT = check_input($_POST['M_HEIGHT']);
    $M_WEIGHT = check_input($_POST['M_WEIGHT']);
    $M_ADDRESS = check_input($_POST['M_ADDRESS']);

    oci_bind_by_name($stid, ":MID_b", $MID);
    oci_bind_by_name($stid, ":M_PW_b", $M_PW);
    oci_bind_by_name($stid, ":M_NAME_b", $M_NAME);
    oci_bind_by_name($stid, ":M_GENDER_b", $M_GENDER);
    oci_bind_by_name($stid, ":M_NICKNAME_b", $M_NICKNAME);
    oci_bind_by_name($stid, ":M_HEIGHT_b", $M_HEIGHT);
    oci_bind_by_name($stid, ":M_WEIGHT_b", $M_WEIGHT);
    oci_bind_by_name($stid, ":M_ADDRESS_b", $M_ADDRESS);

    $result = (oci_execute($stid)) ? 'Succes' : 'Fail';

    echo $result;

    oci_commit($conn);
    oci_free_statement($stid);
    oci_close($conn); 
  
    
    
    if ($result == 'Succes'){
        echo "
        <script>
            alert('회원가입에 성공했습니다. 로그인페이지로 이동합니다!');
            location.href = 'login_form.php'
        </script>
        ";
    }   else {
        echo "
        <script>
            alert ('회원가입에 실패했습니다. 다시 입력해주세요!');
            location.href = 'register_form.php'
        </script>
        ";
    }
 
?>
