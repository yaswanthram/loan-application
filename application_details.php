<?php

session_start();
require_once('config.php');
?>

<html>
<head>
    <title>Application Details</title>
    <link href="application.css" rel="stylesheet">
</head>

<body>

<div class="details">

    <div class="status">
        <h3>Loan application status is 
            <?php 

                $db_host="localhost";
                $db_user="root";
                $db_pass="";
                $db_name="project";

                $con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

                $sql="select * from application where email='".$_SESSION['email']."' limit 1";
                $result= mysqli_query($con,$sql);
                $row=mysqli_fetch_array($result);

                if($row['status']=="approved")
                    echo "<span style='color:green'>accepted</span>"; 
                else if($row['status']=="rejected")
                    echo "<span style='color:red'>rejected</span>"; 
                else if($row['status']=="pending")
                    echo "<span style='color:gray'>pending</span>"; 
            ?>
        </h3>
    </div>

    <form method="POST" class="info">
        <label class="labels">First Name</label><br>
        <input class="select select1" placeholder="<?php echo $row['fname']; ?>" disabled></input>
        <br>
        <label class="labels">Last Name</label><br>
        <input class="select select1" placeholder="<?php echo $row['lname']; ?>" disabled></input>
        <br>
        <label class="labels">Email</label><br>
        <input class="select select1" placeholder="<?php echo $row['email']; ?>" disabled></input>
        <br>
        <label class="labels">Age</label><br>
        <input class="select select1" placeholder="<?php echo $row['age']; ?>" disabled></input>
        <br>
        <label class="labels">Date Of Birth</label><br>
        <input class="select select1" placeholder="<?php echo $row['date_of_birth']; ?>" disabled></input>
        <br>
        <label class="labels">Monthly income</label><br>
        <input class="select select1" placeholder="<?php echo $row['income']; ?>" disabled></input>
        <br>
        <label class="labels">Loan amount needed</label><br>
        <input class="select select1" placeholder="<?php echo $row['loan_amt']; ?>" disabled></input>
        <br>
        <label class="labels">Purpose</label><br>
        <input class="select select1" placeholder="<?php echo $row['purpose']; ?>" disabled></input>
        <br>
        <label class="labels">Tenure</label><br>
        <input class="select select1" placeholder="<?php echo $row['tenure']; ?>" disabled></input>

        <button class="logout" name="logout">Logout</button>

        <?php
            if(isset($_POST['logout']))
            {
                session_unset();
                session_destroy();
                header('location:registration.php');
            }
        ?>
    </form>

</div>

</body>
</html>