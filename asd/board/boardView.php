<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    // echo $_SESSION['memberID'];
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
        <div class="intro__inner bmStyle center">
            <picture class="intro__images small">
                <source srcset="../assets/img/intro01.png, ../assets/img/intro01@2x.png 2x, ../assets/img/intro01@3x.png 3x" />
                <img src="../assets/img/intro01.png" alt="소개이미지">
            </picture> 
            <h2>게시글 작성하기</h2>
            <p class="intro__text">
                웹디자이너, 웹퍼블리셔, 프론트엔드 개발자를 위한 게시판입니다.<br>
                관련된 문의사항은 여기서 확인하세요!
            </p>
        </div>
       
        <!-- //join__inner-->
        <div class="board__inner">
            <div class="board__view">
                <table>
                    <colgroup>
                        <col style="width: 20%">
                        <col style="width: 80%">
                    </colgroup>
                    <tbody>
                        <!-- <tr>
                            <th>제목</th>
                            <td>게시판 제목입니다.</td>
                        </tr>
                        <tr>
                            <th>등록자</th>
                            <td>안교남</td>
                        </tr>
                        <tr>
                            <th>등록일</th>
                            <td>2023-03-03</td>
                        </tr>
                        <tr>
                            <th>조회수</th>
                            <td>99</td>
                        </tr>
                        <tr>
                            <th>내용</th>
                            <td>
                                프론트엔드 개발은 웹 애플리케이션의 사용자 인터페이스(UI)와 사용자 경험(UX)을 개발하는 역할로, 웹 개발 분야에서 중요한 역할을 담당합니다. 프론트엔드 개발자로 취업하기 위해 다음과 같은 노하우를 가지고 있으면 도움이 될 수 있습니다.
                                웹 기술에 대한 이해: HTML, CSS, JavaScript는 프론트엔드 개발의 기본이 되는 웹 기술입니다. 이들을 잘 이해하고 활용할 수 있는 능력이 필요합니다. 특히, 웹 표준, 웹 접근성, 반응형 웹 디자인 등에 대한 이해가 필요합니다.
                                프론트엔드 프레임워크/라이브러리 경험: 프론트엔드 개발에는 다양한 프레임워크와 라이브러리가 있습니다. 예를 들어, React, Angular, Vue 등이 대표적인 프론트엔드 프레임워크입니다. 이들을 활용하여 웹 애플리케이션을 개발하는 경험이 있으면 취업에 도움이 될 수 있습니다.
                                디자인 도구 사용 능력: 프론트엔드 개발자는 사용자 인터페이스(UI)를 개발하는데 있어 디자인 도구를 사용하는 경우가 많습니다. Sketch, Figma, Adobe XD 등의 디자인 도구를 사용할 수 있는 능력이 있다면 유용합니다.
                                프로젝트 경험: 실제 프로젝트에서의 경험은 매우 중요합니다. 포트폴리오를 통해 자신이 개발한 프로젝트를 보여줄 수 있으면 좋습니다. 실무에서의 프로젝트 경험이 있으면 취업에 큰 도움이 됩니다.
                                문제 해결 능력: 프론트엔드 개발은 사용자 인터페이스를 개발하며 다양한 문제에 직면할 수 있습니다. 따라서 문제를 독립적으로 해결할 수 있는 능력이 필요합니다. 디버깅, 오류 해결, 웹 호환성 등의 문제를 해결할 수 있는 능력이 중요합니다.
                                새로운 기술 습득 능력: 웹 개발 분야는 빠르게 변화하고 있기 때문에 새로운 기술과 도구에 대한 학습 능력이 필요합니다. 새로운 프론트
                            </td>
                        </tr> -->
<?php
    // boardView.php 오류 안나오게 하기(ID값 부여)
    // 게시글 삭제하기 누르면 
    $boardID = $_GET['boardID'];

    // 보드 뷰 + 1
    // 좋아요도 똑같음 - 아이디당 1개씩 해줘야 함.
    $sql = "UPDATE board SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    $connect -> query($sql);

    $sql = "SELECT b.boardContents, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN members m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);


    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<tr><th>제목</th><td>".$info['boardTitle']."</td></tr>";
        echo "<tr><th>등록자</th><td>".$info['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td>".date('Y-m-d', $info['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td>".$info['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td>".$info['boardContents']."</td></tr>";
    }
    else {
        echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
    }
?>
                    </tbody>
                </table>
            </div>
            <div class="board__btn mb100">
                <!-- get방식으로 넘겨줌 -->
                <a href="boardModift.php?boardID=<?=$_GET['boardID'] ?>" class="btnStyle3">수정하기</a>
                <a href="boardRemove.php?boardID=<?=$_GET['boardID'] ?>" class="btnStyle3" onclick="return confirm('정말 삭제할거야?')">삭제하기</a>
                <a href="board.php" class="btnStyle3">목록보기</a>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>

    <script>
        function func() {
            if(confirm("삭제 할거야?")){

            }
            else{
                return false;
            }
        }
    </script>
</body>
</html>