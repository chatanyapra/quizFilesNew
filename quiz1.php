<?php 
$var1= 1;
require_once('connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quiz2.css">
    <title>Quiz Exam</title>
</head>

<body onkeydown="keyCode(event)">
    <div class="tim">
        <div class="block">
            <i class="icon"></i>
            <p6 class="Timenumber">0</p6>
        </div>
    </div>
    <!-- <form action="quiz1.php" method="post"> -->
    <div class="quizBox">
        <div class="innerBox">
            <?php
            // $count= 1;
                
            //     $q= "SELECT * FROM quizpaper WHERE Sno= '$count'";
            //     // echo $count;
            //     $res= mysqli_query($con, $q);
            //     $row= mysqli_fetch_assoc($res)
            ?>
            <div id="showData">
                <h2 class="question">Syntax of Quiz</h2>

                <ul class="ulList">
                    <li>
                        <input type="radio" id="ans1" class="radio1" name="answer" value="option1">
                        <label class="opt1" for="ans1">Option 1</label>
                    </li>
                    <li>
                        <input type="radio" id="ans2" class="radio1" name="answer" value="option2">
                        <label class="opt2" for="ans2">Option 2</label>
                    </li> 

                    <li>
                        <input type="radio" id="ans3" class="radio1" name="answer" value="option3">
                        <label class="opt3" for="ans3">Option 3</label>
                    </li>
                    <li>
                        <input type="radio" id="ans4" class="radio1" name="answer" value="option4">
                        <label class="opt4" for="ans4">Option 4</label>
                    </li>
                </ul>
                <!-- <button class="startBtn" onclick="nextQues()"> Start </button> -->
                <div class="containerBtn">
                    <button class="submitBtn" name="submitBtn" onclick="requestFullScr()"> Start </button>
                </div>
            </div>
            <p class="warning"><b>Warning!- All questions are compulsary</b></p>
            <p class="warning2"><b>Don't exit the full screen till the end of the quiz</b></p>
            <p class="bluePara">Click on start button to play the Quiz</p>
        </div>
    </div>
    <!-- </form> -->
    <!-- <div class="nextButton" onclick="nextBtn()">Back</div> -->
    <!-- --------------------------------JavaScript-------------------------- -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="quiz.js"></script>
</body>

</html>