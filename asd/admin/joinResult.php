<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 회원가입 페이지</title>

    <?php include "../include/head.php" ?>
    <!-- //head -->
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="container">
        <div class="intro__inner center bmStyle">
            <picture class="intro__images">
                <source srcset="../assets/img/join01.png, ../assets/img/join01@2x.png 2x, ../assets/img/join01@3x.png 3x" />
                <img src="../assets/img/join01.png" alt="회원가입 이미지">
            </picture>
            <p class="intro__text">
                회원가입을 해주시면 다양한 정보를 자유롭게 볼 수 있습니다.
            </p>
        </div>
        <!-- //join__inner-->

        <div class="join__inner container">
            <div class="container">

                <h2>이용약관</h2>
                <div class="index">
                    <ul>
                        <li class="active">1</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </div>

                <div class="join__agree">
                    <div class="box">
                        <div class="scene background">
                            <div class="wing-left"></div>
                            <div class="wing-right"></div>
                            <div class="exhaust"></div>
                            <div class="capsule">
                              <div class="top">
                                <div class="shadow"></div>
                              </div>
                              <div class="base"></div>
                            </div>
                            <div class="window-big"></div>
                            <div class="window-small"></div>
                            <div class="fire-1"></div>
                            <div class="fire-2"></div>
                            <div class="fire-3"></div>
                            <div class="fire-4"></div>
                            <div class="spark-1"></div>
                            <div class="spark-2"></div>
                            <div class="spark-3"></div>
                            <div class="spark-4"></div>
                            <div class="star star--1"></div>
                            <div class="star star--2"></div>
                            <div class="star star--3"></div>
                            <div class="star star--4"></div>
                            <div class="star star--5"></div>
                            <div class="star star--6"></div>
                            <div class="star star--7"></div>
                            <div class="star star--8"></div>
                            <div class="star star--9"></div>
                            <div class="star star--10"></div>
                            <div class="star star--11"></div>
                            <div class="star star--12"></div>
                            <div class="star star--13"></div>
                            <div class="star star--14"></div>
                            <div class="star star--15"></div>
                            <div class="star star--16"></div>
                          </div>
                    </div>
                   <div class="congratulation__desc">
                    <p>
                        회원가입이 완료되었습니다.<br>
                        감사합니다.
                    </p>
                    <a href="#">관리자 로그인</a>
                   </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php"?>
</body>
</html>