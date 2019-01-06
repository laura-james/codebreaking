
<html>
    <head>
        <title>Codebreaking Treasure Hunt - Beechen Cliff School</title>
        <!--Import Google Icon Font-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
        <link rel="stylesheet" href="css/materialize.css" type="text/css" />
        <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <?php $page =  basename($_SERVER['PHP_SELF']);
          if($page == "scores.php"){
            //refresh the scores page after 5 seconds
          ?>
            <meta http-equiv="refresh" content="5">
          <?php } ?>
          
    
    </head>
    <body>
      <header class="page-header">
        
        <nav>
          <div class="container">
          <div class="nav-wrapper">
            <a href="#" class="brand-logo right">Codebreaking Treasure Hunt</a>
            <ul id="nav-mobile" class="left xhide-on-med-and-down">
              <li><a href="login.php">Login</a></li>
              <li><a href="logout.php">Logout</a></li>
              <li><a href="index.php">Questions</a></li>
              <li><a href="scores.php">Scores</a></li>
            </ul>
          </div>
          </div>
        </nav>
        <div class="container">
        <?php if($_SESSION["username"]!=""){?>
        <div class="card-panel teal lighten-5 "> 
          
          <div class="welcomebox left">
            <i class="material-icons small">fingerprint</i>
            <span>Welcome, <?php echo $_SESSION["username"]?></span>
          </div>
          <div class="right scorebox">
            Score: <?php getScore($conn);?>
          </div>
        </div>
        <?php }?>
        </div>
        
      </header>
      <main>
        <div class="container">
        
    