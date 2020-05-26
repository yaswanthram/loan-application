<?php
session_start();
require_once('config.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <?php

        $db_host="localhost";
        $db_user="root";
        $db_pass="";
        $db_name="project";

        $con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

        if(isset($_POST['login']))
        {
            $uuname = $_POST['uname'];
            $uPwd = $_POST['psw'];
            $_SESSION['msg'] = "Login successful.";
            $_SESSION['location'] = "custList.php";
            $_SESSION['msgFlag'] = "Success";
            $sql = "select * from admin where username = '".$uuname."' ";
            $result= mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result);
            $count=mysqli_num_rows($result);

            if ($count==0)
            { 
                $_SESSION['msg'] = "Login Failed! Invalid username";
                $_SESSION['msgFlag'] = "Error";
                $_SESSION['location'] = "admin.php";
            }
            else
            {
                $uname = $row['username'];
                $pwd = $row['password'];

                if ($pwd != $uPwd)
                { 
                    $_SESSION['msg'] = "Login Failed! Invalid Password";
                    $_SESSION['msgFlag'] = "Error";
                    $_SESSION['location'] = "admin.php";
                }
                else
                {  
                    $_SESSION['admin'] = $uname;
                    header('location:admin_act.php');
                }
            }
        }
    ?>
    <div class = "container"> 
        <form method = "POST">

            <h1> LOGIN </h1>

            <label for = "uname"><b> Username </b></label>
            <input type = "text" placeholder = "Enter your Username here" name ="uname" required>
            <label for = "psw"> <b> Password </b> </label>
            <input type = "password" placeholder = "Enter your password here" name="psw" required> 

            <div class="btn">
                <button type = "submit" name="login" class="btn-login">Login</button>
            </div>
        </form>
    </div>
</body>
</html>

