<?php 
// Start the session
session_start();
//print_r($_SESSION);
//echo(basename($_SERVER['PHP_SELF']));
if (basename($_SERVER['PHP_SELF'])!="login.php"){
    //don't check on the login page but all other pages
    checkLogin();
}


function checkLogin(){
    //if there is a cookie present then return true otherwise return false
    if($_SESSION["loggedIn"]){
        //print("You are logged in!");
        return true;
    }else{
        //print("You are not logged in! redirecting to login page....");
        header("Location:login.php");
        return false;
    }
}

function getScore($conn){
    if($_SESSION["loggedIn"]){
        //print("You are logged in!");
       // $sql = "SELECT DISTINCT COUNT( scores_isCorrect ) as score from scores WHERE scores_isCorrect = \"Y\" AND scores_team =".$_SESSION["ID"] ;
        $sql = "SELECT DISTINCT COUNT( DISTINCT question_answer ) AS score FROM scores JOIN questions ON questions.questions_id = scores.scores_questionid WHERE scores_isCorrect =  \"Y\" AND scores_team =".$_SESSION["ID"] ;
        //echo $sql;
        $result = $conn->query($sql);
        //print_r($result);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                //print out result
                echo $row["score"];
            }//end while
        }else{
            echo "0";
            }//end if
    }//end if logged in
}

?>