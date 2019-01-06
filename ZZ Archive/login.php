<?php
//TODO put this in a header.php or functions.php
include("includes/connectToDb.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // insert values if the user is submitting the form
    

    echo "you clicked login button <br>";
    //echo $_POST["username"];
    
    $sql = "SELECT * FROM  users2 WHERE username='".$_POST["username"]."';" ;
    echo $sql;
    echo "<br>";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["user_id"]. "<br> - Name: " . $row["username"]. "<br> " . $row["password"]. "<br>";
           echo "<hr>";
        }
    } else {
        echo "0 results";
    }
    
}
 ?>
 
 
 <form method="post">
     <h1>User Login</h1>
     <p>Enter user name</p>
     <input type="text" name="username">
     <p> Enter password</p>
     <input type="password" name="password">
     <input type="submit" value="Login">
     
 </form>