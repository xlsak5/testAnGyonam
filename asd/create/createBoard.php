<?php
    // include "../connect/connect.php";

    // // NOT NULL : 빈칸 못들어감
    // // auto_increment : 자동 증가
    // $sql = "CREATE TABLE board(";
    // $sql .= "boardID int(10) unsigned NOT NULL auto_increment,";
    // $sql .= "memberID int(10) NOT NULL,";
    // $sql .= "boardTitle varchar(100) NOT NULL,";
    // $sql .= "boardContents longtext NOT NULL,";
    // $sql .= "boardView int(10) NOT NULL,";
    // $sql .= "regTime int(20) NOT NULL,";
    // $sql .= "PRIMARY KEY(boardID)";
    // $sql .= ") charset=utf8;";

    // $content -> query($sql);
?>
<?php
    include "../connect/connect.php";

    // NOT NULL : 해당 필드는 NULL 값을 저장할 수 없습니다.(무조건 데이터를 포함해야 함.)
    // auto_increment : 데이터를 추가할 때마다 1씩 자동으로 증가합니다.
    //                  (값 초기화 할떄 문제가 생김. 찾아봐야 함)
    // LONGTEXT : 429,496,729,5
    $sql = "CREATE TABLE board(";
    $sql .= "boardID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "memberID int(10) NOT NULL,";
    $sql .= "boardTitle varchar(100) NOT NULL,";
    $sql .= "boardContents longtext NOT NULL,";
    $sql .= "boardView int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(boardID)";
    $sql .= ") charset=utf8;";
    $connect -> query($sql);
?>