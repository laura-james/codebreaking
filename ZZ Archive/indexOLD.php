<html>
    <head>
        <title>&#167 &#167 &#167 Learning some PHP &#167</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
    
        <h1>This is my amazing web page</h1>
            
        <?php
        
        echo 'Hello world from Cloud9!';
        echo "<br/>";
        echo 'Todays date is'.date("w");
        //demo of a for loop
        for($i=0;$i<5;$i++){
            echo '<div>Hello</div>';
            echo '<hr/>';
        }
        ?>


        <h2>Please enter your name & email</h2>
        
        <form>
            <label>Your name</label>
            <input name="yourname" placeholder="your name here" type="text" />
            <br>
            <label>Your email</label>
            <input name="email" placeholder="your email here" type="email" />
            <br>
            <input type="submit" value="Click here to submit">
            
            
        </form>

    </body>
</html>