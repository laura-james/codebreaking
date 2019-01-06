<?php
include("includes/connectToDb.php");
include("includes/functions.php");
include("includes/header.php");




$sql = "SELECT * FROM questions " ;
$sql = "select *, (SELECT DISTINCT scores_isCorrect FROM scores WHERE scores_team=".$_SESSION["ID"]." and scores_questionid=questions.questions_id and scores_isCorrect='Y') as isCorrect  FROM questions";
//echo $sql; // useful for debugging SQL statements - you can see what you are actually using to query the db
//echo "<br>";
$result = $conn->query($sql);
echo "<table>";
if ($result->num_rows > 0) {
// output data of each row - $row is an array that contains all the fields in the record
    while($row = $result->fetch_assoc()) {
        //echo join(' --- ', $row);
        echo "<tr>";
        echo "<td>" . $row["questions_id"]. "</td><td>" . $row["question_title"]."</td><td>";
        echo "<a class=\"waves-effect waves-light btn\" href='question.php?q=".$row["questions_id"]."'><i class=\"material-icons right\">create</i>Attempt Question</a></td><td>";
        if ($row["isCorrect"]=="Y"){
            echo "<i class=\"material-icons blue-text text-darken-2\">grade</i>";
        }
        echo "</td>";
        echo "</tr>";
        
    }
} else {
    echo "<tr><td>No data found!</td></tr>";
}
echo "</table>";

?>

<?php
include("includes/footer.php");
?>