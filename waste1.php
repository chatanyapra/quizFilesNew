<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="waste2.css">
    <title>Login Page</title>
</head>

<body>
    <div class="burger">
        <li class="l1"></li>
        <li class="l2"></li>
        <li class="l3"></li>
    </div>
    <div class="instruction">
        <div class="instrAlign">Fill all the correct detail asked in the form</div>
        <hr>
        <div class="instrAlign">On click the start button the timer will start for 10 minutes</div>
        <hr>
        <div class="instr2 instrAlign">Do not press ESC button to remove full screen</div>
        <hr>
        <div class="instr3 instrAlign">Read all the question carefully and tick the correct answer</div>
        <hr>
        <div class="instr4 instrAlign">Complete your exam in 10 minutes and the exam will auto close after given time
        </div>
    </div>

    <!------------------------making shine on border on image------------------->
    <div id="img11" ondblclick="imageClicked()">
        <button id="imgbut" onclick="closeButton()" style="display: none;">Close</button>
    </div>

    <div class="border">
        <p class="image">
        <form>
            <div class="form">
                <p class="ppp">
                    <input class="inputOfForm" type="password" placeholder="Enter your password ">
                <div class="forgot"><a class="a1href" href="_#">Forgot password?</a></p>
                </div>
                </p>
                <span class="writeIcon">
                    <input class="name1" type="text" placeholder="Enter your first name">
                    <img class="icon1" src="icons8-autograph-48.png">
                </span>
                <span class="writeIcon2">
                    <input class="name2" type="text" placeholder="Enter your last name">
                    <img class="icon2" src="icons8-autograph-48.png">
                </span>

            </div>
            <button id="passwordSubmit" type="submit" onclick="submitClicked()">Submit</button>
        </form>
        <!-- <a class="hrefSubmit" href="quiz1.html"></a> -->
    </div>
    <script>
        let inputOfForm = document.querySelector(".inputOfForm");
        let name1 = document.querySelector(".name1");
        let name2 = document.querySelector(".name2");
        // -------------------------password varification--------------------------------
        let nam1;
        const pass = "12345";
        function submitClicked() {

            if (inputOfForm.value == "" || name1.value == "" || name2.value == "") {
                alert("Fill the form! ", "marginTop= 510px");
            }
            else if (inputOfForm.value == "12345") {
                // ---------------------------another page of html-------------------------------
                if (confirm(`${name1.value + " " + name2.value} -- have you read the given instruction in right side ?`) == true) {
                    window.close("waste1.html");
                    window.open("quiz1.php");
                }
            }
            else {
                alert("Wrong password");
            }
        }


        //---------------------button to close image----------------------
        let imgbut = document.getElementById('imgbut');
        function closeButton() {
            document.getElementById('imgbut').style.display = "none";
            document.querySelector('#img11').style.width = "150px";
            document.querySelector('#img11').style.height = "150px";
            document.querySelector('#img11').style.marginLeft = "225px";
            document.querySelector('#img11').style.marginTop = "0px";
        }
        //------------------making image big on click----------------------
        let pxWeight;
        let pxHeight;
        let pxMarg;
        let pxMargTop;
        var size = document.getElementById('img11');
        function timeForCloseButton() {
            imgbut.style.display = "block"
        }
        function imageClicked() {
            pxHeight = 150;
            pxWeight = 150;
            pxMarg = 225;
            pxMargTop = 0;
            var imageSize = setInterval(Sizing, 1);
            setTimeout(timeForCloseButton, 0)
        }
        function Sizing() {

            pxHeight++;
            pxWeight++;
            pxMarg++;
            pxMargTop++;
            if (pxWeight >= 400 && pxHeight >= 300 && pxMarg >= 555 && pxMargTop >= 0) {
                clearInterval(imageSize);

            }
            else {
                size.style.marginLeft = pxMarg + "px";
                size.style.marginTop = pxMargTop + "px";
                size.style.height = pxHeight + "px";
                size.style.width = pxWeight + "px";
            }
        }
        // ---------------------------------------------------------------->>>>
        //<<<<<<<<----------------burger js----------------------------------
        let l1 = document.querySelector(".l1");
        let l2 = document.querySelector(".l2");
        let l3 = document.querySelector(".l3");
        let burger = document.querySelector(".burger");
        let instruction = document.querySelector(".instruction");
        burger.addEventListener('click', function burgerRotate() {
            if (l2.style.display == "block" && l3.style.transform == "rotateZ(0deg)") {
                l2.style.display = "none";
                l3.style.transform = "rotateZ(-45deg)";
                l1.style.transform = "rotateZ(45deg)";
                l1.style.marginTop = "26%";
                l3.style.marginTop = "26%";
                instruction.style.display = "none";
            }
            else {
                l2.style.display = "block";
                l3.classList.add("l3");
                l3.style.transform = "rotateZ(0deg)";
                l1.style.transform = "rotateZ(0deg)";
                l1.style.marginTop = "10%";
                l3.style.marginTop = "45%";
                instruction.style.display = "block";
            }
        }
        )
        // -------------------------------------------------------->>>>>>>>

    </script>
</body>

</html>