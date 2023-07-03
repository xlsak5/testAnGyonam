<?php
    //!은 없다면[참-> 거짓 // 거짓->참]
    if(!isset($_SESSION['memberID'])){  
        Header("Location: ../login/login.php");
        echo "<script>alert('로그인을 하신 후 글을 수정해주세요.^~^');</script>";
    }
?>