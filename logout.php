<?php
//TODO put this in a header.php or functions.php
include("includes/connectToDb.php");
include("includes/functions.php");

//LOGOUT CODE
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

include("includes/header.php");?>
 <div class="card-panel pink accent-3 pulse">
    <span class="">You have successfully logged out</span>
 </div>
<?php include("includes/footer.php");
?>