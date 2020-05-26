<?php
session_start();
require_once('config.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration action</title>
        <link rel="stylesheet" type="text/css" href="registration_act.css">
    </head>
    <body>
   
    <div class = "container">
        <p><?php echo $_SESSION['reg_msg']; ?></p> 
    </div>
    
    <!--
    $className = "error";
    if($msgFlag== "Success"){
        $className = "Success";
    }
    -->
        
    <button onclick="window.location.href='<?php echo $_SESSION['reg_location']; ?>'">Back</button>
    </body>
</html>