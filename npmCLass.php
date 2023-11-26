<?php
    require_once 'connection.php';
    require_once 'schoolDbNewCon.php';
    $regNo= '123123';
    $classDbName= "class_7db";
    if($count= $_POST['datavalue'])

$quiz_upload= "SELECT quizUploaded, quiz_attendQuestion FROM  $classDbName WHERE registrationNo= '$regNo' AND $classDbName.quizUploaded= 'none'";
$qu_upld= mysqli_query($conNew, $quiz_upload);
$rowNew01= mysqli_fetch_assoc($qu_upld);
 $count = $rowNew01['quiz_attendQuestion']+1;
 echo $rowNew01['quiz_attendQuestion'];
if($rowNew01){
    $qu= "SELECT * FROM quizpaper WHERE Sno= '$count'";
    // echo $count;
    $rest= mysqli_query($con, $qu);
    if(!$rest){
        echo "<script>alert('You have already done your NOOOO Exam!')
                window.location.replace('warnPage.php');</script>";
    }
    $ro= mysqli_fetch_assoc($rest);
    if($ro){
        $questions= htmlentities($ro['questions']);
        $option1= htmlentities($ro['option1']);
        $option2= htmlentities($ro['option2']);
        $option3= htmlentities($ro['option3']);
        $option4= htmlentities($ro['option4']);
    ?>
    <h2 class="question"><?php echo $questions ?></h2>

    <ul class="ulList">
        <li>
            <input type="radio" id="ans1" class="radio1" name="answer" value="option1">
            <label class="opt1" for="ans1"><?php echo $option1 ?></label>
        </li>
        <li>
            <input type="radio" id="ans2" class="radio1" name="answer" value="option2">
            <label class="opt2" for="ans2"><?php echo $option2; ?></label>
        </li>

        <li>
            <input type="radio" id="ans3" class="radio1" name="answer" value="option3">
            <label class="opt3" for="ans3"><?php echo $option3; ?></label>
        </li>
        <li>
            <input type="radio" id="ans4" class="radio1" name="answer" value="option4">
            <label class="opt4" for="ans4"><?php echo $option4; ?></label>
        </li>
    </ul>
            <div class="containerBtn">
                <button class="submitBtn" id="submitBtnQuestion" name="submitBtn" onclick="funcCount()"> Submit </button>
            </div>
    <?php
        // $queSnoNew= "UPDATE $classDbName SET quizUploaded= 'Uploaded' WHERE  $classDbName.registrationNo= '$regNo'";
        // $reNo= mysqli_query($conNew, $queSnoNew);
        $qu= "UPDATE $classDbName SET quiz_attendQuestion = quiz_attendQuestion + 1 WHERE  $classDbName.registrationNo= '$regNo'";
        $restNew= mysqli_query($conNew, $qu);
    }
    else{
        // echo "<h3>You have Completed your Exam!</h3>";
        echo "<script> 
                // alert('All Questions have been Completed!');
                window.close('quiz1.php');
                window.location.replace('warnPage.php');
            </script>";
        // header('Location: warnPage.php');
    }
}
else{
    echo "<script>alert('You have already done your Exam!')
    window.location.replace('warnPage.php');</script>";
}
?>