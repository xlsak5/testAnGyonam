<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";

    // 전체 세션 요소 불러오기
    // echo var_dump( $_SESSION );

    // echo $_SESSION['memberID'];
    
    // if($_SESSION['memberID']){}
    // else {
    //     // alert("로그인을 하신 후 글을 수정해주세요.^~^");
    //     echo "<script>alert('로그인을 하신 후 글을 수정해주세요.^~^');</script>";
    //     echo "<script>location.href='../login/login.php'</script>";
    // }
?>
<script>
    // if(['memberID'] == 1){
    //     console.log("로그인 했네.");
    //     location.href = "../login/login.php"//게시판으로 다시 돌아가기
    // }
    // else {
    //     console.log("로그인 했거든");
    // }
</script>

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
            <h2>게시글 수정 하기</h2>
            <p class="intro__text">
                웹디자이너, 웹퍼블리셔, 프론트엔드 개발자를 위한 게시판입니다.<br>
                관련된 문의사항은 여기서 확인하세요!
            </p>
        </div>

        <div class="board__inner">
            <div class="board__write">
                <form action="boardModifySave.php" name="boardWriteSave" method="post">
                    <fieldset>
                        <legend class="blind">게시글 작성하기</legend>
<?php
    // $boardID = $_GET['boardID'];

    // $sql = "SELECT boardID, boardTitle, boardContents, FROM board WHERE boardID = {$boardID}";
    // $result = $connect -> query($sql);

    // if($result){
    //     $info = $result -> fetch_array(MYSQLI_ASSOC);

    //     echo "<div style='display:none'><label for='boardTitle'>번호</label><input type='text' id='boardID' name='boardTitle' class='inputStyle' value='".$info['boardID']."'></div>";
    //     echo "<div><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='inputStyle' value='".$info['boardTitle']."'></div>";
    //     // echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='20' class='inputStyle'>".$info['boardContents']."</textarea></div>";
    //     echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='20' class='inputStyle'>".$info['boardContents']."</textarea></div>";
    // }

    $boardID = $_GET['boardID'];
    $sql = "SELECT boardID, boardTitle, boardContents FROM board WHERE boardID = {$boardID}";
    $result = $connect -> query($sql);
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<div style='display:none'><label for='boardID'>번호</label><input type='text' id='boardID' name='boardID' class='inputStyle' value='".$info['boardID']."'></div>";
        echo "<div><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='inputStyle' value='".$info['boardTitle']."'></div>";
        echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='20' class='inputStyle'>".$info['boardContents']."</textarea></div>";
        echo "<div class='mt50'><label for='boardPass'>비밀번호</label><input type='password' id='boardPass' name='boardPass' class='inputStyle' autocomplete='off' required placeholder='글을 수정하려면 로그인 비밀번호를 입력하셔야 합니다.'></div>";
           
    }

?>
                        <!-- <div>
                            <label for="boardTitle">제목</label>
                            <input type="text" class="inputStyle" id="boardTitle" name="boardTitle" >
                        </div>
                        <div>
                            <label for="boardContents">내용</label>
                            <textarea name="boardContents" class="inputStyle" id="boardContents" rows="20"></textarea>
                        </div> -->
                        <button type="submit" class="btnStyle3">저장하기</button>
                    </fieldset>
                </form>
            </div>
        </div>

    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
</body>
</html>