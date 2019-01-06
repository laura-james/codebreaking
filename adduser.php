<?php
//TODO put this in a header.php or functions.php
include("includes/connectToDb.php");
include("includes/functions.php");
include("includes/header.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // insert values if the user is submitting the form
    
    
    echo "you clicked register button <br>";
    
    $sql = "INSERT INTO users2 ( username, password) VALUES ('".$_POST["username"]."', '".$_POST["password"]."');" ;
    echo $sql;
    echo "<br>";
    $result = $conn->query($sql);
    //check if $result is true or false
    if($result){
        //success
        echo("User ".username." registered successfully");
        //TODO redirect to next page
    }else{
        echo("Could not register ".username.". Something went wrong");
    }
}
 ?>
 
 
 <form method="post">
     <h1>User registration</h1>
     <p>Enter user name</p>
     <input type="text" name="username">
     <p> Enter password</p>
     <input type="password" name="password">
     <input type="submit" value="Register">
     
 </form>
 
 <?php include("includes/header.php");?>