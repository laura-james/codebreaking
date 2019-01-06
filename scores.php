<?php
include("includes/connectToDb.php");
include("includes/functions.php");
include("includes/header.php");



$sql = "SELECT DISTINCT username, COUNT( scores_isCorrect ) AS attempts, SUM( 
CASE WHEN scores_isCorrect =  \"Y\"
THEN question_points 
ELSE 0 
END ) AS corrects,
SUM( question_points ) as correctsX
FROM  `scores` 
JOIN questions ON questions.questions_id = scores.scores_questionid
JOIN users2 ON users2.user_id = scores.scores_team
GROUP BY username
ORDER BY corrects DESC";
$sql = "SELECT DISTINCT username, scores_answer, COUNT( scores_isCorrect ) AS attempts, SUM( 
CASE WHEN scores_isCorrect =  \"Y\"
THEN 1 
ELSE 0 
END ) AS correctsOLD,
COUNT(DISTINCT question_answer) AS corrects
FROM  `scores` 
JOIN questions ON questions.questions_id = scores.scores_questionid
JOIN users2 ON users2.user_id = scores.scores_team
WHERE scores_isCorrect=\"Y\"
GROUP BY username
ORDER BY corrects DESC";
//echo $sql; // useful for debugging SQL statements - you can see what you are actually using to query the db
//echo "<br>";
$result = $conn->query($sql);
echo "<table>";
if ($result->num_rows > 0) {
    echo "<thead><tr><th>TEAM</th><th>Number Correct</th></tr></thead><tbody>";
// output data of each row - $row is an array that contains all the fields in the record
    while($row = $result->fetch_assoc()) {
        //echo join(' --- ', $row);
        echo "<tr>";
        echo "<td>" . $row["username"]. "</td>";
        echo "<td>" . $row["corrects"]. "</td>";
        echo "</tr>";
        
    }
} else {
    echo "<tr><td>No data found!</td></tr>";
}
echo "</tbody></table>";
?>

<?php
include("includes/footer.php");
?>