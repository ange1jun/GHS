<?php 
    session_start();

    unset($_SESSION['MID']);
    unset($_SESSION['M_NAME']);
    unset($_SESSION['M_NICKNAME']);
    
    echo"
		<script>
			location.href = '../index.php'; 
            alert('이용해 주셔서 감사합니다.')
		</script>
        ";
?>