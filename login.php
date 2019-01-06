<?php
//TODO put this in a header.php or functions.php
include("includes/connectToDb.php");
include("includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // insert values if the user is submitting the form
   
    $sql = "SELECT * FROM users2 WHERE username='" . $_POST["username"]."'" ;
    
    //echo $sql;
   // echo "<br>";
    $result = $conn->query($sql);
    $errmsg="";
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
           // echo "id: " . $row["user_id"]. "<br> - Name: " . $row["username"]. "<br> " . $row["password"]. "<br>";
           if($row["password"]==$_POST["password"]){
               $_SESSION["loggedIn"] = true;
               $_SESSION["ID"] = $row["user_id"];
               $_SESSION["username"] = $row["username"];
               //echo "Congratulations you are logged in!";
               header("Location: index.php");
           }else{
               $errmsg= "Incorrect password";
           }
        }
    } else {
        $errmsg = "No user name found!";
    }
        
}
 
 include("includes/header.php");?>
<div class="row">
     
      <div class="col s6 offset-s3">
        <span class="flow-text">
             <form method="post">
                 <?php if($errmsg!=""){
                     
                      echo '<div class="card-panel #b71c1c red darken-4"><span class="white-text">'.$errmsg.'</span></div>';
                     
                      
                  }?>
                 <h3>Please login:</h3>
                 <label for="username">Enter user name</label>
                 <input type="text" name="username">
                 <label for="password"> Enter password</label>
                 <input type="password" name="password">
                 <button class="btn-large waves-effect waves-light" type="submit" name="action">Login
                    <i class="material-icons right">send</i>
                  </button>
             </form>
         </span>
        </div>
</div>
<?php include("includes/footer.php");?>