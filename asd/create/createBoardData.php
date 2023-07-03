<?php
    include "../connect/connect.php";

    for($i=1; $i<300; $i++){
        // time() : 1970년대부터 지금까지 현재 시간을 알려줌
        $regTime = time();

        $sql = "INSERT INTO board(memberID, boardTitle, boardContents, boardView, regTime) VALUES(1, '게시판 타이틀${i}입니다.', '게시판 내용물${i}입니다.게시판 내용물${i}입니다.게시판 내용물${i}입니다.게시판 내용물${i}입니다.게시판 내용물${i}입니다.게시판 내용물${i}입니다.', '1','$regTime')";
        
        $connect -> query($sql);
    }
?>