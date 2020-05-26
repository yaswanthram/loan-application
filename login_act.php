<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
<?php
        include('config.php');
        $email=$_REQUEST['email'];
        $uPwd=$_REQUEST['psw'];
        
        $msg="";
        $msgFlag = "Error";
        
        $sql ="select * from registration where email='$email'";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0){
            while($row1 = $result->fetch_assoc()){
                $uname = $row1['email'];
                $pwd = $row1['password'];
            }
            
            if($pwd == $uPwd){
                {
                    $_SESSION['email']=$email;
                    $sql = "select * from application where email='".$email."' ";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $count = mysqli_num_rows($result);
                    if($count!=0)
                        header('location:application_details.php');
                    else
                        header("Location:application.php");
                }
            }else{    
                $msg = "Login Failed! Invalid Password";
                $msgFlag = "Error";
            } 
        }else{
            $msg = "Login Failed! Invalid email";
            $msgFlag="Error";
        }
        
        $className = "error";
        if($msgFlag== "Success"){
            $className = "success";
        }
  ?>
        <div class="container">
            <p class="<?php echo $className;?>"><?php echo $msg; ?></p>
        </div>
        
        <button onclick="window.location.href='login.php'">Back</button>
        
</body>
</html>