// jQuery
$(function() {
    // 메뉴 : 하나씩 나오기
    $(".nav > ul > li").mouseover(function() {
        $(this).find(".submenu").stop().slideDown(200);
    });
    $(".nav > ul > li").mouseout(function() {
        $(this).find(".submenu").stop().slideUp(200);
    });


    // 슬라이드 : 페이드 효과
    let currentIndex = 0;
    const $slider = $(".slider");
    // 모든 이미지 숨기고 첫번쨰 이미지 나타남
    $slider.hide().first().show();
    
    setInterval(function(){
        let nextIndex = (currentIndex + 1) % $slider.length;
        $slider.eq(currentIndex).fadeOut(300);
        $slider.eq(nextIndex).fadeIn(1200);

        currentIndex = nextIndex;
    }, 3000);


    // 탭 메뉴
    const tobBtn = $(".info-menu > a");
    const tabCont = $(".info-cont > ul");

    tabCont.hide().eq(0).show();

    tobBtn.on("click", function(){
        // index() : 선택 요소의 순번을 알아오는 제이쿼리 메서드
        const index = $(this).index();
        // alert(index);

        // siblings() : 선택한 요소를 제외한 형제 요소를 모두 찾습니다.
        $(this).addClass("active").siblings().removeClass("active");
        tabCont.eq(index).show().siblings().hide();
    });
});