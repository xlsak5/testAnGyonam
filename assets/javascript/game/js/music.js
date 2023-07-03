const allMusic = [
    {
        name : "1. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view01",
        audio: "game_icon01"
    },{
        name : "2. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view02",
        audio: "game_icon02"
    },{
        name : "3. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view03",
        audio: "game_icon03"
    },{
        name : "4. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view04",
        audio: "game_icon04"
    },{
        name : "5. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view05",
        audio: "game_icon05"
    },{
        name : "6. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view06",
        audio: "game_icon06"
    },{
        name : "7. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view07",
        audio: "game_icon07"
    },{
        name : "8. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view08",
        audio: "game_icon08"
    },{
        name : "9. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view09",
        audio: "game_icon09"
    },{
        name : "10. 저리가라",
        artist : "Patrick Patrikios",
        img: "music_view10",
        audio: "game_icon10"
    }
];

const musicWrap = document.querySelector(".music__wrap");
const musicName = musicWrap.querySelector(".music__control .title h3");
const musicArtist = musicWrap.querySelector(".music__control .title p");
const musicView = musicWrap.querySelector(".music__view .image img");
const musicAudio = musicWrap.querySelector("#main-audio");
const musicPlay = musicWrap.querySelector("#control-play");
const musicPrevBtn = musicWrap.querySelector("#control-prev");
const musicNextBtn = musicWrap.querySelector("#control-next");
const musicPregressBar = musicWrap.querySelector(".progress .bar");
const musicPregress = musicWrap.querySelector(".progress");
const musicProgressCurrent = musicWrap.querySelector(".timer .current");
const musicProgressDuration = musicWrap.querySelector(".timer .duration");
const musicRepeat = musicWrap.querySelector("#control-repeat");
const musicListBtn = musicWrap.querySelector("#control-list");
const musicList = musicWrap.querySelector(".music__list");
const musicListUl = musicWrap.querySelector(".music__list ul");

const musicListClose = musicWrap.querySelector(".music__list h3 .close");

let musicIndex = 1;     //현재 음악 인덱스

// 음악 재생
const loadMusic = (num) => {
    musicName.innerText = allMusic[num-1].name;             //뮤직 이름
    musicArtist.innerText = allMusic[num-1].artist;         //뮤직 아티스트
    musicView.src = `img/${allMusic[num-1].img}.png`;       //뮤직 이미지
    musicView.alt = allMusic[num-1].name;                   //뮤직 이미지 alt
    musicAudio.src = `audio/${allMusic[num-1].audio}.mp3`;  //뮤직 파일
}

// audio 객체 모아봄
// 대상.loop = true;     //반복 재생여부(true, false)
// 대상.volume = 0.5;    //볼륨(0부투 1까지 / 소수점 단위로 조절할 수 있음.(0.6))
// 대상.play();          //재생 시작

// 대상.pause();          //재생 중지(true, false 반환 함)
// if(video.paused){
//     video.play();
// } else{
//     video.pause();
// }

// 대상.currentTime = 0;  //음악의 현재 위치(초 단위), 처음부터 재생을 원하면 0
// 대상.duration; 비디오의 전체 재생 길이를 반환한다.

// 재생  
const playMusic = () => {
    musicWrap.classList.add("paused");

    musicPlay.setAttribute("title", "정지");
    musicPlay.setAttribute("class", "stop");

    // play() : 재생 시작
    musicAudio.play();
}

// 정지 
const pauseMusci = () => {
    musicWrap.classList.remove("paused");
    musicPlay.setAttribute("title", "재생");
    musicPlay.setAttribute("class", "play");

    // pause() : 재생 중지
    musicAudio.pause();
}

// 이전 곡 듣기 
const prevMusic = () => {
    musicIndex == 1 ? musicIndex = allMusic.length : musicIndex--;
    loadMusic(musicIndex);
    playMusic();
    playListMusic();
}

// 다음 곡 듣기 
const nextMusic = () => {
    musicIndex == allMusic.length ? musicIndex = 1 : musicIndex++;
    loadMusic(musicIndex);
    playMusic();
    playListMusic();

    // if(musicIndex === allMusic.length) musicIndex = 0;
}


