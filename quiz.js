
// let questions = document.querySelector('.question');
// let option1 = document.querySelector('.opt1');
// let option2 = document.querySelector('.opt2');
// let option3 = document.querySelector('.opt3');
// let option4 = document.querySelector('.opt4');
// let Submit = document.querySelector('.submitBtn');
// let Start = document.querySelector('.startBtn');
// // let next = document.querySelector('.nextButton');

// let result = document.querySelector('.resultPara');

// let full = document.documentElement;

// let answers = document.querySelectorAll('.radio1');
// let score = 0;
// let count = 0;
// questIndex();
// function questIndex() {

//     let quesList = quizQuest[count];

//     questions.innerHTML = quesList.question;
//     option1.innerHTML = quesList.a;
//     option2.innerHTML = quesList.b;
//     option3.innerHTML = quesList.c;
//     option4.innerHTML = quesList.d;
//     if (count == 0) {
//         Submit.style.display = "none";
//         Start.addEventListener('click', () => {
//             full.requestFullscreen(keyCode(event));

//             //------------------------------------------------->>>>>>>>>>>>>>>>>> 
//         })
//     }
//     else {
//         // Submit.innerHTML = "Submit";
//         Submit.style.display = "block";
//         Start.style.display = "none";
//         document.querySelector('.warning').style.display = "none"
//         document.querySelector('.warning2').style.display = "none"
//         document.querySelector('.bluePara').style.display = "none"
//     }
// }
// // -----------------------taking input on submit button----------------------
// function nextQues() {
//     const checkingFunc = checkFunction();
//     let removeCheckbox = removingCheckbox();
//     if (checkingFunc === quizQuest[count].ans) {
//         score += 10;
//     }
//     count++;
//     console.log(score);
//     if (count < quizQuest.length) {
//         questIndex();
//     }
//     else {
//         // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<--------------------------------------------------------------             
//         document.querySelector(".resultBox").style.display = "block";
//         let radialGradient = document.querySelector(".radialGradient");
//         let percent = document.querySelector(".percent");
//         //<<<<<<<<<<<----------------------------------Percent font------------------------------------------
//         let scoring = score;
//         let cnt = 0;
//         let Interval = setInterval(anim, 40);

//         function anim() {
//             setTimeout(closeQuiz, 7000);
//             document.querySelector('.warning').style.display = "flex";
//             document.querySelector('.warning').innerHTML = "Wait for a moment to close the quiz";
//             cnt++;
//             if (cnt <= scoring) {
//                 radialGradient.style.backgroundImage = `conic-gradient(orange, yellow, green ${cnt * 3.6}deg, transparent ${cnt * 3.6}deg`;
//                 radialGradient.style.border = `2px solid black`;
//                 radialGradient.style.boxShadow = `0 0 10px white`;

//                 percent.innerHTML = cnt;
//             }
//             if (cnt == scoring) {
//                 clearInterval(Interval);
//             }
//         }
//     }
// }
// // <<<<<<<------------Close window after end the quiz---------------- 
// function closeQuiz() {
//     window.close("quiz1.html");
// }

// function keyCode(event) {
//     var x = event.keyCode;
//     if (x == 27) {
//         window.close("quiz1.html");
//     }
// }
// //--------------------------------------------------------->>>>>>>>>>>>>>>>>>>>> 

// function checkFunction() {
//     let ansr;
//     answers.forEach((element) => {
//         if (element.checked) {
//             ansr = element.id;
//         }
//     });
//     return ansr;
// }
// 
// window.onload =
// if((window.fullScreen) ||
//    (window.innerWidth == screen.width && window.innerHeight == screen.height)) {

// } else {
//     console.log("fuck");
// }
// $(document).ready(function(){
//     (function(){
//     $.ajax({
//         success: (function(){
//             var docElem= document.documentElement;
//             window.onload= docElem.requestFullscreen();
//         })()
//     })
//     })();
// });
// function localStorageValue(){
//     if(localStorage.checkWindowLoad){
//         localStorage.checkWindowLoad = Number(localStorage.checkWindowLoad)+1;
//     }
//     else{
//         localStorage.checkWindowLoad= 10;
//     }
// }
function closeExam(){
    (function () {
        $.ajax({
            method: 'post',
            success: (function () {
                alert("Your time has been completed! ");
                window.location.replace('warnPage.php');
            })()
        });
    })()
}

$(document).keyup(function(e) {
    e.ctrlKey=false;
    if (e.keyCode === 13 || e.keyCode === 122){
        closeExam();
    }
    if (e.keyCode == 27){
        closeExam();
    }
});
function requestFullScr() {
    var docElem = document.documentElement;
    docElem.requestFullscreen();

    document.querySelector('.warning').style.display = "none"
    document.querySelector('.warning2').style.display = "none"
    document.querySelector('.bluePara').style.display = "none"
    document.querySelector('.containerBtn').style.marginTop = "50px"
    document.querySelector('#showData').style.marginBottom = "30px"
    if ((window.fullScreen) ||
        (window.innerWidth == screen.width && window.innerHeight == screen.height)) {
        funcCount();
    }
    // fun();
    // timeOfClockRequested();
    // timeOfClockCallFunc();
    // if(window.location.reload()){
    //     alert("You reloaded the page!");
    //     window.location.replace('warnPage.php');
    // }

}

var inpCheckBox;
function applyCheckbox() {
    let answerVal = "";
    inpCheckBox = document.querySelectorAll('.radio1');

    inpCheckBox.forEach(element => {
        if (element.checked) {
            console.log(element.value);
            answerVal = element.value;
        }
    });
    return answerVal;
}

//             //<<<<<<<<<<<--------------Time counting------------------------
let Timenumber = document.querySelector('.Timenumber');
timeCount = 25;

let timeInterval;
let timerequested;
fun();
function fun(){
    timeInterval = setInterval(timeOfClock, 1001);
}
function timeOfClock() {
    if (timeCount <= 0) {
        clearInterval(timeInterval);
        closeExam();
    }
    else {
        Timenumber.innerHTML = timeCount;
        timeCount--;
    }
}
var valueses = 1;
function funcCount() {
    let answerVal = "";
    answerVal = applyCheckbox();
    $.ajax({
        url: 'update.php',
        method: 'post',
        data: { datavalue: valueses, devVal: answerVal },
        success: function (pop) {
            console.log(pop);
        }
    })

    $.ajax({
        url: 'npmClass.php',
        method: 'post',
        data: { datavalue: valueses },
        type: 'html',
        success: function (pop) {
            $('#showData').html(pop);
        }
    });
    valueses++;
}