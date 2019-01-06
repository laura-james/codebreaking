<h1>List of all registered users and their passwords</h1>
<h2>(Clearly you wouldn't display this on a live site!)</h2>
<?php
//TODO put this in a header.php or functions.php
include("includes/connectToDb.php");
include("includes/functions.php");
include("includes/header.php");

$sql = "SELECT * FROM users2 " ;

echo $sql; // useful for debugging SQL statements - you can see what you are actually using to query the db
echo "<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row - $row is an array that contains all the fields in the record
    while($row = $result->fetch_assoc()) {
        //echo join(' --- ', $row);
        echo "id: " . $row["user_id"]. "Name: " . $row["username"]. " pwd: " . $row["password"]. "<br>";
        // you could also print out HTML tags for a table to format it 'better' - but it can get confusing!
    }
} else {
    echo "No data found!";
}
        

include("includes/footer.php"); ?>