// 대상.addEventListener("timeupdate", () => {}) : 비디오의 재생시간이 업데이트 될때 일어날 이벤트를 작성한다.
// 대상.addEventListener("play", () => {}) : 비디오가 재생됐을때 일어날 이벤트를 작성한다.
// 대상.addEventListener("pause", () => {}) : 비디오가 일시정지 됐을때 일어날 이벤트를 작성한다.

// 뮤직 진행바
musicAudio.addEventListener("timeupdate", e => {
    // console.log(e);

    const currentTime = e.target.currentTime;   //현재 재생 시간
    const duration = e.target.duration;         //오디오의 총 길이
    let progrossWidth = (currentTime/duration) * 100; //전체 길이에서 현재 진행되는 시간을 백분위 단위로 나누면 현재 진행상태를 알수 있음

    musicPregressBar.style.width = `${progrossWidth}%`;

    // 전체 시간
    musicAudio.addEventListener("loadeddata", () => {
        let audioDuration = musicAudio.duration;
        let totalMin = Math.floor(audioDuration / 60);
        let totalSec = Math.floor(audioDuration % 60);

        if(totalMin < 10) totalMin = `0${totalMin}`;
        if(totalSec < 10) totalSec = `0${totalSec}`;

        musicProgressDuration.innerText = `${totalMin}:${totalSec}`;        
    });

    // 진행 시간
    let currentMin = Math.floor(currentTime / 60);
    let currentSec = Math.floor(currentTime % 60);

    if(currentMin < 10) currentMin = `0${currentMin}`;
    if(currentSec < 10) currentSec = `0${currentSec}`;

    musicProgressCurrent.innerText = `${currentMin}:${currentSec}`;
});

// 진행 버튼 클릭
musicPregress.addEventListener("click", (e) => {
    let progressWidth = musicPregress.clientWidth;  //진행바 전체 길이
    let clickOffsetX = e.offsetX;                   //진행바를 기준으로 측정되는 X값 좌펴
    let songDuration = musicAudio.duration;          //오디오 전체 길이
    //백분위로 나눈 숫자에 다시 전체 길이를 곱해 현재 재생값으로 바꿈
    musicAudio.currentTime = (clickOffsetX /progressWidth) * songDuration;
});

// 반복 버튼 클릭
musicRepeat.addEventListener("click", () => {
    let getArr = musicRepeat.getAttribute("class");
    
    switch(getArr){
        case "repeat" :
            musicRepeat.setAttribute("class", "repeat_one");
            musicRepeat.setAttribute("title", "한곡 반복");
            break;
        case "repeat_one" :
            musicRepeat.setAttribute("class", "shuffle");
            musicRepeat.setAttribute("title", "랜덤 반복");
            break;
        case "shuffle" :
            musicRepeat.setAttribute("class", "repeat");
            musicRepeat.setAttribute("title", "전체 반복");
            break;
    }
});

// 오디오가 끝나면
musicAudio.addEventListener("ended", () => {
    let getArr = musicRepeat.getAttribute("class");

    switch(getArr){
        case "repeat" :
            nextMusic();
            console.log("repeat");
            break;
        case "repeat_one" :
            playMusic();
            console.log("repeat_one");
            break;
        case "shuffle" :
            let randomIndex = Math.floor(Math.random() * allMusic.length+1);  //랜덤 인덱스 생성
            console.log("shuffle");
            
            do {
                randomIndex = Math.floor(Math.random() * allMusic.length +1);
            } while(musicIndex == randomIndex)

            musicIndex = randomIndex;   //현재 인덱스를 랜덤 인덱스로 변경
            loadMusic(musicIndex);
            playMusic();
            break;
    }
    playListMusic();
});

// 플레이 클릭
musicPlay.addEventListener("click", () => {
    // "" : 빈 문자열은 "거짓"임
    const isMusicPaused = musicWrap.classList.contains("paused");   //음악 재생 중
    isMusicPaused ? pauseMusci() : playMusic();
});

// 이전곡 클릭
musicPrevBtn.addEventListener("click", () => {
    prevMusic();
});

// 다음곡 클릭
musicNextBtn.addEventListener("click", () => {
    nextMusic();
});

