<?php
//TODO put this in a header.php or functions.php
include("includes/connectToDb.php");
include("includes/functions.php");
$errmsg="";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           if($_POST["password"]="password" && $_POST["username"]=="test" ){
               $sql = "DELETE FROM scores" ;
               echo $sql;
                echo "<br>";
                $result = $conn->query($sql);
               
               if($result){
                           header("Location: scores.php");
               }else{
                   echo "something went wrong!";
               }
           }else{
               $errmsg= "Incorrect credentials";
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
                 <h3>Are you sure you want to clear the scores? Enter admin name & password</h3>
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