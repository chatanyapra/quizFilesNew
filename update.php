<?php
    require_once 'connection.php';
    require_once 'schoolDbNewCon.php';

    $devVal= $_POST['devVal'];
    $count= $_POST['datavalue']-1;
    // echo $count;

    $regNo= '123123';
    $markCorr= 1;
    $markWrng= 0;
    $classDbName= "class_7db";

    $quiz_upload= "SELECT quizUploaded FROM  $classDbName WHERE registrationNo= '$regNo' AND quizUploaded= 'none'";
    $qu_upld= mysqli_query($conNew, $quiz_upload);
    $rowNew01= mysqli_fetch_assoc($qu_upld);
    if($rowNew01){
        $querySno= "SELECT MAX(Sno) AS maxSno FROM quizpaper";
        $resSno= mysqli_query($con, $querySno);
        $rowNew= mysqli_fetch_assoc($resSno);

        $maxSno= $rowNew['maxSno'];
        // echo $rowNew['maxSno'];
        
        if($count <= $maxSno){

            $que= "SELECT IF(answers = '$devVal', $markCorr, $markWrng) AS val FROM quizpaper WHERE Sno= '$count'";

            if($que){
                $rest= mysqli_query($con, $que);
                $row= mysqli_fetch_assoc($rest);
                if($row){
                    $sum= $row['val'];
                    // echo ' _l_ ';
                    // echo $sum;
                    if($sum == $markCorr){
        
                        $qu= "UPDATE $classDbName SET quiz_correct_ans = quiz_correct_ans + $sum WHERE  $classDbName.registrationNo= '$regNo'";
                        $restNew= mysqli_query($conNew, $qu);
                        // if($restNew){
                        //     echo "Connected";
                        // }
                    }
                }
            }
            // else{
            //     echo "no";
            // }
        }
        if($count == $maxSno){
            $queSno= "UPDATE $classDbName SET quizUploaded= 'Uploaded' WHERE  $classDbName.registrationNo= '$regNo'";
            $reNo= mysqli_query($conNew, $queSno);
            // if($reNo){
            //     echo "OK";
            // }
        }
    }
    else{
        echo " Error 404: try again later!";
    }

?>
