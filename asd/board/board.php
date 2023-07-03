<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $sql = "SELECT count(boardID) FROM board";
    $result = $connect -> query($sql);

    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 만들기</title>

    <?php include "../include/head.php" ?>
    <!-- //head -->
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
        <div class="intro__inner bmStyle">
            <picture class="intro__images">
                <source srcset="../assets/img/intro01.png, ../assets/img/intro01@2x.png 2x, ../assets/img/intro01@3x.png 3x" />
                <img src="../assets/img/intro01.png" alt="소개이미지">
            </picture> 

            <p class="intro__text">
            과거의 실수보다는 미래의 가능성에 집중하여 끊임없이 성장하고 발전하는 모습을 보여드리겠습니다. 
            마지막으로 사용자의 니즈를 고려한 창의적이고 혁신적인 아이디어를 실현시켜, 가치 있는 기술을 제공하겠습니다.
            </p>
        </div>
        <main id="main" class="container">
        <div class="intro__inner center bmStyle">
            <picture class="intro__images small">
                <source srcset="assets/img/join01.png, assets/img/join01@2x.png 2x, assets/img/join01@3x.png 3x" />
                <img src="assets/img/join01.png" alt="회원가입 이미지">
            </picture>
            <h2>회원 게시판</h2>
            <p class="intro__text">
                웹디자이너, 웹퍼블리셔, 프론트엔드 개발자를 위한 게시판입니다.<br>
                관련된 문의사항은 여기서 확인하세요!
            </p>
        </div>
        <!-- //join__inner-->

        <div class="board__inner container">
            <div class="board__search">
                <div class="left">
                    * 총 <em><?=$boardTotalCount?></em>건의 게시물이 등록되어 있습니다.
                </div>
                <div class="right">
                    <form action="boardSearch.php" name="boardSearch" method="get">
                        <fieldset>
                            <legend class="blind">게시판 검색 영역</legend>
                            <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력하세요!" required>
                            <select name="searchOption" id="searchOption">
                                <option value="title">제목</option>
                                <option value="content">내용</option>
                                <option value="name">등록자</option>
                            </select>
                            <button type="submit" class="ac white">검색</button>
                            <a href="boardWrite.php" class="btnStyle3 white">글쓰기</a>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="board__table">
                <table>
                    <colgroup>
                        <col style="width: 5%">
                        <col>
                        <col style="width: 10%">
                        <col style="width: 15%">
                        <col style="width: 7%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>등록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>1</td>
                            <td><a href="baordView.html">게시판 제목</a></td>
                            <td>안교남</td>
                            <td>2022-02-02</td>
                            <td>100</td>
                        </tr> -->
<?php
    if(isset($_GET['page'])){
        // (int) 문자를 숫자형으로 변환함
        // 혹시 문자로 받아 올수 있으니간 강제 형변환 함.
        $page = (int) $_GET['page'];
    }
    else {
        $page = 1;
    }
    $page = $_GET['page'];

    $viewNum = 10;
    // $page가 1일 때 0
    // $page가 2일 때 20
    $viewLimit = ($viewNum * $page) - $viewNum;

    // echo $page;


    // 1,2,3,4,5는 반복문의 i값
    // 요약하면 LIMIT 20;
    // 1~20 DESC LIMIT 0, 20; -->   page1 (viewNum * 1) - viewNum
    // 21~40 DESC LIMIT 20, 20; --> page2 (viewNum * 2) - viewNum
    // 41~60 DESC LIMIT 40, 20; --> page3 (viewNum * 3) - viewNum
    // 61~80 DESC LIMIT 60, 20; --> page4 (viewNum * 4) - viewNum

    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(b.memberID = m.memberID) ORDER BY boardID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    
    if($result){
        // num_rows : 쿼리의 결과로 넘어온 행의 갯수를 알수 있음.
        $count = $result -> num_rows;
        
        if($count > 0){
            for($i=0; $i<$count; $i++){
                // 상수 기능
                // MYSQLI_NUM	인덱스를 숫자로 사용 (기입순서)
                // MYSQLI_ASSOC	인덱스를 문자로 사용 (필드명)
                // MYSQLI_BOTH	인텍스를 숫자와 문자로 사용
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                
                echo "<tr>";
                echo "<td>".$info['boardID']."</td>";
                // get방식
                echo "<td><a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youName']."</td>";
                // php data 검색
                echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
                
                echo $info['boardID'];
                
                // 정보 확인
                // echo "<pre>";
                // var_dump($info);
                // echo "</pre>";
            }
        }
        else {
            echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
        }

    }
?>
                    </tbody>
                </table>
            </div>
            <div class="board__pages">
                <ul>
<?php
    // 게시글 총 갯수
    // 몇 페이지

    // count : 갯수 확인
    // 이거는 위에서 출력해줘야 작동되어서 주석처리 한거임 1 / 2
    // $sql = "SELECT count(boardID) FROM board";
    // $result = $connect -> query($sql);

    // fetch_array() : PHP의 MySQLi (MySQL Improved) 확장을 사용하여 MySQL 쿼리에서
    //                             반환된 결과 집합에서 행을 가져와 연관 배열로 반환하는 함수입니다.

    // MYSQLI_ASSOC :  이 매개변수는 fetch_array() 함수가 연관 배열로 결과를
    //                 반환하도록 지정합니다. 결과 배열의 키는 컬럼 이름이 되며,
    //                 값은 해당 컬럼의 값을 가집니다.
    // 이거는 위에서 출력해줘야 작동되어서 주석처리 한거임 2 / 2
    // $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    // $boardTotalCount = $boardTotalCount['count(boardID)'];


    // echo "<script>document.querySelector('.left em');</script>"
    // 총 페이지 갯수 
    // ceil :
    // boardTotalCount : 전체 갯수
    // $viewNum: 10
    $boardTotalCount = ceil($boardTotalCount / $viewNum);

    

    // 혼돈
    // 1 2 3 4 5 6 7 8 9 10 11 12 13까지
    $pageView = 5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    // 처음 페이지 초기화 + 마지막 페이지 초기화
    if($startPage < 1) $startPage = 1;
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    // 처음으로 + 이전
    if($page != 1){
        $none2 = "";
        
        echo "<li class='{$none2}'><a href='board.php?page=1'>처음으로</a></li>";
        $prevPage = $page - 1;
        echo "<li class='{$none2}'><a href='board.php?page={$prevPage}'>이전</a></li>";
    }

    // 페이지
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        $none2 = "";

        if($i == $page) $active = "active";

        echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
    }
    
    // 마지막으로 + 다음
    if($page != $endPage){
        $none = "";
        $nextPage = $page + 1;

        if($page > $boardTotalCount) {
            $none = "accc";
        }
        
        echo "<li class='{$none}'><a href='board.php?page={$nextPage}'>다음</a></li>";
        echo "<li class='{$none}'><a href='board.php?page={$boardTotalCount}'>마지막으로</a></li>";
    }
?>
                <!-- 
                    <li><a href="#">처음으로</a></li>
                    <li><a href="#">이전</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">다음</a></li>
                    <li><a href="#">마지막으로</a></li> 
                -->
                </ul>
            </div>
        </div>
          <!-- //board__list -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>

</body>
</html>