// 뮤직 리스트 버튼
musicListBtn.addEventListener("click", () => {
    musicList.classList.toggle("show");
});

// 뮤직 리스트 닫기 버튼
musicListClose.addEventListener("click", () => {
    musicList.classList.remove("show");
});

// 뮤직 리스트 구현하기
for(let i=0; i<allMusic.length; i++){
    // data-index="" 각각의 li태그에 데이터값을 부여 함.
    let li = `
        <li data-index="${i+1}">
            <div class="list__box">
                <div class="list__img">
                    <img src="/assets/javascript/game/img/${allMusic[i].img}.png">
                </div>
                <div class="list__name">
                    <p>${allMusic[i].name}</p>
                    <span>${allMusic[i].artist}</span>
                    <audio class="${allMusic[i].audio}" src="audio/${allMusic[i].audio}.mp3"></audio>
                </div>
                <span class="audio-duration" id="${allMusic[i].audio}">3:04</span>
            </div>
        </li>
    `;

    const musicListLi = musicWrap.querySelectorAll(".music__list ul li");  
    // musicListLi.forEach((el, index, array) => {
    //     musicListLi[index].addEventListener("click", () => {
    //         musicListLi[index].classList.add("active");
    //         console.log(musicListLi[index]);
    //     });
    //     // musicListLi[i].classList.remove("active");
    // });

    // musicListUl.innerHTML += li;                     // 이것도 되고
    musicListUl.insertAdjacentHTML("beforeend", li);    // 최근에 많이 쓰이는 방식(참고 : https://webclub.tistory.com/535)

    // 리스트에 음악 시간 불러오기
    let liAudioDuration = musicListUl.querySelector(`#${allMusic[i].audio}`);   //리스트에서 시간을 표시할 선택자를 가져옴
    let liAudio = musicListUl.querySelector(`.${allMusic[i].audio}`);           //리스트에서 오디오 파일 선택
    liAudio.addEventListener("loadeddata", () => {
        let audioDuration = liAudio.duration;
        // console.log(audioDuration);
        let totalMin = Math.floor(audioDuration / 60);
        let totalSec = Math.floor(audioDuration % 60);

        if(totalSec < 10) totalSec = `0${totalSec}`;
        liAudioDuration.innerText = `${totalMin} : ${totalSec}`;
        liAudioDuration.setAttribute("data-duration", `${totalMin} : ${totalSec}`);
    });    
}

// 뮤직 리스트를 클릭하면 재생
function playListMusic(){
    const musicListAll = musicListUl.querySelectorAll("li");    //뮤직 리스트 목록
    
    for(let i=0; i<musicListAll.length; i++){
        let audioTag = musicListAll[i].querySelector(".audio-duration");

        musicListAll[i].setAttribute("onclick", "clicked(this)");

        if(musicListAll[i].classList.contains("playing")){
            musicListAll[i].classList.remove("playing");
            let dataAudioDuration = audioTag.getAttribute("data-duration");
            audioTag.innerText = dataAudioDuration;
        }

        if(musicListAll[i].getAttribute("data-index") == musicIndex){
            musicListAll[i].classList.add("playing");
            audioTag.innerText = "재생중";
        }
    }
}

// 뮤직 리스크를 클릭하면
function clicked(el){
    let getIndex = el.getAttribute("data-index");
    // alert(getIndex);
    musicIndex = getIndex;
    loadMusic(musicIndex);
    playMusic();
    playListMusic();
}


// 그런데 load 이벤트는 문서내의 모든 리소스(이미지, 스크립트)의 
// 다운로드가 끝난 후에 실행된다. 이것을 에플리케이션의 구동이 
// 너무 지연되는 부작용을 초래할 수 있다.
window.addEventListener("DOMContentLoaded", () => {
    loadMusic(musicIndex);
    playListMusic();
});

// DOMContentLoaded는 문서에서 스크립트 작업을 할 수 있을 때 
// 실행되기 때문에 이미지 다운로드를 기다릴 필요가 없다.
// window.addEventListener('DOMContentLoaded', function(){
//     console.log('DOMContentLoaded');
// })