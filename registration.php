<?php
session_start();

require_once("config.php");
 
?>

<html>

    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="registration.css">
	</head>
	
<body>   

<?php

if(isset($_POST['signup']))
{
    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="project";

    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

	$email=$_POST['email'];
    $password=$_POST['password'];
    $firstname=$_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    
    $msgFlag = "Error";

    $_SESSION['reg_msg'] = "Form submitted successfully.";
    $_SESSION['reg_location'] = "registration.php";
    $_SESSION['reg_msgFlag'] = "Error";

    $sql ="select * from registration where email='".$email."' ";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    
    if($count==0)
    {
        $qry = "INSERT into registration(firstname,lastname,email,password,gender) values(?,?,?,?,?)";
        $stmtinsert = $db->prepare($qry);
        $result = $stmtinsert->execute([$firstname,$lastname,$email,$password,$gender]);
        if($result)
        {
            $_SESSION['reg_msgFlag'] = "Success";
            $_SESSION['reg_location'] = "login.php";
        }  
        else
        {
            $_SESSION['reg_msg'] = "There were errors saving the data.";
        } 
        
    }
    else
    {
        $_SESSION['reg_msg'] = "The entered email id is already registered with us.";
	}
	header('location:registration_act.php');
}
?>

	<div class="container">
        <form method="post">
            <h1>Registration</h1>
			<div class="inputs">
				<label for="firstname" class="labels"><b>Firstname</b></label><br>
				<input class="select" type="text" placeholder="Enter Firstname" name="firstname" autocomplete="off" required>
				<br>
				<label for="lastname" class="labels"><b>Lastname</b></label><br>
				<input class="select" type="text" placeholder="Enter Lastname" name="lastname" autocomplete="off" required>
				<br>
				<label for="email" class="labels"><b>Email Address</b></label><br>
				<input class="select" type="email" placeholder="Enter Email" name="email" autocomplete="off" required>  
				<br>
				<label for="password" class="labels"><b>Password</b></label><br>
				<input class="select" type="password" placeholder="Enter Password" name="password" autocomplete="off" required>
				<br>
				<label class="labels"><b>Gender :</b>
					<input type="radio" name="gender" value="male">Male
					<input type="radio" name="gender" value="female">Female
					<input type="radio" name="gender" value="other">Other
				</label>
            </div>
            
			<div class="btn">
				<button class="btn-success" type="submit" name="signup" id="register" >Sign Up</button>
            </div>
          
		
		</form>
        <div class="bottom">
            <p class="line"><b>Already a member ?</b>
            <button type="button" onclick="window.location.href='login.php'" class="cancelbtn" >Signin</button></p>
        </div>
    	
	</div>

</body>
</html>