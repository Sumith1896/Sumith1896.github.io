<!DOCTYPE html>
<html>
    <head>
        <meta name="description" content="Sumith | Coder | Book Addict | IITB-CSE">
        <title>PHP Projects</title>
        <link rel="stylesheet" href="assets/css/projects.css">
        <link rel="shortcut icon" href="assets/img/icons/favicon.ico">
    </head>
    <body>
    <center><h1>PHP Projects</h1></center>
    <left><h3>Roommate-Finder</h3></left>
    <p>Project started by <a href="https://github.com/ranveeraggarwal">Ranveer</a> and <a href="https://github.com/abhijitt">Abhijit</a>. The initial backend of the program used to write data in a .txt file and then access it. I implemented PHP and MySQL support for the database management. The project is however not hosted due to lack of MySQL support in Gymkhana. Anyways, you can get the code <a href="https://github.com/ranveeraggarwal/roommate-finder">here</a> and run locally.</p>
    <br>
    <left><h3>EasyFill</h3></left>
    <p>Though strictly not a PHP project, I built a Python server using Flask as a part of a Android app for a hackathon. The Android(Java) was coded by <a href='https://github.com/udiboy1209'>Meet</a> and <a href='https://github.com/sprihabiswas'>Spriha</a>. I coded the backend with SQLite dependence. The code can be found <a href='https://github.com/Sumith1896/EasyFill'>here.</a></p>
    <br>
    <left><h3>Form validation:Self requests</h3></left>
    <p>Posting the below form to the same page using POST request.</p>
    <?php
    if(isset($_POST["name"])&&isset($_POST["roll"])&&isset($_POST["college"]))
    {
        echo "Your name is " . $_POST["name"];
        echo " with roll " . $_POST["roll"];
        echo " in college " . $_POST["college"];
    }
    else
    {
        echo "You haven't entered the details yet";
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Name:
        <input type="text" name="name" />
        Roll
        <input type="text" name="roll" />
        College
        <input type="text" name="college" /><br>
        <input type="submit" name="btnSendForm" value="Send" />
    </form>
    <br>
    </body>
</html>