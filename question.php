<?php
include("includes/connectToDb.php");
include("includes/functions.php");
include("includes/header.php");

$sql = "SELECT * FROM questions WHERE questions_id=" .$_GET['q'] ;
//echo $sql; // useful for debugging SQL statements - you can see what you are actually using to query the db
///echo "<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row - $row is an array that contains all the fields in the record
    while($row = $result->fetch_assoc()) {
        
        $questions_id = $row["questions_id"];
        $question_title = $row["question_title"];
        $question_descr = $row["question_descr"];
        $question_answer = $row["question_answer"];
        
    }
} else {
    echo "No data found!";
}

$isCorrect="";
//print_r($_REQUEST);
//echo $question_answer;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if($_REQUEST["answer"]==$question_answer){
        $isCorrect = "Y";
        
    }else{
        $isCorrect = "N";
    }
    $sql = "INSERT INTO scores ( scores_team, scores_questionid,scores_answer,scores_isCorrect) 
    VALUES (".$_SESSION["ID"].", ".$questions_id.",'".$_REQUEST["answer"]."','".$isCorrect."');" ;
    //echo $sql;
    //echo "<br>";
    $result = $conn->query($sql);
    //check if $result is true or false
    if($result){
        //success
        //echo("Score successfully");
    }else{
        echo("Could not  add score Something went wrong");
    }
}
 ?>   

<form method="POST" action="">
    <h2><?php echo $question_title?></h2>
    <p class="q_descr"><?php echo $question_descr?></p>
    
    <div class="row">
      
      <div class="col s6">
            <label for="">Enter the answer below:</label>
            <input type="text" name="answer"/>
      </div>
      <div class="col s6">
          <br>
           <button class="btn waves-effect waves-light" type="submit" name="action">Submit
           <i class="material-icons right">forward</i>
    </button>
      </div>
    </div>

    <input type ="hidden" value="<?php echo $questions_id?>" name="q"/>
    
    <?php if($isCorrect=="Y"){ ?>
        <div class="card-panel teal lighten-2 pulse">
            <span class="white-text">Correct! Well done! <i class="material-icons">done</i>
            &nbsp;&nbsp;<a class="white-text" href="index.php">Try the other questions</a>
            </span>
        </div>
   <?php }else if($isCorrect=="N"){ ?>
        <div class="card-panel red lighten-2 ">That's not correct! <i class="material-icons">clear</i></div>
   
   
   <?php }    ?>
    
</form>

<?php
include("includes/footer.php");
?>